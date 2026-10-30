<?php
//control de sesiones
session_start();
if (!isset($_SESSION["datos"])) {
  $_SESSION = [];
  session_destroy();
  header("location:carga_datos.php");
  exit();
}
//recojo informacion
$datos = $_SESSION["datos"];

//borrar
$persona=[];
if (isset($_POST["borrar"],$_POST["nifBorrar"])){
  // $nifBorrar= $_POST["nifBorrar"];
  // unset($datos[$nifBorrar]);
  // $_SESSION["datos"]=$datos;
    $persona=$datos[$_POST["nifBorrar"]];
    $nifBorrado=$_POST["nifBorrar"];

    unset ($_SESSION["datos"][$_POST["nifBorrar"]]);
    $datos=$_SESSION["datos"];
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="fontawesome/css/brands.css" rel="stylesheet" />
  <link href="fontawesome/css/solid.css" rel="stylesheet" />
</head>

<body>
  <h2>LISTAR DATOS </h2>
  <a href="inicio.php">EMPEZAR</a>
  <?php
  echo (count ($persona)>0)?"<div class='alert alert-success' role='alert'>La persona con nif: {$nifBorrado} - {$persona["nick"]} ha sido borrada correctamente </div>":""; 
  
  if (count ($datos)<=0){
        echo "NO HAY PERSONAS";
      }
      else{
      ?>
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nif</th>
        <th scope="col">Nº Seg Social</th>
        <th scope="col">Nick</th>
        <th scope="col">Edad</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      <?php

      foreach ($datos as $nif => $persona) {
      ?>
        <tr>
          <td><?= $nif ?></td>
          <td><?= $persona["nss"] ?></td>
          <td><?= $persona["nick"] ?></td>
          <td><?= $persona["edad"] ?></td>
          <td>
            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
              <input type="hidden" name="nifBorrar" id="nifBorrar" value="<?=$nif?>">
              <button type="submit" name="borrar" id="borrar" class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
              <button type="button" name="modi" id="modi" class="btn btn-primary" ><i class="fa-solid fa-pencil"></i></button>
            </form>
          </td>
        </tr>
      <?php
      }
      ?>

    </tbody>
  </table>

      <?php
      }
      ?>

  <a href="inicio.php">EMPEZAR</a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>