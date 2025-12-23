<?php
class AuthControllerAuthDemo {
    private UserModelAuthDemo $users;
    public function __construct(UserModelAuthDemo $users) { $this->users = $users; }

    private function validateRegister(array $data): array {
        $errors = [];
        if (!$data['fname']) $errors[] = "Fornavn må oppgis";
        if (!$data['lname']) $errors[] = "Etternavn må oppgis";
        if (!$data['email'] || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Ugyldig e-post";
        if (!$data['username']) $errors[] = "Brukernavn må oppgis";
        if (empty($data['password']) || strlen($data['password']) < 8) $errors[] = "Passord må være minst 8 tegn";
        return $errors;
    }

    public function register(array $post): array {
        $data = [
            'fname' => trim($post['fname'] ?? ''),
            'lname' => trim($post['lname'] ?? ''),
            'email' => trim($post['email'] ?? ''),
            'username' => trim($post['username'] ?? ''),
            'password' => $post['password'] ?? ''
        ];
        $errors = $this->validateRegister($data);
        if ($this->users->findByUsername($data['username'])) $errors[] = "Brukernavn er allerede i bruk";
        if ($this->users->findByEmail($data['email'])) $errors[] = "E-post er allerede i bruk";
        if (!empty($errors)) return ['ok' => false, 'errors' => $errors];

        // Enkel regel for adminrolle
        $role = (strpos($data['email'], '@admin') !== false) ? 'admin' : 'user';
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->users->createUser($data['fname'], $data['lname'], $data['email'], $data['username'], $hash, $role);
        return ['ok' => true, 'message' => 'Bruker registrert'];
    }

    public function login(array $post): array {
        session_start();
        $username = trim($post['username'] ?? '');
        $password = $post['password'] ?? '';

        // Lockout sjekk (3 feil på 1 time)
        if ($username && $this->users->isLockedOut($username)) {
            return ['ok' => false, 'error' => 'Brukeren er midlertidig utestengt (1 time) etter 3 feilforsøk'];
        }

        $user = $this->users->verifyPassword($username, $password);
        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'fname' => $user['fname'],
                'lname' => $user['lname'],
                'email' => $user['email'],
                'username' => $user['username'],
                'role' => $user['role']
            ];
            $this->users->resetFailedAttempts($username);
            return ['ok' => true, 'role' => $user['role']];
        } else {
            if ($this->users->findByUsername($username)) {
                $this->users->incrementFailedAttempts($username);
            }
            return ['ok' => false, 'error' => 'Feil brukernavn eller passord'];
        }
    }

    public function checkAccess(string $requiredRole = 'user'): array {
        session_start();
        if (!isset($_SESSION['user'])) {
            return ['ok' => false, 'error' => 'Du må logge inn først'];
        }
        $user = $_SESSION['user'];
        if ($requiredRole === 'admin' && $user['role'] !== 'admin') {
            return ['ok' => false, 'error' => 'Ingen tilgang (admin påkrevd)'];
        }
        return ['ok' => true, 'user' => $user];
    }

    public function logout(): void {
        session_start();
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: index.php?page=login&success=Du er logget ut");
        exit;
    }
}
