<?php

        class Bruker {
            // Klasseegenskaper
            public $fornavn;
            public $etternavn;
            public $brukernavn;
            public $fodselsdato;
            public $registreringsdato;

            // Konstruktør, fyller inn info med parametere når det instansieres en new instans av klassen
            public function __construct($fornavn, $etternavn, $fodselsdato) {
                $this->fornavn = $fornavn;
                $this->etternavn = $etternavn;
                $this->fodselsdato = $fodselsdato;
                $this->brukernavn = strtolower($fornavn . "." . $etternavn);
                $this->registreringsdato = date("Y-m-d");
            }

            // Klassemetode 1: Fullt navn
            public function hentFulltNavn() {
                return $this->fornavn . " " . $this->etternavn;
            }

            // Klassemetode 2: Info om brukeren
            public function hentBrukerInfo() {
                return "Navn: " . $this->hentFulltNavn() .
                    " | Brukernavn: " . $this->brukernavn .
                    " | Fødselsdato: " . $this->fodselsdato .
                    " | Registrert: " . $this->registreringsdato;
            }
        }
        ?>