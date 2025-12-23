<?php
require_once "BrukerV3.php";

class KundeBrukerV3 extends BrukerV3 {
    public $kundetype;

    public function __construct($fornavn, $etternavn, $fodselsdato, $kundetype) {
        parent::__construct($fornavn, $etternavn, $fodselsdato);
        $this->kundetype = $kundetype;
    }

    public function hentBrukerInfo() {
        return parent::hentBrukerInfo() . " | Kundetype: {$this->kundetype}";
    }
}
?>
