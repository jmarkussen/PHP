<?php
// Lag en matrise med 9 tilfeldige tall mellom 1 og 50
$tall = [];
for ($i = 0; $i < 9; $i++) {
    $tall[] = rand(1, 50); // rand() gir et tilfeldig tall mellom 1 og 50
}

//Regn ut summen
$sum = array_sum($tall);

//Regn ut gjennomsnittet
$gjennomsnitt = $sum / count($tall);

//Finn minste og største tall
$min = min($tall);
$max = max($tall);

//Finn medianverdien
sort($tall);           // Sorter tallene i stigende rekkefølge
$median = $tall[4];    // Midterste tall 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Oppgave 5</title>
</head>
<body>
    <h1>Oppgave 5 - tall matrise</h1>

    <p>Matrisen inneholder:</p>
    <p><?php echo implode(", ", $tall); ?></p>

    <p>Sum: <?php echo $sum; ?></p>
    <p>Gjennomsnitt: <?php echo round($gjennomsnitt, 2); ?></p>
    <p>Median: <?php echo $median; ?></p>
    <p>Minste tall: <?php echo $min; ?></p>
    <p>Største tall: <?php echo $max; ?></p>
</body>
</html>
