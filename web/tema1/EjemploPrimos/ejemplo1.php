<?php

$num1=  4332221111 ;
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
    echo "{$num1} es PRIMO";
else
    echo "{$num1} NO es PRIMO";