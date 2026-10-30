<?php
require_once "Digimon.php";
require_once "Equipo.php";

$agumon = new Digimon("Agumon", "vacuna", 70, 50);
$palmon = new Digimon("Palmon", "planta", 55, 45);
$gabumon = new Digimon("Gabumon", "animal", 65, 55);
$gomamon = new Digimon("Gomamon", "animal", 50, 60);

$equipoA = new Equipo("Elegidos");
$equipoA->anadir($agumon);
$equipoA->anadir($palmon);

$equipoB = new Equipo("Rivales");
$equipoB->anadir($gabumon);
$equipoB->anadir($gomamon);

echo $equipoA->mostrar() . "Poder total: " . $equipoA->poderTotal() . "<br><br>";
echo $equipoB->mostrar() . "Poder total: " . $equipoB->poderTotal() . "<br><br>";

echo $equipoA->combatir($equipoB) . "<br>";
