<?php 

$fecha_introducida="";

if(isset($_POST['fecha'])){
    $fecha_introducida= trim($_POST['fecha']);
} else {
    header("Location: index.php?error=El+campo+fecha+es+obligatorio");
    exit();
}

$partes=explode("/", $fecha_introducida);

$mensaje = "";

if (count($partes)!= 3){
    $mensaje="El formato de fecha no es válido.";
} else{
    $dia=$partes[0];
    $mes=$partes[1];
    $año=$partes[2];

    if (strlen($dia) != 2 || strlen($mes) != 2 || strlen($año) != 4) {
    $mensaje = "El formato debe ser DD/MM/AAAA.";
        } else{
    if ($dia < 1 || $dia > 31) {
        $mensaje = "Un mes no puede tener menos de 1 día ni más de 31.";
    } elseif ($mes < 1 || $mes > 12) {
        $mensaje = "El mes no es válido.";
    } elseif (strlen($año) != 4) {
        $mensaje = "El año no es correcto.";
    } else{
        if ($mes == 2) {
                $bisiesto = false;

                if (($año % 400 == 0) || ($año % 4 == 0 && $año % 100 != 0)) {
                    $bisiesto = true;
                }
                if ($bisiesto) {
                if ($dia > 29) {
                    $mensaje = "Febrero en año bisiesto tiene 29 días.";
                }
            } else {
                if ($dia > 28) {
                    $mensaje = "Febrero solo tiene 28 días.";
                }
            }
        } elseif ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11) {

            if ($dia > 30) {
                $mensaje = "Ese mes solo tiene 30 días.";
            }
        }
    }
}
}

if ($mensaje != "") {
    header("Location: index.php?error=" . urlencode($mensaje));
} else {
    header("Location: index.php?exito=" . urlencode("La fecha es correcta."));
}
exit();


?>