<!DOCTYPE html>
<html>
    <head>
        <title>
            Oppgave 1
        </title>
    </head>
    <body>
    <h1>
        Oppgave 1 - Matrise
    </h1>
    <p>
        <?php

        $matrise = [
        0 => "Hest",
        3 => "Sau",
        5 => "Ku",
        7 => "Bil",
        8 => "Båt",
        15 => "Jarlsberg"
        ];

            //printer ut materise med alle verdier og nøkler
        print_r($matrise);
        
            //gjør det samme med en foreach løkke, lager to nye variabler og går igjennom
        foreach ($matrise as $nokkel => $verdi){
            echo "Nøkkel: $nokkel, Verdi: $verdi  "; 
        }

        ?>
    </p>
    </body>
</html>