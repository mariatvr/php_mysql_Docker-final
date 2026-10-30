<?php
session_start();
if (!isset($_SESSION["datos"])){
    $_SESSION=[];
    session_destroy();
    header("location:carga_datos.php");
    exit();
}

$datos=$_SESSION["datos"];
$error=false;
$errores=[];

//1º Comprobar si llegan los datos
if (!isset($_POST["nif"], $_POST["nick"], $_POST["nss"], $_POST["password"])) {
    header("location:index.php");
    exit();
}

$aficiones=$_POST["aficiones"]??[];

//2º Sanitizamos los datos

foreach($aficiones as $indice => $valor){
    $aficiones[$indice]=  filter_var($valor,FILTER_SANITIZE_SPECIAL_CHARS );
}

$_POST = filter_var_array(
    $_POST,
    [
        "nif" => [FILTER_SANITIZE_SPECIAL_CHARS],
        "nss" => [FILTER_SANITIZE_NUMBER_INT],
        "nick" => [FILTER_SANITIZE_SPECIAL_CHARS],
        "password" => [FILTER_SANITIZE_SPECIAL_CHARS],
        "equipo" => [FILTER_SANITIZE_SPECIAL_CHARS],
        "genero" => [FILTER_SANITIZE_SPECIAL_CHARS],
        "edad" => [FILTER_SANITIZE_NUMBER_INT],
    ]
);

//3º Recogemos OPCIONAL
$nif = $_POST["nif"];
$nss = $_POST["nss"];
$nick = $_POST["nick"];
$password = $_POST["password"];
$equipo = $_POST["equipo"];
$genero = $_POST["genero"];
$edad = $_POST["edad"];

//4º Comprobamos los datos

//Edad mayor a 0
if ($edad<0){
    $error=true;
    $errores["edad"][]= "Edad No puede ser negativo";
}

//Si el id ya existe
if (isset ($datos[$nif])){
    $error=true;
    $errores["nif"][]= "Este nif ya existe";
}

// Campos Unicos no nif
$unicos=["nick"=>$nick,"nss"=>$nss];
$i=0;
$nickUnico=false;
foreach ($datos as $id => $persona) {
    foreach ($unicos as  $campo => $valor){
        if ($persona[$campo]==$valor) {
            $error=true;
            $errores[$campo][]= "Este {$campo}:  {$valor} ya existe";         
            $i++;
            if ($campo=="nick")$nickUnico=true;
        }
    }
    if ($i==count ($unicos)) break;
}

//Vacios
$vacios=["nif","nick","password","nss"];
foreach($vacios as $campo){
    if (empty ($_POST[$campo])){
        $error=true;
        $errores[$campo][]= "El campo {$campo} no puede estar vacio.";    
    }
}

// PARTE FICHERO

$errorFichero=false;

//error tamanyo
if ($_FILES["curriculum"]["size"]>10000000){
    $errorFichero=true;
    $error=true;
    $errores["curriculum"][]="Tamaño demasiado grande";
}

//error extension
$partes=explode(".",$_FILES["curriculum"]["name"]);
$extension= end($partes);
//$extension=$partes[count($partes)-1];

$mimeValidos=["application/pdf"];
$extValidas=["pdf"];

if (!in_array($extension,$extValidas) || !in_array($_FILES["curriculum"]["type"],$mimeValidos) ){
    $errorFichero=true;
    $error=true;
    $errores["curriculum"][]="Solo se admiten archivos tipo: pdf" ;
}

//Crear carpeta con nombre usuario
if ($nick!="" && !empty($nick) && !$error){
    $ruta="uploads/curriculum/{$nick}/";
    if(!mkdir($ruta, 0777, true)) {
        $error=true;
        $errorFichero=true;
        $errores["curriculum"][]="No tienes permiso para subir el fichero" ;
    }

    //Subida archivo
    $temporal = $_FILES["curriculum"]["tmp_name"];
    $destino = $ruta ."curriculum.pdf";

    if (!$errorFichero && !empty($_FILES["curriculum"]["name"]) && !move_uploaded_file($temporal, $destino)) {
        $error=true;
        $errores["curriculum"][]="El fichero no se ha subido con exito";
    }
}

$dato=[
    "nick" => $nick,
    "nss" => $nss,
    "password" => $password,
    "edad" => $edad,
    "equipo" => $equipo,
    "genero" => $genero,
    "aficiones" => $aficiones, 
    "curriculum"=>  $_FILES["curriculum"]["name"]
];

//5º Si todo correcto:  Damos de alta
if (!$error){
    //doy alta
    $datos[$nif]=$dato;
    $_SESSION["datos"]=$datos;
    // echo "Estás dado de alta.";
    // echo "<pre>";
    // var_dump($datos);
    // echo "</pre>";    
    header("location:listar_datos.php");
    exit ();
}
else{
    $dato["nif"]=$nif;
    $_SESSION["errores"]=$errores;
    $_SESSION["data"]=$dato;
    header("location:inicio.php");
    exit ();
}
