<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Oppgave 7.5 - Brukere gruppert etter preferanser</title>
</head>
<body>
<h1>Brukere gruppert etter preferanser</h1>
<?php
require_once "db_connect.php"; // kobler til databasen modul7

try {
    // Hent brukere og preferanser
    $sql = "
        SELECT b.id, b.fornavn, b.etternavn, p.navn AS preferanse
        FROM brukere b
        JOIN bruker_preferanser bp ON b.id = bp.bruker_id
        JOIN preferanser p ON bp.preferanse_id = p.id
        ORDER BY p.navn, b.fornavn, b.etternavn
    ";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Feil ved henting av brukere: " . $e->getMessage());
}

// Gruppér brukere etter preferanse
$grupper = [];
foreach ($result as $rad) {
    $grupper[$rad['preferanse']][] = $rad['fornavn'] . " " . $rad['etternavn'];
}
?>

<?php foreach ($grupper as $pref => $brukere): ?>
    <h2><?= htmlspecialchars($pref) ?></h2>
    <table border="1" cellspacing="0" cellpadding="6">
        <tr><th>Bruker</th></tr>
        <?php foreach ($brukere as $navn): ?>
            <tr><td><?= htmlspecialchars($navn) ?></td></tr>
        <?php endforeach; ?>
    </table>
<?php endforeach; ?>
</body>
</html>
