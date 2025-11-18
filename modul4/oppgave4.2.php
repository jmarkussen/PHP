<!DOCTYPE html>
<html>
    <head>
        <title>
            Oppgave 2
        </title>
    </head>
    <body>
    <h1>
        Oppgave 2 - Lage en ny bruker
    </h1>
    <p>
        <?php


$feil = [];
$bruker = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hent og trim input
    $navn = trim($_POST["navn"] ?? '');
    $mobil = trim($_POST["mobil"] ?? '');
    $epost = trim($_POST["epost"] ?? '');
    $passord = trim($_POST["passord"] ?? '');

    // Validering
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

        // Hvis alt er OK, lagre i matrise og vis
        if (empty($feil)) {
        $bruker = [
            "Navn" => $navn,
            "Mobilnummer" => $mobil,
            "E-post" => $epost,
            "Passord" => str_repeat("*", strlen($passord)) // skjuler passordet
        ];

        echo "Ny bruker er registrert:\n";
        print_r($bruker);
        }
        }
            ?>

        <?php
        // Vis feilmeldinger hvis noen finnes
        if (!empty($feil)) {
            foreach ($feil as $melding) {
                echo $melding . "\n";
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