<?php
// PASO 1-2: clase básica, atributos y métodos, instanciación con new.
// Aún SIN constructor: los atributos se asignan a mano.

class Digimon {
    public string $nombre;
    public string $tipo;   // planta, animal, virus, vacuna, elemental
    public int $ataque;
    public int $defensa;


    public function saludar(): string {
        return "Soy {$this->nombre}, tipo {$this->tipo}.";
    }

    public function poderTotal(): int {
        return $this->ataque + $this->defensa;
    }

    public function combatir(Digimon $enemigo): string {
        if ($this->poderTotal() > $enemigo->poderTotal()) {
            return "{$this->nombre} vence a {$enemigo->nombre}!";
        } elseif ($this->poderTotal() < $enemigo->poderTotal()) {
            return "{$this->nombre} pierde contra {$enemigo->nombre}.";
        }
        return "{$this->nombre} y {$enemigo->nombre} empatan.";
    }
}

$agumon = new Digimon();
$agumon->nombre = "Agumon";
$agumon->tipo = "vacuna";
$agumon->ataque = 70;
$agumon->defensa = 50;

$palmon = new Digimon();
$palmon->nombre = "Palmon";
$palmon->tipo = "planta";
$palmon->ataque = 55;
$palmon->defensa = 45;

echo $agumon->saludar() . "<br>";
echo $palmon->saludar() . "<br>";
echo "<br>" . $agumon->combatir($palmon) . "<br>";

// Para ver cómo es un objeto por dentro:
var_dump($agumon);
