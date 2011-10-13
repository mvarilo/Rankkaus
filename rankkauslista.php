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
        session_start();
        $kayttajat = array("Matti" => "muumi");
        $tunnus = $_SESSION["tunnus"];
        if (!isset($kayttajat[$tunnus])) {
            echo "<p>Tunnus: <b>Ei kirjautunut</b></p>";
        } else {
            echo "<p>Tunnus: <b>$tunnus</b></p>";
        }
        echo "<p><a href=\"turnauslista.php\">Turnauslista</a></br>";
        echo "<a href=\"rankkauslista.php\">Rankkauslista</a></p>";
        if (!isset($kayttajat[$tunnus])) {
            echo "<p><a href=\"index.php\">Pääsivu</a></p>";
        } else {
            echo "<p><a href=\"logout.php\">Kirjaudu ulos</a></p>";
        }
        echo "<h3>Rankkauslista</h3>";
// yhteyden muodostus tietokantaan
        try {
            $yhteys = new PDO("pgsql:dbname=mvarilo",
                            "mvarilo", "muumitalo");
        } catch (PDOException $e) {
            die("VIRHE: " . $e->getMessage());
        }
        $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // kyselyn suoritus     
        $kysely = $yhteys->prepare("SELECT * FROM pelaaja ORDER BY pisteet DESC");
        $kysely->execute();


        // haettujen rivien tulostus
// haettujen rivien tulostus
        echo "<table border>";
        $i = 1;
        while ($rivi = $kysely->fetch()) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $rivi["nimi"] . "</td>";
            echo "<td>" . $rivi["pisteet"] . "</td>";
            echo "</tr>";
            $i++;
        }
        ?>
    </body>
</html>
