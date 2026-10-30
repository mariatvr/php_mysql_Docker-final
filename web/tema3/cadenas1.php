<?php

$cadena="Hola";

//Array, pero que se distingue

echo "{$cadena[0]}"; //H //El profe recomienda ponerlo entre llaves el atributo cadena siempre

for($i=0;$i<strlen($cadena);$i++){
    echo "{$cadena[$i]}<br>"; //la cadena simple '' no acepta llaves {}, al cadena doble "" sí, y es recomendable ponerlo entre llaves siempre
    }


    //funciones básicas de cadenas
