<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style type="text/css" media="all">
            @import "moro.css";
        </style>
    </head>
    <body>
        <?php
        include 'included.php';
        echo "<h3>Turnauslista</h3>";
// yhteyden muodostus tietokantaan
        try {
            $yhteys = new PDO("pgsql:dbname=mvarilo",
                            "mvarilo", "muumitalo");
        } catch (PDOException $e) {
            die("VIRHE: " . $e->getMessage());
        }
        $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// kyselyn suoritus     
        $kysely = $yhteys->prepare("SELECT * FROM turnauslista");
        $kysely->execute();

// haettujen rivien tulostus
        echo "<table border>";
        while ($rivi = $kysely->fetch()) {
            echo "<tr>";
            echo "<td>" . $rivi["id"] . "</td>";
            echo "<td>" . $rivi["nimi"] . "</td>";
            echo "<td>" . $rivi["pvm"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<p><a href=\"turnausHallinta.php\">Turnausten hallinta</a></br>";
        ?>
    </body>
</html>
