<?php
//include_once "funciones2.php";
//declare(strict_types=1);
require_once "./funciones.php";


$n1=$_POST["n1"];
$n2=$_POST["n2"];

$mcd= mcd ($n1,$n2);
$mcm= mcm ($n1,$n2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// 3. Mostrar los resultados en pantalla
echo "<h2>Resultados obtenidos:</h2>";
echo "Primer número introducido: {$n1}<br>";
echo "Segundo número introducido: {$n2}<br><br>";
echo "<strong>M.C.D. ({$n1}, {$n2}):</strong> $mcd <br>";
echo "<strong>m.c.m. ({$n1}, {$n2}):</strong> $mcm <br><br>";

?>

<a href="./form_mcd_mcm.html">Calcular otros números</a>

    
</body>
</html>
