<?php
// Hent filnavn fra URL
$fileName = $_GET['file'] ?? '';

// Pek til uploads-mappen (ligger ett nivå opp) her har jeg lagt inn to PDF
$uploadDir = __DIR__ . '/../uploads';
$path = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

// Sjekk at filen finnes, gir feilmelding hvis ikke
if ($fileName === '' || !is_file($path)) {
    die('Filen finnes ikke.');
}

// Sett headere for nedlasting
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . basename($path) . '"');
header('Content-Length: ' . filesize($path));
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Expires: 0');

// Les og send filinnholdet
readfile($path);
exit;
