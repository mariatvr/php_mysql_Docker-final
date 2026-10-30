<?php
session_start();

//control de sesiones
if(isset ($_SESSION["usuarios"])){
    $_SESSION=[];
    session_destroy();
    header("location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido al sistema <?= $_SESSION["usuario"] ?></h1>
    <p>Has iniciado sesión correctamente.</p>
</body>
</html>