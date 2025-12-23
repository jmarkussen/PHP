<?php
$message = $_GET['success'] ?? '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $res = $auth->login($_POST);
    if ($res['ok']) {
        $target = ($res['role'] === 'admin') ? 'admin' : 'chat';
        header("Location: index.php?page=" . $target);
        exit;
    } else {
        $error = $res['error'];
    }
}
?>
<!DOCTYPE html>
<html lang="no">
<head><meta charset="UTF-8"><title>Innlogging</title></head>
<body>
<h1>Logg inn</h1>
<?php if ($message): ?><div style="color:green;"><?php echo htmlspecialchars($message); ?></div><?php endif; ?>
<?php if ($error): ?><div style="color:red;"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>

<form method="post">
    <input name="username" placeholder="Brukernavn" required>
    <input name="password" type="password" placeholder="Passord" required>
    <button type="submit">Logg inn</button>
</form>
<p><a href="index.php?page=register">Ny bruker? Registrer deg</a></p>
</body>
</html>
