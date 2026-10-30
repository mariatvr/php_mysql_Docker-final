<?php
require_once "Digimon.php";

$agumon = new Digimon("Agumon", "vacuna", 70, 50);
$palmon = new Digimon("Palmon", "planta", 55, 45);
$gabumon = new Digimon("Gabumon", "animal", 65, 55);

echo $agumon->saludar() . "<br>";
echo $palmon->saludar() . "<br>";
echo $gabumon->saludar() . "<br>";

echo "<br>" . $agumon->combatir($gabumon) . "<br>";
echo $palmon->combatir($agumon) . "<br>";
