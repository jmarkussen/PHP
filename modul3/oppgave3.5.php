<!DOCTYPE html>
<html>
    <head>
        <title>
            Oppgave 3.5
        </title>
    </head>
    <body>
        <h1>Oppgave 5</h1>
        <p>
        
            <?php


            $korn = 1;
            $totalKorn = 0;
            $vektPerKornGram = 0.035;

            for ($rute = 1; $rute <= 64; $rute++) {
            echo "Rute $rute: $korn hvetekorn<br>";
            $totalKorn += $korn;
            $korn *= 2;
            }

            $totalVektGram = $totalKorn * $vektPerKornGram;
            $totalVektTonn = $totalVektGram / 1000000;

            echo "<br>Totalt antall hvetekorn: $totalKorn<br>";
            echo "Total vekt i tonn: " . round($totalVektTonn, 2) . " tonn";
            
            //Funksjon man kan teste "number_format()"

            ?>
        </p>
    </body>
</html>