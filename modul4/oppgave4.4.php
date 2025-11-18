


<?php
//Vi lager en API chatbot der man kan skrive inn EAN og få prisen på matvarer
// Lager en matrise med flere matvarer
$matvarer = [
    [
        "navn" => "Melk 1L",               // Navn på produktet
        "ean" => "1234567890123",          // EAN-kode
        "butikker" => [                    // Liste over butikker med pris
            ["navn" => "Rema 1000", "pris" => 19.90],
            ["navn" => "Coop", "pris" => 21.50],
            ["navn" => "Meny", "pris" => 22.00]
        ]
    ],
    [
        "navn" => "Brød Grovt",
        "ean" => "9876543210987",
        "butikker" => [
            ["navn" => "Rema 1000", "pris" => 29.90],
            ["navn" => "Coop", "pris" => 31.00],
            ["navn" => "Meny", "pris" => 33.50]
        ]
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Matvarer</title>
</head>
<body>

<h1>Liste over matvarer</h1>

<table border="1">
    <tr>
        <th>Navn</th>
        <th>EAN</th>
        <th>Butikk</th>
        <th>Pris</th>
    </tr>

    <!-- Gå gjennom  matvarer-->
    <?php foreach ($matvarer as $vare): ?>
        <!-- Gå gjennom hver butikk for den matvaren -->
        <?php foreach ($vare["butikker"] as $butikk): ?>
            <tr>
                <td><?php echo $vare["navn"]; ?></td>       
                <td><?php echo $vare["ean"]; ?></td>        
                <td><?php echo $butikk["pris"]; ?> kr</td>  
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>

</body>
</html>
