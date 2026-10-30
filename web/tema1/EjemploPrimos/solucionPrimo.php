<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$num1= (int) $_POST["numero"] ;
$esPrimo= true;

if  ($num1%2==0 && $num1>2){
  $esPrimo= false;  
}
$i=3;

while ($esPrimo && $i<(sqrt($num1)+1)){
    if ($num1%$i==0){
         $esPrimo=false;
    }
    $i+=2;

}
if ($esPrimo)
    echo "{$num1} es PRIMO<br>";
else
    echo "{$num1} NO es PRIMO<br>";
?>

</body>
</html>
