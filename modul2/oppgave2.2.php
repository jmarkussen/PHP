<!DOCTYPE html>
<html>
<head>
    <title>Oppgave 2</title>
</head>
    <body>
        <h1>Oppgave 2</h1>
        <p>
        <?php

        $etternavn = "<p>Navnesen</p>";

        //strip_tags er en innebygd funksjon som fjerner kode fra strengen.
        $fiksetnavn = strip_tags($etternavn);

        echo "Fikset etternavn uten kode: $fiksetnavn";

     ?>
        </p>
    </body>
</html>