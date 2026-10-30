<?php

$nombre = $_POST["nombre"];
$titulo = $_POST["titulo"];
$reseña = $_POST["reseña"];
$calificacion = $_POST["calificacion"];

$nombre=trim($nombre);
$titulo=trim($titulo);
$reseña=trim($reseña);
$calificacion=trim($calificacion);


$nombre=ucwords(strtolower($nombre));

$contieneEmail = false;
    $posArroba = mb_strpos($reseña, '@');
 
    if ($posArroba !== false) {
        $posPuntoDespuesArroba = mb_strpos($reseña, '.', $posArroba);
        if ($posPuntoDespuesArroba !== false) {
            $contieneEmail = true;
        }
    }

    if ($contieneEmail) {
        echo "<p>La reseña contiene una dirección de correo electrónico. Por favor, elimínala.</p>";
    }

    $palabrasProhibidas = ['malo', 'estafa', 'basura'];
    $reemplazo = '****';
    $cuerpoCensurado = str_ireplace($palabrasProhibidas, $reemplazo, $reseña);

echo "<h3>Reseña de libro</h3>";
echo "<p>Nombre del lector: {$nombre}</p>";
echo "<p>Título de la reseña: {$titulo}</p>";
echo "<p>Reseña: {$cuerpoCensurado}</p>";
echo "<p>Calificación: {$calificacion}</p>";

?>