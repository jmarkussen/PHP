<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Oppgave 2</title>
</head>
<body>
  <main>
    <h1>Oppgave 2</h1>
    <p>
      <?php
        
        require_once "bruker.php"; // inkluderer superklassen
        
        // Underklasse som arver fra Bruker-klassen i oppgave 1
        class KundeBruker extends Bruker {
            public $kundetype;

            // Konstruktør: bygger videre på Bruker og legger til kundetype
            public function __construct($fornavn, $etternavn, $fodselsdato, $kundetype) {
                // Kaller superklassens konstruktør
                parent::__construct($fornavn, $etternavn, $fodselsdato);
                $this->kundetype = $kundetype;
            }

            // Overstyrer hentBrukerInfo() fra Bruker
            public function hentBrukerInfo() {
                // Bruker originalmetoden og legger til kundetype
                return parent::hentBrukerInfo() . " | Kundetype: {$this->kundetype}";
            }
        }

        // Eksempel på bruk
        $kunde1 = new KundeBruker("Joel", "Markussen", "1995-04-12", "Premium");
        echo $kunde1->hentBrukerInfo();
        // Output: Navn: Joel Markussen | Brukernavn: joel.markussen | Fødselsdato: 1995-04-12 | Registrert: 2025-11-22 | Kundetype: Premium

       ?>
    </p>
  </main>
</body>
</html>
