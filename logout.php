<?php
    session_start();
unset($_SESSION["tunnus"]);
header("Location: index.php");
?>