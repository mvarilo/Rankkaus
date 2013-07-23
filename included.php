<?php

session_start();
$kayttajat = array("Matti" => "muumi");
$tunnus = $_SESSION["tunnus"];
if (!isset($kayttajat[$tunnus])) {
    echo "Et ole kirjautunut! Ohjataan kirjautumissivulle";
    sleep(3);
    header("Location: index.html");
}
echo "<p>Tunnus: <b>$tunnus</b></p>";
echo "<p><a href=\"turnauslista.php\">Turnauslista</a></br>";
echo "<a href=\"rankkauslista.php\">Rankkauslista</a></p>";
echo "<p><a href=\"logout.php\">Kirjaudu ulos</a></p>";
?>
