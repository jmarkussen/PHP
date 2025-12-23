<?php
require_once "Validering.php";

$validator = new Validering();

// Test e-post
echo $validator->validerEpost("joel.markussen@example.com"); // gyldig
echo "<br>";
echo $validator->validerEpost("joel.markussen@"); // ugyldig
echo "<br><br>";

// Test passord
echo $validator->validerPassord("SterkPassord99!"); // gyldig
echo "<br>";
echo $validator->validerPassord("svakt1"); // ugyldig
echo "<br><br>";

// Test mobilnummer
echo $validator->validerMobil("91234567"); // gyldig
echo "<br>";
echo $validator->validerMobil("12345678"); // ugyldig
?>
