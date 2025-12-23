<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $res = $auth->register($_POST);
    if ($res['ok']) {
        header("Location: index.php?page=login&success=" . urlencode($res['message']));
        exit;
    } else {
        $errors = $res['errors'];
    }
}
$message = $_GET['success'] ?? '';
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="no">
<head><meta charset="UTF-8"><title>Registrering</title></head>
<body>
<h1>Registrer ny bruker</h1>
<?php if (!empty($errors)): ?><div style="color:red;"><?php echo htmlspecialchars(implode('<br>', $errors)); ?></div><?php endif; ?>
<?php if ($message): ?><div style="color:green;"><?php echo htmlspecialchars($message); ?></div><?php endif; ?>
<?php if ($error): ?><div style="color:red;"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>

<form method="post">
    <input name="fname" placeholder="Fornavn" required>
    <input name="lname" placeholder="Etternavn" required>
    <input name="email" type="email" placeholder="E-post" required>
    <input name="username" placeholder="Brukernavn" required>
    <input name="password" type="password" placeholder="Passord" required>
    <button type="submit">Registrer</button>
</form>
<p><a href="index.php?page=login">Allerede bruker? Logg inn</a></p>
</body>
</html>
