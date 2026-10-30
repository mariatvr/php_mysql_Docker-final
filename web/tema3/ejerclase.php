<?php

function comprobarEmail(string $resena):bool {

   $posArroba = mb_strpos($resena, '@');
    $tieneEmail = false;
    
    if ($posArroba !== false) {
        $posPunto = mb_strpos($resena, '.', $posArroba);
        if ($posPunto !== false) {
            $tieneEmail = true;
        }
    }
    return $tieneEmail;
}



$mostrar_resenya=false;
if (isset ($_POST["nombre"],$_POST['titulo'] ,$_POST['resena'] )) {
    $mostrar_resenya=true;
    // 1. Recepción y limpieza inicial
    $nombre = trim($_POST['nombre'] ?? '');
    $titulo = trim($_POST['titulo'] ?? '');
    $resena = trim($_POST['resena'] ?? '');
    $nota   = (float)($_POST['nota'] ?? 0);

    // 1. Formatear nombre: minúsculas + mayúscula en cada palabra
    $nombreFormateado = ucwords(mb_strtolower($nombre));

    // 2. Comprobación de Email en la reseña
    $tieneEmail = comprobarEmail($resena);

    // 3. Censura de palabras (Case-insensitive)
    // es lo mismo que el str_replace pero sin distinguir mayuscula de minusculas
    $palabrasProhibidas = ['malo', 'estafa', 'basura'];
    $resenaCensurada = str_ireplace($palabrasProhibidas, '****', $resena);

    // 4. Métricas y vista previa. Cantidad total caracteres que no bytes
    $longitudCaracteres = mb_strlen($resenaCensurada);
    
    $vistaPrevia = mb_substr($resenaCensurada, 0, 50);
    if ($longitudCaracteres > 50) {
        $vistaPrevia .= '...';
    }

    // 5. Formateo para la salida HTML
    $errorNota=true     ;
    if ($nota>=0 && $nota<=5){
        $errorNota=false;
        
    }
    $notaFormateada = number_format($nota, 1, ',', '.');
    $resenaHTML = nl2br($resenaCensurada);
   
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Cadenas PHP</title>
</head>
<body>

    <h2>Publicar Reseña</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Título:</label><br>
        <input type="text" name="titulo" required><br><br>

        <label>Reseña:</label><br>
        <textarea name="resena" rows="5" cols="40" required></textarea><br><br>

        <label>Puntuación (1 al 5):</label><br>
        <input type="number" min="0" max="5" step="0.01" name="nota" required><br><br>

        <button type="submit">Enviar Reseña</button>
    </form>

    <?php if ($mostrar_resenya){ ?>
        <hr>
        <h3>Resultado del Procesamiento</h3>

        <?php if ($tieneEmail){ ?>
            <p style="color: red;"><strong>⚠️ Alerta:</strong> Hemos detectado una dirección de correo en su comentario. Recuerde no compartir datos personales.</p>
        <?php } ?>

        <p><strong>Usuario:</strong> <?= $nombreFormateado ?></p>
        <?php if ($errorNota){ ?>
            <p style="color: red;"><strong>⚠️ Error:</strong> La puntuación debe estar entre 0 y 5.</p>
         <?php
         }else{} ?>
        <p><strong>Puntuación:</strong> <?= $notaFormateada ?> / 5</p>
        <p><strong>Título:</strong> <?= mb_strtoupper($titulo) ?></p>
        <p><strong>Longitud real:</strong> <?= $longitudCaracteres ?> caracteres</p>
        <p><strong>Vista previa:</strong> <em>"<?= $vistaPrevia ?>"</em></p>
        
        <h4>Cuerpo de la reseña:</h4>
        <div style="background-color: #f4f4f4; padding: 10px;">
            <?= $resenaHTML ?>
        </div>
    <?php } ?>

</body>
</html>