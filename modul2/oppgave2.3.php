<!DOCTYPE html>
<html>
<head>
    <title>Oppgave 3</title>
</head>
    <body>
        <h1>Oppgave 3</h1>
        <p>
       <?php
        $epost = "joel@uia.no";

        // innebygd PHP-funksjon som sjekker at e-posten har gyldig format
        if (filter_var($epost, FILTER_VALIDATE_EMAIL)) {
        echo "E-postadressen '$epost' er en gyldig e-post.";
        } 
        else {
        echo "E-postadressen '$epost' er ikke en gyldig e-post.";
        }
        ?>

        </p>
    </body>
</html>