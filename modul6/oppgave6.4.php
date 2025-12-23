<?php
require_once "Validering.php"; // inkluderer klassen

// Ny instans av klassen
$validator = new Validering();

// Test med gyldig e-post
echo $validator->validerEpost("joel.markussen@example.com");
echo "<br>";

// Test med ugyldig e-post
echo $validator->validerEpost("joel.markussen@");
echo "<br>";
?>
