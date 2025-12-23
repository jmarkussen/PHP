<?php
$check = $auth->checkAccess('user');
if (!$check['ok']) {
    header("Location: index.php?page=login&error=" . urlencode($check['error']));
    exit;
}
$user = $check['user'];
?>
<!DOCTYPE html>
<html lang="no">
<head><meta charset="UTF-8"><title>Chat</title></head>
<body>
<h1>Chatområde</h1>
<p>Velkommen, <?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?></p>

<nav>
    <a href="index.php?page=chat">Chat</a> |
    <a href="index.php?page=admin">Admin</a> |
    <a href="index.php?page=logout">Logg ut</a>
</nav>
</body>
</html>
