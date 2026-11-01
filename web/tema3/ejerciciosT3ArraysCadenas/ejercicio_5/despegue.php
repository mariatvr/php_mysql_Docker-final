<?php
session_start();

// Reiniciar la sesión y volver a la página de asientos
if (isset($_POST['reiniciar'])) {
    unset($_SESSION['ocupados']);
    header("Location: asientos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despegue del avión!!</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 100px;
        }
        button {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: blue;
            cursor: pointer;

        }
    </style>
</head>
<body>
<h1>¡EL AVIÓN DESPEGA!</h1>

    <img src="avionGIF.gif" alt="Avión despegando" width="400">
    <form action="despegue.php" method="post">
        <button type="submit" name="reiniciar">Volver a empezar</button>
    </form>
</body>
</html>