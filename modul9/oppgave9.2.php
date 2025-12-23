<?php
// Pek til loggfilen
$logFile = __DIR__ . '/logg.txt';

// Funksjon som skriver en hendelse til loggfilen, tar inn tekstmelding og filnavnet
function writeLog($message, $logFile) {
    // Legg til tidsstempel foran meldingen i filen, når meldingen ble tatt inn
    $timestamp = date('Y-m-d H:i:s');

    // Bygger linjen som skal skrives (tidsstempel + meldingen + linjeskift)
    $line = $timestamp . " - " . $message . PHP_EOL;

    // Skriver linjen til slutten av filen (tror FILE-APPEND legger til linjen på slutten av filen)
    file_put_contents($logFile, $line, FILE_APPEND);
    }

// Test:  lager en rekke hendelser 
writeLog("Bruker logget inn", $logFile);
writeLog("Bruker lastet opp en fil", $logFile);
writeLog("Bruker logget ut", $logFile);
writeLog("Bruker logget inn", $logFile);
writeLog("Bruker lastet opp en fil", $logFile);
writeLog("Bruker logget ut", $logFile);
writeLog("Bruker logget inn", $logFile);
writeLog("Bruker lastet opp en fil", $logFile);
writeLog("Bruker logget ut", $logFile);
writeLog("Bruker logget inn", $logFile);
writeLog("Bruker lastet opp en fil", $logFile);
writeLog("Bruker logget ut", $logFile);

// Leser hele loggfilen inn i en array en linje er eet element
$lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Finn de siste 10 linjene, tar de siste 10 fra arrayt
$lastTen = array_slice($lines, -10);

// Skriv dem ut på skjermen
echo "<h2>Siste 10 hendelser</h2>";
echo "<ul>";
foreach ($lastTen as $line) {
    $safeLine = htmlspecialchars($line, ENT_QUOTES, 'UTF-8');
    echo "<li>{$safeLine}</li>";
}

echo "</ul>";

// Ikke call writeLog() uten at du faktisk skal logge en hendelse, Hver gang du kjører dette scriptet kommer 10 nye like hendelser.

