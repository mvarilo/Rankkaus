<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Kirjautuminen</title>
        <style type="text/css" media="all">
            @import "moro.css";
        </style>
    </head>
    <body>
        <form action="login.php" method="post">
            <p>Nimi: <br>
                <input type="name" name="tunnus">
            </p>
            <p>Salasana: <br>
                <input type="password" name="salasana">
            </p>
            <input type="submit" value="Kirjaudu">
        </form>
        <?php
        echo "<br/><a href=\"rankkauslista.php\">Rankkauslista</a></p>";
        ?>
    </body>
</html>
