<!DOCTYPE html>
<html>
<head>
    <title>
        Hei
    </title>
</head>
<body>
    <h1>Testing</h1>
    <br>
    <p>
        <?php


          function areal($r = 5)
          {
            $areal = pi() * $r * $r;

            return round($areal, 2);
          }

        $areal = areal();
        echo $areal;
        ?>


        <?php

          


        ?>
    </p>
</body>
</html>