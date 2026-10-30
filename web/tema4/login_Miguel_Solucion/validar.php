<?php

$usuarios = [
    ['usuario' => 'admin', 'contrasena' => '1234'],
    ['usuario' => 'user', 'contrasena' => 'abcd'],
    ['usuario' => 'patata', 'contrasena' => 'patata']
];

//recojo datos
$irInicio = false;
$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['contrasena'] ?? '';

//compruebo usuario y contraseña
foreach ($usuarios as $u) {
    if ($u['usuario'] === $usuario && $u['contrasena'] === $clave) {
        $irInicio = true;
        break;
    }
}

//if todo correcto voy a inicio.php
if ($irInicio){
    //Aquí es el único caso donde el session start se puede poner ahi, normalmente siempre poner arriba en la primera línea
    session_start();
    $_SESSION["usuario"]=$usuario;
    header ("location:inicio.php");
    //siempre después de un header location un exit
    exit;
    }
//else voy a login.php; muestro error y mantengo usuario
else
    header ("location: login.php?usuario=$usuario&error=1");
    exit;
?>