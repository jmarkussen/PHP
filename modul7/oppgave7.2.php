<!DOCTYPE html>
<html>
<head>
    <title>Oppgave 2</title>
</head>
<body>
<h1>Oppgave 2 - Lage en ny bruker</h1>
<p>
<?php
// NYTT: kobler til databasen modul7 via db_connect.php
require_once "db_connect.php"; 

$feil = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hent og trim input (samme som før)
    $navn = trim($_POST["navn"] ?? '');
    $mobil = trim($_POST["mobil"] ?? '');
    $epost = trim($_POST["epost"] ?? '');
    $passord = trim($_POST["passord"] ?? '');

    // Validering (samme som før)
    if ($navn == '') {
        $feil[] = "Navn må fylles ut.";
    }

    if ($mobil == '') {
        $feil[] = "Mobilnummer må fylles ut.";
    } elseif (!preg_match('/^[0-9]{8}$/', $mobil)) {
        $feil[] = "Mobilnummer må være 8 sifre.";
    }

    if ($epost == '') {
        $feil[] = "E-post må fylles ut.";
    } elseif (!filter_var($epost, FILTER_VALIDATE_EMAIL)) {
        $feil[] = "E-post er ikke gyldig.";
    }

    if ($passord == '') {
        $feil[] = "Passord må fylles ut.";
    } elseif (strlen($passord) < 6) {
        $feil[] = "Passord må være minst 6 tegn.";
    }

    // NYTT: lagre i databasen brukere2 hvis alt er OK
    if (empty($feil)) {
        // NYTT: hash passordet før lagring
        $hash = password_hash($passord, PASSWORD_DEFAULT);

        try {
            // NYTT: tabellnavn endret til brukere2
            $sql = "INSERT INTO brukere2 (navn, mobil, epost, passord, registreringsdato)
                    VALUES (:navn, :mobil, :epost, :passord, CURDATE())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":navn" => $navn,
                ":mobil" => $mobil,
                ":epost" => $epost,
                ":passord" => $hash
            ]);

            // NYTT: bekreftelse på at data er lagret i databasen
            echo "Ny bruker er registrert i tabellen brukere2.";
        } catch (PDOException $e) {
            // NYTT: håndter feil, f.eks. duplikat e-post
            if ($e->getCode() == 23000) {
                echo "E-postadressen er allerede registrert.";
            } else {
                echo "Feil: " . $e->getMessage();
            }
        }
    }
}

// Vis feilmeldinger hvis noen finnes (samme som før)
if (!empty($feil)) {
    foreach ($feil as $melding) {
        echo $melding . "<br>";
    }
}
?>
<form method="post" action="">
    Navn: <input type="text" name="navn"><br>
    Mobilnummer: <input type="text" name="mobil"><br>
    E-post: <input type="text" name="epost"><br>
    Passord: <input type="password" name="passord"><br>
    <input type="submit" value="Registrer">
</form>
</p>
</body>
</html>
