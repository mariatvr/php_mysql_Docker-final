<?php
require_once "control_sesion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= "TU USUARIO ES {$_SESSION["user"]} y PASSWORD {$_SESSION["datos"]["password"]}" ;   ?>
    <form action="logout.php" method="post">
        <input type="image" src="salir.png" alt="">
    </form>
</body>
</html>