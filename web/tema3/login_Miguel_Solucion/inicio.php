<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido al sistema <?= isset($_GET['usuario']) ? $_GET['usuario'] : 'SIN NOMBRE' ?></h1>
    <p>Has iniciado sesión correctamente.</p>
</body>
</html>