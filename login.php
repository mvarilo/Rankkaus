<?php

$kayttajat = array("Matti" => "muumi");
$tunnus = $_POST["tunnus"];
$salasana = $_POST["salasana"];
if (!isset($kayttajat[$tunnus])) {
    die("Virheellinen tunnus tai salasana!");
}
if ($kayttajat[$tunnus] <> $salasana) {
    die("Virheellinen tunnus tai salasana!");
}
$_SESSION["tunnus"] = $tunnus;
echo "<p>Kirjautuminen onnistui!</p>";
echo "<p>Tunnus: $tunnus</p>";
echo "<p><a href=\"logout.php\">Kirjaudu ulos</a></p>";
?>