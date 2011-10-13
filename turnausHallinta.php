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
        ?>
        <form action="uusiTurnauslisays.php" method="post">
            <h3>Lisää uusi turnaus:</h3>
            <p>Nimi: <br>
                <input type="text" name="nimi"></p>
            <p>Pvm: <br>
                <input type="text" name="pvm"></p>
            <input type="submit" value="Uusi turnaus">
        </form>
        <h3>Poista turnaus:</h3>
        <?php
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
        ?>
        <form action="poistaTurnaus.php" method="post">
            <select name="id">
                <?php
                $i = 1;
                while ($rivi = $kysely->fetch()) {
                    echo "<option value='$i'>" . $rivi["id"] . " - " . $rivi["nimi"] . "</option>";
                    $i++;
                }
                ?>
                <input type="submit" value="submit" name="submit">
            </select>
        </form>
    </body>
</html>
