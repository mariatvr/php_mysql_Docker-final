<?php
$mensaje = "";
$semilla = "";


if (isset($_POST['mensaje'], $_POST['semilla'])){
    $mensaje=trim($_POST['mensaje']);
    $semilla=$_POST['semilla'];
} else{
    header("Location: index.php?error");
    exit();
}

$error="";
$exito="";

if (preg_match('/^[a-zA-ZñÑ]+$/u', $mensaje)) {
    if(preg_match('/^[a-zA-ZñÑ]+$/u', $semilla)){

                $alfabeto = [
                    "A", "B", "C", "D", "E", "F", "G",
                    "H", "I", "J", "K", "L", "M", "N",
                    "Ñ", "O", "P", "Q", "R", "S", "T",
                    "U", "V", "W", "X", "Y", "Z"
                ];

                $mensaje = mb_strtoupper($mensaje, "UTF-8");
                $mensajeCifrado = "";

                for ($i = 0; $i < mb_strlen($mensaje, "UTF-8"); $i++) {
                        $letraMen= mb_substr($mensaje, $i, 1, "UTF-8");
                        $posSemilla = $i % mb_strlen($semilla, "UTF-8");
                        $letraSem = mb_strtoupper(mb_substr($semilla, $posSemilla, 1, "UTF-8"), "UTF-8");   
                        $posicion = array_search($letraMen, $alfabeto);
                        $posicionSem = array_search($letraSem, $alfabeto);
                        $nuevaPosicion = ($posicion + 1) + ($posicionSem + 1);
                        if ($nuevaPosicion > 27) {
                            $nuevaPosicion = $nuevaPosicion % 27;
                        }
                        $letraCifrada = $alfabeto[$nuevaPosicion - 1];
                        $mensajeCifrado .= $letraCifrada;
                } 

                $exito= "Mensaje recibido: " . $mensaje . "<br>Semilla recibida: " . $semilla . "<br>Mensaje cifrado: " . $mensajeCifrado;
            
    }else {
        $error="La semilla no puede tener caracteres que no sean letras.";
    }
} else {
    $error="El mensaje no puede tener caracteres que no sean letras.";
}

if ($error != "") {
    header("Location: index.php?error=" . urlencode($error));
} else {
    header("Location: index.php?exito=" . urlencode($exito));
}
exit();


?>