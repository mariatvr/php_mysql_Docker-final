<?php
require_once "Digimon.php";

$agumon = new Digimon("Agumon", "vacuna", 70, 50);
$palmon = new Digimon("Palmon", "planta", 55, 45);

// Esto ya NO funciona (atributo privado). Descomenta para ver el error:
// $agumon->ataque = -500;
// echo $agumon->ataque;

// Lectura mediante getter
echo "Ataque de Agumon: " . $agumon->getAtaque() . "<br>";

// Escritura mediante setter con validación
var_dump($agumon->setAtaque(-500)); // false: rechazado
echo "<br>Ataque tras intentar -500: " . $agumon->getAtaque() . "<br>";

var_dump($agumon->setAtaque(80));   // true: aceptado
echo "<br>Ataque tras asignar 80: " . $agumon->getAtaque() . "<br>";

echo "<br>" . $agumon->combatir($palmon) . "<br>";
