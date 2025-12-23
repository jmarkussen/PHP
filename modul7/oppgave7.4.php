<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Oppgave 4</title>
</head>
<body>
<h1>Oversikt over nye brukere (siste måned)</h1>
<?php
require_once "db_connect.php"; // kobler til modul7

try {
    // NYTT: hent kun brukere registrert siste måned
    $sql = "SELECT id, navn, mobil, epost, registreringsdato 
            FROM brukere2 
            WHERE registreringsdato >= CURDATE() - INTERVAL 1 MONTH";
    $stmt = $pdo->query($sql);
    $brukere = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Feil ved henting av brukere: " . $e->getMessage());
}
?>

<table border="1" cellspacing="0" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th>
            <th>Navn</th>
            <th>Mobil</th>
            <th>E-post</th>
            <th>Registreringsdato</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($brukere): ?>
            <?php foreach ($brukere as $bruker): ?>
                <tr>
                    <td><?= htmlspecialchars($bruker['id']) ?></td>
                    <td><?= htmlspecialchars($bruker['navn']) ?></td>
                    <td><?= htmlspecialchars($bruker['mobil']) ?></td>
                    <td><?= htmlspecialchars($bruker['epost']) ?></td>
                    <td><?= htmlspecialchars($bruker['registreringsdato']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Ingen nye brukere registrert siste måned.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>
