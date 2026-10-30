<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$num=7;

for ($i=1;$i<=10;$i++){
    $resultado=$num*$i;
    echo "{$num} * {$i} = {$resultado}<br>";
}
?>
</body>
</html>

$numero=$_POST["numero"];
echo "/****TABLA DEL [{$numero}] ****/";    
echo "<table border=1>";
for ($i=1;$i<=10;$i++){
    $resultado=$numero*$i;
    $fondo="WHITE"; $letra="BLACK";
    if ($i%2==0){
        $fondo="BLACK"; $letra="WHITE";
    }

    echo "<tr bgcolor={$fondo} style='color:{$letra}'> <td>
        <font color={$letra}>{$numero} * {$i} = {$resultado}</font></td></tr>";

}

