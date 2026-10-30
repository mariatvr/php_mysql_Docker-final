<?php
/* tipos de php
int, float, string, bool, array, object
void, mixed */


// 1. Calcular el M.C.D.
function mcd (int $n1,int $n2){
    $menor=$n2; $mayor=$n1;
    if ($n1<$n2){
        $menor=$n1;
        $mayor=$n2;
    }
    $i=$menor;
    $encontrado=false;
    $mcd=1;
    while ($i>=1 &&!$encontrado){
        if ($n1%$i==0 && $n2%$i==0 ){
            $mcd=$i;
            $encontrado=true; // break
        }
        $i--;
    }
    return $mcd;
}

// 2. Calcular el m.c.m.
function mcm ($n1,$n2){
    $menor=$n2; $mayor=$n1;
    if ($n1<$n2){
        $menor=$n1;
        $mayor=$n2;
    }
    $i=$mayor;
    $encontrado=false;
    $mcm=$n1*$n2;

    while ($i<=$n1*$n2 && !$encontrado){
        if ($i%$n1==0 && $i%$n2==0 ){
            $mcm=$i;
            $encontrado=true;
        }
        $i++;
    }
    return $mcm;
}