<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oppgave 4</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-center p-5">

  <h1 class="text-primary">Liten kalkulator</h1>
  <br>

  <!-- Legger til variablene tall 1 og 2 + variabler som er summen og gjennomsnittet -->
  <?php
  $tall1 = 12;
  $tall2 = 8;

  $sum = $tall1 + $tall2;
  $gjennomsnitt = ($tall1 + $tall2) / 2;
  ?>

  <!-- En setning som printer ut summen og gjennomsnittet -->

  <p>
  Jeg har definert to variabler som tallene 12 og 8.
  <br><br>
  <?php
    echo "Summen av $tall1 og $tall2 er $sum. Gjennomsnittet av $tall1 og $tall2 er $gjennomsnitt.";
  ?>
  </p>

</body>
</html>