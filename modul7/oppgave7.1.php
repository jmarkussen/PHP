<?php
require_once __DIR__ . "/db_connect.php";

// Hent alle brukere
$sql = "SELECT fornavn, etternavn, epost, fodselsdato, registreringsdato FROM brukere";
$stmt = $pdo->query($sql);
$brukere = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Oppgave 7</title>
</head>
<body>
  <h1>Brukeroversikt</h1>
  <table border="1" cellspacing="0" cellpadding="6">
    <thead>
      <tr>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>E-post</th>
        <th>Fødselsdato</th>
        <th>Registreringsdato</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($brukere): ?>
        <?php foreach ($brukere as $bruker): ?>
          <tr>
            <td><?= htmlspecialchars($bruker['fornavn']) ?></td>
            <td><?= htmlspecialchars($bruker['etternavn']) ?></td>
            <td><?= htmlspecialchars($bruker['epost']) ?></td>
            <td><?= htmlspecialchars($bruker['fodselsdato']) ?></td>
            <td><?= htmlspecialchars($bruker['registreringsdato']) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="5">Ingen brukere funnet.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>
