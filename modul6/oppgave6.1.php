<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Oppgave 1</title>
</head>
<body>
  <main>
    <h1>Oppgave 1</h1>
    <p>
        <?php
        require_once "bruker.php"; // inkluderer superklassen
        // Opprett et nytt objekt av klassen
        $bruker1 = new Bruker("Joel", "Markussen", "1995-04-12");

        // Kall på metoden hentFulltNavn()
        echo $bruker1->hentFulltNavn(); 
        // Output: Joel Markussen

        // Kall på metoden hentBrukerInfo()
        echo $bruker1->hentBrukerInfo(); 
        // Output: Navn: Joel Markussen | Brukernavn: joel.markussen | Fødselsdato: 1995-04-12 | Registrert: 2025-11-20
        ?>

    </p>
  </main>
</body>
</html>
