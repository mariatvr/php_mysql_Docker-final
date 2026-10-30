<?php


class Saiyajin{
    protected string $nombre;
    private int $nivel;
    public string $clase="Saiyajin";


    public function __construct (string $nombre,int  $nivel=10)
    {
        $this->nombre=$nombre;
        $this->nivel=$nivel;
    }
    public function Saludar():string{
        return "Hola soy {$this->nombre}";
    }
    
    // como era protected no puede acceder
    public function Nivel():string{
        return "{$this->nombre} es de nivel: {$this->nivel} ";
    }

    
    private function getClase():string{
        return $this->clase;
    }

    public function Transformacion():string{
        return "Ahhhhhh";
    }
}
