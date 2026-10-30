<?php
//declare(strict_types=1);
//include_once "funciones.php";
require_once "funciones.php";

$n1 = (int) $_GET["n1"];
$n2 = (int) $_GET["n2"];


// 1. Calcular el M.C.D.
$mcd = mcd($n1, $n2);

// 2. Calcular el M.C.M.
$mcm= mcm($n1, $n2);



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular MCD y mcm</title>
</head>
<body>
    <form action="mcd_mcm.php" method="get">
        <!-- Primer Campo -->
        <label for="n1">Primer Número:</label>
        <input type="text" name="n1" id="n1" required>
        <br><br>
        <!-- Segundo Campo -->
        <label for="n2">Segundo Número:</label>
        <input type="number" name="n2" id="n2" required>
        <br><br>
        <!-- Botón de envío -->
        <button type="submit">Calcular</button>
    </form>

    <?php
    echo "<h2>Resultados obtenidos:</h2>";
echo "Primer número introducido: {$num1}<br>";
echo "Segundo número introducido: {$num2}<br><br>";
echo "<strong>M.C.D. ({$num1}, {$num2}):</strong> $mcd <br>";
echo "<strong>m.c.m. ({$num1}, {$num2}):</strong> $mcm <br><br>";

    ?>
</body>
</html>