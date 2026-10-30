<?php
// PARTE 4: colaboración entre objetos. Un Equipo TIENE Digimon.

require_once "Digimon.php";

class Equipo {
    private array $miembros = [];

    public function __construct(private string $nombre) {}

    public function getNombre(): string {
        return $this->nombre;
    }

    // El tipo del parámetro garantiza que solo se añaden objetos Digimon.
    public function anadir(Digimon $digimon): void {
        $this->miembros[] = $digimon;
    }

    public function poderTotal(): int {
        $total = 0;
        foreach ($this->miembros as $digimon) {
            $total += $digimon->poderTotal();
        }
        return $total;
    }

    public function mostrar(): string {
        $texto = "Equipo {$this->nombre}:<br>";
        foreach ($this->miembros as $digimon) {
            $texto .= "- " . $digimon->saludar() . "<br>";
        }
        return $texto;
    }

    // Reto final: combate entre equipos por poder total.
    public function combatir(Equipo $otro): string {
        if ($this->poderTotal() > $otro->poderTotal()) {
            return "El equipo {$this->nombre} vence al equipo {$otro->getNombre()}!";
        } elseif ($this->poderTotal() < $otro->poderTotal()) {
            return "El equipo {$this->nombre} pierde contra {$otro->getNombre()}.";
        }
        return "Los equipos {$this->nombre} y {$otro->getNombre()} empatan.";
    }
}
