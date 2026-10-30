<?php

class Digimon{
    private string $nombre;
    private string $tipo;  // planta, animal, virus, vacuna, elemental 
    private int $ataque;
    private int $defensa;

//php solo permite un constructor
    public __construct (string $nombre, string $tipo, int ataque, int defensa) {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
    }

    public function saludar(): string{
        return "Soy {$this->nombre"}, tipo {this->tipo}.";
    }
}

?>