<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Oppgave 2</title>
</head>
    <body>


       <?php
        function erAnagram($ord1, $ord2) {
            // Fjern mellomrom og gjør alt til små bokstaver
            $ord1 = strtolower(str_replace(' ', '', $ord1));
            $ord2 = strtolower(str_replace(' ', '', $ord2));

            // Sjekk om lengden er lik
            if (strlen($ord1) !== strlen($ord2)) {
                return false;
            }

            // Sorter bokstavene i begge ordene
            $bokstaver1 = str_split($ord1);
            $bokstaver2 = str_split($ord2);
            sort($bokstaver1);
            sort($bokstaver2);

            // Sammenlign de sorterte bokstavene
            return $bokstaver1 === $bokstaver2;
        }

        // Eksempelbruk
        $ord1 = "Jagerfly";
        $ord2 = "Post";

        if (erAnagram($ord1, $ord2)) {
            echo "\"$ord1\" er et anagram av \"$ord2\".";
        } else {
            echo "\"$ord1\" er IKKE et anagram av \"$ord2\".";
        }
        ?>

    </body>
</html>
