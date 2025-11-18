<!DOCTYPE html>
<html>
    <head>
        <title>
            Oppgave 3.4
        </title>
    </head>
    <body>
        <h1>Oppgave 4</h1>
        <p>
        
            <?php

                $temperatur = 13;

                echo "Ved $temperatur grader bør du ha på deg: <br>";

                if ($temperatur > 20){
                    echo "T skjorte og shorts";
                }

                elseif ($temperatur > 15){
                    echo "Langbukse og genser";
                }

                elseif ($temperatur > 5){
                    echo "Jakke og bukse";
                }

                elseif ($temperatur > 0){
                    echo "Vinterjakke og lue";
                }

                else {
                    echo "Vintertøy og ullundertøy";
                }

            ?>
        </p>
    </body>
</html>
