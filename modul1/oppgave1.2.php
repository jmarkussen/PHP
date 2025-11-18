<!DOCTYPE html>
<html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppgave 2</title>¨
<!-- en stil som gjør sånn at klassen alltid har to mellomrom til neste element-->
    <style> 
        .space {
    margin-top: 20px;
    margin-bottom: 20px;
    } 
    </style>
</head>
<body>

<!--Dette er teksten som svarerer på oppgaven, sentrert slik at det ser litt bedre ut-->

<h1 class="space" style="text-align: center;">Dette er resultatet av funksjonen phpinfo()</h1>

<p class= "space" style="text-align: center";>
display_errors er satt til: on
</p>
<p class= "space" style="text-align: center";>
document_root er satt til: C:/xampp/htdocs
</p>
<p class= "space" style="text-align: center";>
Det er lurt å kjenne til funksjonen phpinfo() da det er en innebygd funksjon i PHP som lar oss
se hvordan PHP er konfigurert på vår webtjener. Ved å bruke funksjonen kan en enkelt få all informasjon man trenger,
uten å måtte søke rundt i directories, filer eller instillinger.
</p>

<!-- et script som kjører den innebygde funksjonen phpinfo(); -->
<p>  
<?php
phpinfo();
?>
</p>

</body>
</html>