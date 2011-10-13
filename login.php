<?php

session_start();
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
header("Location: main.php");
?>