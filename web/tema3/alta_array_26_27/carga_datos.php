<?php
session_start();
$datosIniciales = [
    "2222222Z" => [
        "nick" => "rosa",
        "nss" => "12345678",
        "password" => "1234",
        "edad" => "34",
        "equipo" => "ELX",
        "genero" => "F",
        "aficiones" => ["Sofing"],
    ],
    "33333333T" => [
        "nick" => "luis",
        "nss" => "12345679",
        "password" => "1234",
        "edad" => "44",
        "equipo" => "BAR",
        "genero" => "NA",
        "aficiones" => ["Baloncesto", "Futbol"],
    ],
    "44444444R" => [
        "nick" => "Manuel",
        "nss" => "11111111",
        "password" => "1234",
        "edad" => "33",
        "equipo" => "ELX",
        "genero" => "M",
        "aficiones" => [],
    ],
];
$_SESSION["datos"]=$datosIniciales;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>CARGA DE DATOS </h2>
    <a href="inicio.php">EMPEZAR</a>
    <pre>
    <?php var_dump($_SESSION["datos"]) ?>
    </pre>
    <a href="inicio.php">EMPEZAR</a>
    
</pre>
</body>
</html>
