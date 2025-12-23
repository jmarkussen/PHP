<?php
class UserModelAuthDemo {
    private PDO $db;
    public function __construct(PDO $pdo) { $this->db = $pdo; }

    public function findByUsername(string $username): ?array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :u");
        $stmt->execute(['u' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :e");
        $stmt->execute(['e' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function createUser(string $fname, string $lname, string $email, string $username, string $passwordHash, string $role = 'user'): bool {
        $stmt = $this->db->prepare("
            INSERT INTO users (fname, lname, email, username, password_hash, role)
            VALUES (:f, :l, :e, :u, :p, :r)
        ");
        return $stmt->execute([
            'f' => $fname, 'l' => $lname, 'e' => $email, 'u' => $username, 'p' => $passwordHash, 'r' => $role
        ]);
    }

    public function verifyPassword(string $username, string $password): ?array {
        $user = $this->findByUsername($username);
        if (!$user) return null;
        if (password_verify($password, $user['password_hash'])) return $user;
        return null;
    }

    public function incrementFailedAttempts(string $username): void {
        $stmt = $this->db->prepare("
            UPDATE users SET failed_attempts = failed_attempts + 1, last_failed_attempt = NOW()
            WHERE username = :u
        ");
        $stmt->execute(['u' => $username]);
    }

    public function resetFailedAttempts(string $username): void {
        $stmt = $this->db->prepare("
            UPDATE users SET failed_attempts = 0, last_failed_attempt = NULL
            WHERE username = :u
        ");
        $stmt->execute(['u' => $username]);
    }

    public function isLockedOut(string $username): bool {
        $user = $this->findByUsername($username);
        if (!$user) return false;
        $tooMany = ((int)$user['failed_attempts']) >= 3;
        $withinHour = $user['last_failed_attempt'] && (strtotime($user['last_failed_attempt']) > strtotime('-1 hour'));
        return $tooMany && $withinHour;
    }
}
