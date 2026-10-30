<?php

$error = $_GET['error'] ?? "";
$exito = $_GET['exito'] ?? "";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifrar y descifrar</title>
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }

        form {
            display: inline-block;
            padding: 20px;
        }

        input {
            margin: 8px;
            padding: 8px;
        }

        button {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .btn-cifrar {
            background-color: royalblue;
        }

        .btn-descifrar {
            background-color: seagreen;
        }

        .alerta-error {
            color: red;
            margin-top: 20px;
        }

        .alerta-exito {
            color: green;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Cifrar y descifrar mensajes</h1>

    <form method="post">
        <label for="mensaje">Mensaje:</label><br>
        <input type="text" id="mensaje" name="mensaje" required><br>

        <label for="semilla">Semilla:</label><br>
        <input type="text" id="semilla" name="semilla" required><br><br>

        <button class="btn-cifrar" type="submit" formaction="./cifrar.php">Cifrar</button>

        <button class="btn-descifrar" type="submit" formaction="./descifrar.php">Descifrar</button>
    </form>
    <br>
        <?php if (!empty($error)): ?>
        <div class="resultado alerta-error">
            <?= $error; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($exito)): ?>
            <div class="resultado alerta-exito">
                <?= $exito; ?>
            </div>
        <?php endif; ?>
    </body>
</html>
