<!DOCTYPE html>
<html>
    <head>
        <title>
            Oppgave 3.3
        </title>
    </head>
    <body>
        <h1>Oppgave 3</h1>
        <p>
        
            <?php

                $saldo = 100;
                $rente = 0.05;
                $n = 65;

                echo "Saldoen er: $saldo <br> Renten er: 5% <br>";

                //Beregn saldoen etter 1 år
                $s1 = $saldo * (1 + $rente);
                echo "Etter 1 år er saldoen + rente: $s1 <br><br><br>";

               /* 
                Starter med en saldo på 100 kr og simulerer årlig vekst med rentes rente:
                - For hver iterasjon (år), multipliseres saldoen med (1 + rente), som gir ny saldo.
                - Resultatet rundes til 2 desimaler og skrives ut for hvert år.
                - Etter løkken vises sluttbeløpet etter $n år.
                */

                $saldo = 100;
                for ($år = 1; $år <= $n; $år++) {
                $saldo *= (1 + $rente); 
                echo "År $år: " . round($saldo, 2) . " kr<br>";
                }

                echo "<br>Etter $n år er slutt-saldoen: " . round($saldo, 2) . " kr";
            ?>
        </p>
    </body>
</html>