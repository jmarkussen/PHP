<!DOCTYPE html>
<html>
    <head>
        <title>
            Oppgave 1
        </title>
    </head>
    <body>
    <h1>
        Oppgave 1 - Datosjekk
    </h1>
    <p>
        <?php
        //To variabler, dagens dato og nå
        $date = "2025-10-09";
        $today = date("Y-m-d");

        echo "$date er en gitt dato<br>Hvis noe har skjedd i dag, $today så:<br>";

        //Hvis nå er > enn datoen har det skjedd
        if ($date < $today) {
        echo "Er hendelsen gjennomført.";
        } 
        //Hvis ikke har det ikke skjedd enda
        else {
        echo "Er hendelsen ikke skjedd enda.";
        }


        ?>
    </p>
    </body>
</html>