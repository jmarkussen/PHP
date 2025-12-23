<?php
class Validering {
    // Valider e-post
    public function validerEpost($epost) {
        if (filter_var($epost, FILTER_VALIDATE_EMAIL)) {
            return "E-postadressen '$epost' er gyldig ";
        } else {
            return "E-postadressen '$epost' er ugyldig  (må ha korrekt format, f.eks. navn@domene.no)";
        }
    }

    // Valider passord
    public function validerPassord($passord) {
        $feil = [];

        if (!preg_match('/[A-Z]/', $passord)) {
            $feil[] = "må inneholde minst én stor bokstav";
        }
        if (preg_match_all('/[0-9]/', $passord) < 2) {
            $feil[] = "må inneholde minst to tall";
        }
        if (!preg_match('/[\W_]/', $passord)) {
            $feil[] = "må inneholde minst ett spesialtegn";
        }
        if (strlen($passord) < 9) {
            $feil[] = "må være minst 9 tegn langt";
        }

        if (empty($feil)) {
            return "Passordet er gyldig";
        } else {
            return "Passordet er ugyldig  (" . implode(", ", $feil) . ")";
        }
    }

    // Valider norsk mobilnummer
    public function validerMobil($mobil) {
        if (preg_match('/^(4|9)\d{7}$/', $mobil)) {
            return "Mobilnummeret '$mobil' er gyldig ";
        } else {
            return "Mobilnummeret '$mobil' er ugyldig (må være 8 sifre og starte med 4 eller 9)";
        }
    }
}
?>
