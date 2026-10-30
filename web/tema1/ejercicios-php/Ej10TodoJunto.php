<?php

$mostrarResultado = false;

// isset comprueba si una variable está declarada y es diferente a null
if (isset ($_GET["n1"]) && isset ($_GET["n2"]) && isset ($_GET["n3"])) {
    // Recogidas de datos
    $num1 = (int) $_GET["n1"];
    $num2 = (int) $_GET["n2"];
    $num3 = (int) $_GET["n3"];

    $mostrarResultado = true;
    
    if($num1 > $num2 && $num1 > $num3){
        if($num2 > $num3){
            $cadena = "Ordenados de menor a mayor: {$num3}, {$num2} y {$num1}";
        } else {
            $cadena = "Ordenados de menor a mayor: {$num2}, {$num3} y {$num1}";
        }
    } elseif($num2 > $num1 && $num2 > $num3){
        if($num1 > $num3){
            $cadena = "Ordenados de menor a mayor: {$num3}, {$num1} y {$num2}";
        } else {
            $cadena = "Ordenados de menor a mayor: {$num1}, {$num3} y {$num2}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./Ej10TodoJunto.php" method="get">
        <label for="">
            Número 1: <input type="text" name="n1" id="n1"><br>
            Número 2: <input type="text" name="n2" id="n2"><br>
            Número 3: <input type="text" name="n3" id="n3"><br>
        </label>
        <button type="submit">Calcular</button>
    </form>

    <?= $mostrarResultado?"<h3>RESULTADO:</h3>{$cadena}":""; ?>
</body>
</html>