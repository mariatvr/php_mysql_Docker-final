<?php

if (!isset($_POST['usuario'])) {
    header("location: login.php");
    exit(); 
}


    // Datos de usuarios y contraseñas
    /*
$usuarios = [
    ['usuario' => 'admin', 'contrasena' => '1234'],
    ['usuario' => 'user', 'contrasena' => 'abcd'],
    ['usuario' => 'patata', 'contrasena' => 'patata']
];
*/
$usuarios = [
    "rosa=>rosa",
    "pepe=>pepe",
    "patata=>patata",
];

//recojo datos
$irInicio = false;
$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['contrasena'] ?? '';

//compruebo usuario y contraseña
/*
foreach ($usuarios as $u) {
    if ($u['usuario'] === $usuario && $u['contrasena'] === $clave) {
        $irInicio = true;
        break;
    }
}
    */
if (isset($usuarios[$usuario]) && $usuarios[$usuario] == $clave) {
    header("location:inicio.php?usuario=$usuario");
    exit ();
}

//if todo correcto voy a inicio.php
if ($irInicio)
    header ("location:inicio.php?usuario=$usuario");
//else voy a login.php; muestro error y mantengo usuario
else
    header ("location: login.php?usuario=$usuario&error=1");
?>