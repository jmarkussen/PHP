<?php
$uploadDir = __DIR__ . '/uploads';
$fileName = $_GET['file'] ?? '';
$path = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

if ($fileName === '' || !is_file($path)) {
    die('Filen finnes ikke.');
}

$sizeBytes = filesize($path);
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$type = finfo_file($finfo, $path);
finfo_close($finfo);
$sizeKB = round($sizeBytes / 1024, 2);

$relativeLink = 'uploads/' . rawurlencode($fileName);
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>CV-opplasting</title>
</head>
<body>
<h1>Opplasting vellykket!</h1>
<p><a href="<?php echo $relativeLink; ?>" target="_blank">Åpne CV (PDF)</a></p>
<ul>
    <li><strong>Filnavn:</strong> <?php echo htmlspecialchars($fileName); ?></li>
    <li><strong>Filtype:</strong> <?php echo htmlspecialchars($type); ?></li>
    <li><strong>Størrelse:</strong> <?php echo $sizeKB; ?> KB</li>
    <li><strong>Plassering:</strong> <?php echo htmlspecialchars($path); ?></li>
</ul>
<p><a href="oppgave9.3.php">Tilbake til opplasting</a></p>
</body>
</html>
