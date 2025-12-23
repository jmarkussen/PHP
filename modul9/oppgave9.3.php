<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pek til opplastingsmappe
    $uploadDir = __DIR__ . '/uploads';

    // Opprett mappe hvis den ikke finnes
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Hent bruker-ID (kun tall)
    $userIdRaw = $_POST['user_id'] ?? '';
    $userId = preg_replace('/[^0-9]/', '', $userIdRaw);
    if ($userId === '') {
        die('Ugyldig bruker-ID. Kun tall er tillatt.');
    }

    // Sjekk at fil er valgt
    if (!isset($_FILES['cv']) || $_FILES['cv']['error'] === UPLOAD_ERR_NO_FILE) {
        die('Ingen fil valgt.');
    }

    $file = $_FILES['cv'];

    // Sjekk for feil
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Feil ved opplasting (kode ' . $file['error'] . ').');
    }

    // Sjekk størrelse (maks 1 MB)
    if ($file['size'] > 1024 * 1024) {
        die('Filen er for stor. Maks 1 MB.');
    }

    // Sjekk MIME-type (må være PDF)
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if ($mime !== 'application/pdf') {
        die('Kun PDF-filer er tillatt.');
    }

    // Gi nytt navn {ID}.pdf
    $newName = $userId . '.pdf';
    $destination = $uploadDir . DIRECTORY_SEPARATOR . $newName;

    // Flytt filen
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        die('Kunne ikke lagre filen.');
    }

    // Redirect til view.php
    header('Location: view.php?file=' . urlencode($newName));
    exit;
}
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Last opp CV</title>
</head>
<body>
<h1>Last opp CV</h1>
<form action="oppgave9.3.php" method="post" enctype="multipart/form-data">
    <label for="user_id">Bruker-ID (kun tall):</label><br>
    <input type="text" id="user_id" name="user_id" required><br><br>

    <label for="cv">Velg PDF-fil:</label><br>
    <input type="file" id="cv" name="cv" accept="application/pdf" required><br><br>

    <button type="submit">Last opp</button>
</form>
</body>
</html>
