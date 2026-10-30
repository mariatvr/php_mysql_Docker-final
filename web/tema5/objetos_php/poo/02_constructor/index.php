<?php
// PASO 3: constructor. Cada Digimon nace con sus datos.
// Se llama automáticamente al hacer new (método "mágico").

class Digimon {
    public string $nombre;
    public string $tipo;   // planta, animal, virus, vacuna, elemental
    public int $ataque;
    public int $defensa;

    public function __construct(string $nombre, string $tipo, int $ataque, int $defensa)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
    }

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

$agumon = new Digimon("Agumon", "vacuna", 70, 50);
$palmon = new Digimon("Palmon", "planta", 55, 45);
$gabumon = new Digimon("Gabumon", "animal", 65, 55);

echo $agumon->saludar() . "<br>";
echo $palmon->saludar() . "<br>";
echo $gabumon->saludar() . "<br>";

echo "<br>" . $agumon->combatir($gabumon) . "<br>";
echo $palmon->combatir($agumon) . "<br>";
