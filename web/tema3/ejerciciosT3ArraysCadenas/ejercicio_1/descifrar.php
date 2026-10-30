<?php
$mensaje = "";
$semilla = "";


if (isset($_POST['mensaje'], $_POST['semilla'])){
    $mensaje=trim($_POST['mensaje']);
    $semilla=$_POST['semilla'];
} else{
    header("Location: index.php?error=Los+campos+son+obligatorios");
    exit();
}

$error="";
$exito="";

if (preg_match('/^[a-zA-ZñÑ]+$/u', $mensaje)) {
if ($semilla<1){
 $error="La semilla no puede ser un numero negativo.";
} else{
        $alfabeto = [
            "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N",
            "Ñ", "O", "P", "Q", "R", "S", "T",
            "U", "V", "W", "X", "Y", "Z"
        ];

        $mensaje = mb_strtoupper($mensaje, "UTF-8");
        $mensajeDescifrado = "";

        for ($i = 0; $i < mb_strlen($mensaje, "UTF-8"); $i++) {
            $letra= mb_substr($mensaje, $i, 1, "UTF-8");
            $posicion = array_search($letra, $alfabeto);
            $nuevaPosicion = $posicion - $semilla;
            if($nuevaPosicion<0){
                $nuevaPosicion=27-($nuevaPosicion * -1);
            }
            $letraCifrada=$alfabeto[$nuevaPosicion];
            $mensajeDescifrado .= $letraCifrada;
        } 

        $exito= "Mensaje recibido: " . $mensaje . "<br>Semilla recibida: " . $semilla . "<br>Mensaje cifrado: " . $mensajeCifrado;
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