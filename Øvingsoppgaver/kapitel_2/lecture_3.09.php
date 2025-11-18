<?php

$pris = 200;

if($pris >= 100 || $pris <= 1000) 
{
    echo "Denne kaffen er veldig dyr";
}

elseif($pris >=50)
{
    echo "Denne kaffen er litt dyr";
}

else
{
    echo "Denne kaffen er billig";
}


// Øvelse 1: sjekk om en variabel ($pris) er satt: isset()

if (isset($pris))
{
    echo "Pris er satt";
} 
else 
{
    echo "pris er ikke satt";
}

$rolle = "hjelpelærer";

switch($rolle){

    case "hjelpelærer":
        echo "Velkommen til siden for hjelpelærere";
        break;
    case "student":
        echo "Velkommen til siden for studenter!";
        break;
    default: 
        echo "Du må logge inn for å bruke systemet vårt.";
    }
?>


<?php

$tall = 1;
while ($tall <=10)
{
    echo $tall - "<br>";
    $tall++; 
}



?>
