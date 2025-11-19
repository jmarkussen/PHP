<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Oppgave 1</title>
</head>
<body>

    <?php
        // Matrise
        $matrise = [5, 3, 0, 3, 0, 5, 9, 7, 9];

        // Teller hvor mange ganger hver verdi er tilstede
        $forekomster = array_count_values($matrise);

        // Finn verdien som kun er en gang
        foreach ($forekomster as $verdi => $antall) {
            if ($antall === 1) {
                $unik_verdi = $verdi;
                break;
            }
        }

        // Finn nøkkelen (indeksen) til denne verdien
        $nokkel = array_search($unik_verdi, $matrise);

        // Skriv ut resultatet
        echo "Element nr. $nokkel har en verdi ($unik_verdi) som kun forekommer én gang i matrisen.";
    ?>


</body>
</html>
