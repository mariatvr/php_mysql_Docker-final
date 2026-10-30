<?php

function MostrarErrores(string $campo, array $errores){
    if (!isset ($errores[$campo]) || count ($errores[$campo])<=0) return "";
    $texto= "<div class='alert alert-danger' role='alert'>";
    //$texto.=   implode( "<br>",$errores[$campo]);
    foreach ($errores[$campo] as $error) {
        $texto.= "{$error}<br>";
    }
    $texto.= "</div>"; 
    return $texto;
}
function AficcionSeleccionada (string $aficionSeleccionada, array $aficiones){
    // foreach ($aficiones as $aficion){
    //     if ($aficion==$aficionSeleccionada) return "checked";
    // }
    // return "";
    // if (in_array($aficionSeleccionada,$aficiones)==true) return "checked";
    // else return "";

    return in_array($aficionSeleccionada,$aficiones)?"checked":"";
}
