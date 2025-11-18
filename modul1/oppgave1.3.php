<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oppgave 3</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-center p-5">

  <h1 class="text-primary">Alderen til en person</h1>


  <!--   Først definerer jeg variablene, personens navn og alder. -->
  <?php
    $navn = "Per";
    $alder = 40;
  ?>
  
  <!-- inter ut navn og alder på en person i en tabell. -->

  <table style="border : 1">
  <tr>
    <th>Navn</th>
    <th>Alder</th>
  </tr>
  <tr>
    <td><?php echo $navn; ?></td>
    <td><?php echo $alder; ?></td>
  </tr>
</table>

<br> 
<br>
<!-- En nummerert liste -->

<ol>
  <li>Navn: <?php echo $navn; ?></li>
  <li>Alder: <?php echo $alder; ?></li>
</ol>

<br>
<br>

<!-- En unnummerert liste -->

<ul>
  <li>Navn: <?php echo $navn; ?></li>
  <li>Alder: <?php echo $alder; ?></li>
</ul>

<br>
<br>

<p><?php echo "$navn er $alder år gammel."; ?></p>


</body>
</html>
