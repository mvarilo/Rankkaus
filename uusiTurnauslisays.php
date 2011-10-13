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
// yhteyden muodostus tietokantaan
        try {
            $yhteys = new PDO("pgsql:dbname=mvarilo",
                            "mvarilo", "muumitalo");
        } catch (PDOException $e) {
            die("VIRHE: " . $e->getMessage());
        }
        $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// kyselyn suoritus
        $kysely = $yhteys->prepare("INSERT INTO turnauslista (nimi, pvm) VALUES (?, ?)");
        $kysely->execute(array($_POST["nimi"], $_POST["pvm"]));

// lisätyn rivin id:n selvitys
        $id = $yhteys->lastInsertId("turnauslista_id_seq");
        echo "Uuden turnauksen id: $id</br>";
        ?>
    </body>
</html>
