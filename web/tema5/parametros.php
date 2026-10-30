<?php 
//los parametros por defecto van detrás del todo, como en este caso la altura. No es posible ponerlo el primero
function userInfo(string $name, int $age, int $altura=185, int $jamon=3, int $lechuga=5, int $peso=70): string { 
    return "Nombre {$name}, edad {$age} altura{$altura}"; 
} 
 
$edad=39; $nombre="Israel"; $medida=195; $peso=100;
echo userInfo(age: $edad, name: $nombre, peso:$peso);

?>