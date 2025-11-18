<?php
// Matrise med brukerdata
$user = [
    'name' => 'Test Navnenese',
    'email' => 'test@epost.no',
    'phone' => '12345678'
];

$errors = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = trim($_POST['name'] ?? '');
    $new_email = trim($_POST['email'] ?? '');
    $new_phone = trim($_POST['phone'] ?? '');

    if ($new_name === '') {
        $errors['name'] = 'Du må ha navn!.';
    }

    if ($new_email === '') {
        $errors['email'] = 'E-post er obligatorisk.';
    } elseif (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Ikke en gyldig e-postadresse.';
    }

    if ($new_phone === '') {
        $errors['phone'] = 'Mobilnummer er obligatorisk.';
    } elseif (!preg_match('/^\d{8}$/', $new_phone)) {
        $errors['phone'] = 'Mobilnummer må være 8 sifre.';
    }

   //Er noe endret?
    if (empty($errors)) {
        if (
            $new_name !== $user['name'] ||
            $new_email !== $user['email'] ||
            $new_phone !== $user['phone']
        ) {
            $user['name'] = $new_name;
            $user['email'] = $new_email;
            $user['phone'] = $new_phone;
            $message = 'Oppdatert.';
        } else {
            $message = 'Ingen endringer ble gjort.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Brukerprofil</title>
</head>
<body>
    <h1>Brukerprofil</h1>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post">
        <p>
            Navn:<br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><br>
            <?php if (isset($errors['name'])) echo $errors['name']; ?>
        </p>

        <p>
            E-post:<br>
            <input type="text" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br>
            <?php if (isset($errors['email'])) echo $errors['email']; ?>
        </p>

        <p>
            Mobilnummer:<br>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"><br>
            <?php if (isset($errors['phone'])) echo $errors['phone']; ?>
        </p>

        <p>
            <input type="submit" value="Oppdater">
        </p>
    </form>
</body>
</html>
