<?php

$mostrarResultado = false;

// isset comprueba si una variable está declarada y es diferente a null
if (isset ($_GET["n1"])) {
    // Recogidas de datos
    $num1 = (int) $_GET["n1"];
    
    $mostrarResultado = true;
    $cadena = "";

    for($i = 1; $i <= $num1; $i++){
        for($x = 1; $x <= $i; $x++){
            $cadena = $cadena. $x;
        }
        $cadena.="<br>";
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
    <form action="./Ej20TodoJunto.php" method="get">
        <label for="">
            Número 1: <input type="text" name="n1" id="n1"><br>
            Número 2: <input type="text" name="n2" id="n2"><br>
        </label>
        <button type="submit">Calcular</button>
    </form>

    <?= $mostrarResultado?"<h3>RESULTADO:</h3>{$cadena}":""; ?> //esto se pone así cuando quiero meter solo una linea de código, si quiero meter varias líneas de código, entonces se pone así: ?php
</body>
</html>