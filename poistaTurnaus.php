<?php
session_start();
try {
    $yhteys = new PDO("pgsql:dbname=mvarilo",
                    "mvarilo", "muumitalo");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// kyselyn suoritus
$kysely = $yhteys->prepare("DELETE FROM turnauslista (id) VALUES (?)");
$kysely->execute(array($_POST["id"]));
echo $_POST["id"];
header("Location: turnauslista.php");
?>
