<?php
// PARTE 3: encapsulamiento. Atributos privados + getters y un setter con validación.

class Digimon {
    public function __construct(
        private string $nombre,
        private string $tipo,   // planta, animal, virus, vacuna, elemental
        private int $ataque,
        private int $defensa
    ) {}

    // Getters
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function getAtaque(): int {
        return $this->ataque;
    }

    public function getDefensa(): int {
        return $this->defensa;
    }

    // Setter con validación: no acepta ataques negativos.
    // Devuelve true si cambió el valor, false si lo rechazó.
    public function setAtaque(int $ataque): bool {
        if ($ataque < 0) {
            return false;
        }
        $this->ataque = $ataque;
        return true;
    }

    public function saludar(): string {
        return "Soy {$this->nombre}, tipo {$this->tipo}.";
    }

    public function poderTotal(): int {
        return $this->ataque + $this->defensa;
    }

    public function combatir(Digimon $enemigo): string {
        if ($this->poderTotal() > $enemigo->poderTotal()) {
            return "{$this->nombre} vence a {$enemigo->getNombre()}!";
        } elseif ($this->poderTotal() < $enemigo->poderTotal()) {
            return "{$this->nombre} pierde contra {$enemigo->getNombre()}.";
        }
        return "{$this->nombre} y {$enemigo->getNombre()} empatan.";
    }
}
