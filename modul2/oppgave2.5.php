<!DOCTYPE html>
<html>
<head>
    <title>Oppgave 5</title>
</head>
    <body>
        <h1>Oppgave 5</h1>
        <p>
        <?php

        //Jeg definerer variabler som små og stor bokstaver + tall
        $små = "abcdefghijklmnopqrstuvwxyzæøå";
        $store = "ABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ";
        $tall = "123456789";

        //Samler dem til en felles variabel, siden du vil ha en miks i passord
        $samlet = $små . $store . $tall;

        //Starter passordet med én tilfeldig stor bokstav og ett tilfeldig tall
        $passord = $store[random_int(0, strlen($store) - 1)];
        $passord .= $tall[random_int(0, strlen($tall) - 1)];

        for ($i = 0; $i < 6; $i++) {
        $passord .= $samlet[random_int(0, strlen($samlet) - 1)];
        }

        $passord = str_shuffle($passord);

        echo "Tilfeldig generert passord er: $passord";

        ?>
        </p>
    </body>
</html>