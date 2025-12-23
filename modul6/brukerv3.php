<?php
class BrukerV3 {
    public $fornavn;
    public $etternavn;
    public $fodselsdato;
    protected $brukernavn;
    protected $registreringsdato;

    // Statisk matrise for slettede brukere
    public static $slettedeBrukere = [];

    public function __construct($fornavn, $etternavn, $fodselsdato) {
        $this->fornavn = $fornavn;
        $this->etternavn = $etternavn;
        $this->fodselsdato = $fodselsdato;

        // Generer tilfeldig brukernavn
        $this->brukernavn = "user_" . uniqid();

        // Sett registreringsdato automatisk
        $this->registreringsdato = date("Y-m-d");
    }

    public function hentBrukerInfo() {
        return "Navn: {$this->fornavn} {$this->etternavn} | Brukernavn: {$this->brukernavn} | Registrert: {$this->registreringsdato}";
    }

    public function __destruct() {
        // Legg brukernavn til slettede brukere
        self::$slettedeBrukere[] = $this->brukernavn;
    }
}
?>
