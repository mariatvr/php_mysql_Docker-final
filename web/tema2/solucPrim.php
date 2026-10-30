<?php

$num1 = (int) $_GET["numero"] ;
$esPrimo=true;

if ($num1%2==0 && $num1>2){
    $esPrimo=false;

}
$i=3;

while ($esPrimo && $i<(sqrt($num1)+1)){
        if ($num1%$i==0){
            $esPrimo=false;
        }
    $i+=2;
}

/*
$num1= 19;
$esPrimo=true;
$i=2; //necesario para la opcion de while

//CON WHILE
while ($esPrimo && $i<$num1){
        if ($num1%$i==0){
            $esPrimo=false;
        }
    $i++;
}

/* CON FOR
for ($i=2;$i<$num1;$i++){
    if($num1%$i==0){
        $esPrimo=false;
    }
}
    */

if ($esPrimo) 
    echo"{$num1} es PRIMO";
else 
    echo "{$num1} NO es PRIMO";
