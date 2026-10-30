<?php
require_once "Digimon.php";

// PASO 5: named parameters. El orden ya no importa.
$agumon = new Digimon(nombre: "Agumon", tipo: "vacuna", ataque: 70, defensa: 50);
$palmon = new Digimon(defensa: 45, ataque: 55, tipo: "planta", nombre: "Palmon");
$gabumon = new Digimon("Gabumon", "animal", 65, 55); // también se puede por posición

echo $agumon->saludar() . "<br>";
echo $palmon->saludar() . "<br>";
echo $gabumon->saludar() . "<br>";

echo "<br>" . $agumon->combatir($gabumon) . "<br>";
echo $palmon->combatir($agumon) . "<br>";
