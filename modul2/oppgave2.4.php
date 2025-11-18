<!DOCTYPE html>
<html>
<head>
    <title>Oppgave 4</title>
</head>
    <body>
        <h1>Oppgave 4</h1>
        <p>
       <?php
       
       //Jeg definerer to variabler som de to tallene som skal brukes i kalkulatoren
       $tall1 = 12;
       $tall2 = 137;

        echo "Tall 1 er: $tall1 <br> Tall 2 er: $tall2";

        $differanse = $tall1 - $tall2;

        
        //innebygd funksjon i PHP for å få differanse, uavhengig av rekkefølge på tallene.
        $absolutt = abs($differanse);

        echo "<br>Den absolutte differansen mellom $tall1 og $tall2 er $absolutt";

        ?>
        </p>
    </body>
</html>