<?php
// PASO 4: la clase en su propio archivo.

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
