<!doctype html>
<html>
<head>
    <title>Oppgave 1</title>
</head>
<body>
<h1>Oppgave 1</h1>
<p>


<?php

$fulltnavn = "PeR emIl HAnSeN";

function navnfikser($navn){
    $navn = ucwords(strtolower($navn));
    $navnutenmellomrom = str_replace(" ","", $navn);


    echo "Navnet er $navn";
    echo "<br> antallet navn i $navn er " . str_word_count($navn);
    echo "<br> antallet tegn i $navn er " . strlen($navnutenmellomrom);
}

navnfikser($fulltnavn);

?>

</p>
</body>
</html>








