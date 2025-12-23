<?php
require_once "KundeBrukerV3.php";

// Opprett to brukere
$kunde1 = new KundeBrukerV3("Joel", "Markussen", "1995-04-12", "Premium");
$kunde2 = new KundeBrukerV3("Anna", "Hansen", "1998-07-21", "Standard");

// Vis info
echo $kunde1->hentBrukerInfo() . "<br>";
echo $kunde2->hentBrukerInfo() . "<br>";

// Slett objektene
unset($kunde1);
unset($kunde2);

// Skriv ut slettede brukernavn
echo "Slettede brukere: " . implode(", ", BrukerV3::$slettedeBrukere);
?>
