<?php
//peke på katalogen "files" inne i mappen modul9
$dir = __DIR__ . '/files';

//Sjekker om katalogen finnes og er lesbar
if (!is_dir($dir) || !is_readable($dir)) {
    die('Denne katalogen finnes ikke eller er ikke lesbar: ' . $dir);
}

//Leser alle filene i katalogen (også '.' og '..)
$entries = scandir($dir);

//Fjerner de spesielle katalogpekerne '.' og '..'
$entries = array_diff($entries, ['.', '..']);

//Lage en tom liste, legger til filene
$files = [];

foreach ($entries as $entry) {
    //lage en sti til elementet
    $path = $dir . DIRECTORY_SEPARATOR . $entry;

    //hvis det er en vanlig fil, legg til i listen
    if (is_file($path)) {
        $files[] = $path;
    }
}

// Oversikt over tabell
echo "<h2>Filoversikt</h2>";
// Start på tabellen
echo "<table border='1' cellpadding='5' cellspacing='0'>";
// Kolonner
echo "<thead>";
echo "<tr>";
echo "<th>Filnavn</th>";
echo "<th>Filtype</th>";
echo "<th>Størrelse</th>";
echo "<th>Sist endret</th>";
echo "<th>Kjørbar</th>";
echo "<th>Lesbar</th>";
echo "<th>Skrivbar</th>";
echo "</tr>";
echo "</thead>";
// start tabellkroppen
echo "<tbody>";

// En rad per fil med metadata
foreach ($files as $path) {
    // Filnavn
    $name = basename($path);
    $safe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

    // MIME-type (kan være 'ukjent' hvis ikke støttet)
    $mime = function_exists('mime_content_type') ? mime_content_type($path) : 'ukjent';

    // Størrelse på fil
    $size = filesize($path);

    // Siste endringstidspunkt formatert
    $lastModified = date('Y-m-d H:i:s', filemtime($path));

    // Rettigheter for filene
    $isExec = is_executable($path) ? 'Ja' : 'Nei';
    $isRead = is_readable($path) ? 'Ja' : 'Nei';
    $isWrite = is_writable($path) ? 'Ja' : 'Nei';

    // Skriv ut tabellrad
    echo "<tr>";
    echo "<td>{$safe}</td>";
    echo "<td>{$mime}</td>";
    echo "<td>{$size} bytes</td>";
    echo "<td>{$lastModified}</td>";
    echo "<td>{$isExec}</td>";
    echo "<td>{$isRead}</td>";
    echo "<td>{$isWrite}</td>";
    echo "</tr>";
}

    // Avslutt tabellkropp og tabell
    echo "</tbody>";
    echo "</table>";


