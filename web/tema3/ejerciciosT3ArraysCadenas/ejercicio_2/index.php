<?php

// Inicializar variables para mensajes de error y éxito que vienen de validar.php
$error = $_GET['error'] ?? "";
$exito = $_GET['exito'] ?? "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar fecha</title>
    <style>
        .alerta-error {
            color: white;
            background-color: #dc3545;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            font-family: sans-serif;
            display: inline-block;
        }
        .alerta-exito {
            color: white;
            background-color: #28a745;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            font-family: sans-serif;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>EJERCICIO COMPROBAR FECHAS</h2>
    <form action="./validar.php" method="post">
        <label for="fecha">Introduce una fecha: </label><br><br>
        <input type="text" name="fecha" placeholder="DD/MM/AAAA" required>
        <button type="submit">Validar</button>
    </form>
    <br>
    // Mostrar mensajes de error o éxito
    <?php if (!empty($error)): ?>
            <div class="alerta-error">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($exito)): ?>
            <div class="alerta-exito">
                <?= $exito; ?>
            </div>
        <?php endif; ?>
</body>
</html>