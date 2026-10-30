<?php
session_start();

function MostrarErrores(string $campo, array $errores){
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

$errores=[];
$data=[
    "nick" => "",
    "nss" => "",
    "password" => "",
    "edad" => "",
    "equipo" => "RM",
    "genero" => "NA",
    "aficiones" =>[], 
];
if (isset ($_SESSION["errores"],$_SESSION["data"])){
    $errores=$_SESSION["errores"];
    $data=$_SESSION["data"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <form class="row g-3" action="comprobar.php" method="post">
        <div class="col-md-6">
            <label for="nif" class="form-label">Nif</label>
            <input type="text" class="form-control" id="nif" name="nif" value="<?= isset($_SESSION["data"]["nif"])?$_SESSION["data"]["nif"]:""?>" placeholder="Escribe un nif valido">
            <?= isset($_SESSION["errores"]["nif"])?MostrarErrores("nif",$_SESSION["errores"]):"" ?>
        </div>
        <div class="col-md-6">
            <label for="nss" class="form-label">Numero Seg Social</label>
            <input type="text" class="form-control" id="nss" name="nss" value="<?= $_SESSION["data"]["nss"]??"" ?>">
            <?= isset($_SESSION["errores"]["nss"])?MostrarErrores("nss",$_SESSION["errores"]):"" ?>
        </div>
        <div class="col-md-6">
            <label for="nick" class="form-label">Nick</label>
            <input type="text" class="form-control" id="nick" name="nick"  value="<?= $_SESSION["data"]["nick"]??"" ?>">
            <?= isset($_SESSION["errores"]["nick"])?MostrarErrores("nick",$_SESSION["errores"]):"" ?>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"  value="<?= $data["password"] ?>">
            <?= isset($errores["password"])?MostrarErrores("password",$errores):"" ?>
        </div>
        <div class="col-md-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad"  value="<?= $_SESSION["data"]["edad"]??"" ?>">
            <?= isset($_SESSION["errores"]["edad"])?MostrarErrores("edad",$_SESSION["errores"]):"" ?>
        </div>
        <div class="col-md-3">
            Equipo Favorito <select class="form-select" name="equipo" id="equipo">
                <option value="RM" <?= $data["equipo"]=="RM"?"selected":"" ?> >Real Madrid</option>
                <option value="BAR" <?= $data["equipo"]=="BAR"?"selected":"" ?>   >FC Barcelona</option>
                <option value="ELX"<?= $data["equipo"]=="ELX"?"selected":"" ?> >Elche</option>
                <option value="NT" <?= $data["equipo"]=="NT"?"selected":"" ?>  >No tengo</option>
            </select><br>
        </div>
        <div class="col-md-3">
            Genero:<br>
            <label><input type="radio" name="genero" id="genero" value="M" <?= $data["genero"]=="M"?"checked":"" ?>  >Masculino</label>
            <label><input type="radio" name="genero" id="genero" value="F" <?= $data["genero"]=="F"?"checked":"" ?>  >   Femenino</label>
            <label><input type="radio" name="genero" id="genero" value="NA" <?= $data["genero"]=="NA"?"checked":"" ?>  >No aplica</label>
        </div>
        <div class="col-md-3">
            Aficiones:<br>
            <Label> Futbol<input type="checkbox"name="aficiones[]" id="aficiones[]" value="Futbol" <?=AficcionSeleccionada("Futbol",$data["aficiones"] ) ?>   ></label>
            <Label> Basket<input type="checkbox" name="aficiones[]" id="aficiones[]" value="Baloncesto"  <?=AficcionSeleccionada("Baloncesto",$data["aficiones"] ) ?>  ></label><br>
            <Label> Sofing<input type="checkbox" name="aficiones[]" id="aficiones[]" value="Sofing"  <?=AficcionSeleccionada("Sofing",$data["aficiones"] ) ?> ></label>
            <Label> Coches<input type="checkbox" name="aficiones[]" id="aficiones[]" value="Coches"  <?=AficcionSeleccionada("Coches",$data["aficiones"] ) ?>  ></label><br>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-danger">Alta</button>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php
unset($_SESSION["errores"]);
unset ($_SESSION["data"]);
?>