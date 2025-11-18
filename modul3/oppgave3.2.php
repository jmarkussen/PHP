<!DOCTYPE html>
<html>
    <head>
        <title>
            Oppgave 3.2
        </title>
    </head>
    <body>
        <h1>Oppgave 2</h1>
        <p>
        
            <?php

            $sum = 0;

            //Løkke som teller opp
            //For hver gang $i er mindre enn 9, så $i++ (legg på 1). Så printer den i en linje av gangen
            //Og så printer den summen til slutt i en ny variabel.
            for     ($i = 0; $i <= 9; $i++) {
            echo $i . "<br>";
            $sum += $i;
            }

            echo "Ferdig å telle! Summen av tallene ble $sum.";




            ?>
        </p>
    </body>
</html>