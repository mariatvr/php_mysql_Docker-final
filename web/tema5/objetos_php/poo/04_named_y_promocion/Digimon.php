<?php
// PASO 6: promoción de propiedades del constructor.
// Los atributos ya no se declaran arriba ni se asignan a mano:
// se declaran en los paréntesis del constructor.

class Digimon {
    public function __construct(
        public string $nombre,
        public string $tipo,   // planta, animal, virus, vacuna, elemental
        public int $ataque,
        public int $defensa
    ) {}

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
