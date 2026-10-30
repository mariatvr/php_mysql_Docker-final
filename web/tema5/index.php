<?php
require_once "Saiyajin.php";
//warning, el require_once esta mal porque llama a SuperGuerrer no existe el archivo
//cambiamos el require_once a Saiyajin.php 

$goku= new Saiyajin(nivel:1000,nombre:"Goku");
echo $goku->Saludar()."<br>";
echo $goku->Nivel()."<br>";
echo "<br>";


$vegeta= new Saiyajin("Vegeta", 950);
echo $vegeta->Saludar()."<br>";
echo $vegeta->Nivel()."<br>";
echo "<br>";

//fatal error ya que SuperGuerrer no existe
$gohan= new Saiyajin(nivel:1800, nombre:"Gohan");
echo $gohan->Saludar()."<br>";
echo $gohan->Nivel()."<br>";
echo $gohan->Transformacion()."<br>";
echo "<br>";

//Ahora da error en trasnformacion pq no existe
$krilin= new Saiyajin(nivel:499, nombre:"Krilin");
echo $krilin->Saludar()."<br>";
echo $krilin->Nivel()."<br>";
echo $krilin->Transformacion()."<br>";
