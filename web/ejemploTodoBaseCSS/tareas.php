<?php
$tareas=[
    "t1"=>"Lavarme\n Dormir",
    "t2"=>"Correr \n Saltar",
    "t3"=>"Dormir y Dormir mas"
];

$nuevotitulo=""; $nuevatarea=""; $mensaje="";

//Voy a borrar
if (isset ($_POST["botonBorrar"], $_POST["titulo_borrar"])){
    $tituloBorrar=$_POST["titulo_borrar"];
    $tareas_json=$_POST["tareas_serializada"];
    $tareas=json_decode($tareas_json, JSON_OBJECT_AS_ARRAY);
    unset ($tareas[$tituloBorrar]);
    $mensaje="<p style='color:red'>Tarea {$tituloBorrar} eliminada correctamente.";

}

if (isset ($_POST["titulo"], $_POST["tarea"], $_POST["tareas_serializada"])){
    $nuevotitulo=$_POST["titulo"];
    $nuevatarea=$_POST["tarea"];
    $tarea_json=$_POST["tareas_serializada"];
    $tareas= json_decode($tarea_json, JSON_OBJECT_AS_ARRAY);

    $tareas[$nuevotitulo]=$nuevatarea;

    $mensaje="<p style='color:green'>Tarea {$nuevotitulo} añadida correctamente.";
}

$tarea_json=json_encode($tareas);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario sin Divs y Tabla Elegante</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" >
</head>
<body>

    <!-- FORMULARIO SIN DIVS -->
    <form class="formulario-moderno" method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <h2>Tarea</h2>
        
        <label for="nombre">Título</label>
        <input type="text" name="titulo" id="nombre" placeholder="Título de la tarea" required>
        
        
        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="tarea" rows="4" placeholder="Escribe aquí la nueva tarea..."></textarea>
        <input type="hidden" id="tareas_serializada" name="tareas_serializada" 
            value= '<?= $tarea_json ?>'>
        
        <button type="submit">
            <i class="fa-solid fa-plus"></i> Nueva tarea
        </button>
    </form>
    <?=  $mensaje ?>
    <!-- TABLA ELEGANTE -->
    <table class="tabla-elegante">
        <thead>
            <tr>
                <th>Título</th>
                <th>Tarea</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tareas as $titulo => $tarea){
                ?>
                <tr>
                <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
                <?php
                $tarea=nl2br ($tarea);
                echo "<tr>
                <td>{$titulo}</td>
                <td>{$tarea}</td>";
                echo '<td>
                <button class="btn_borrar" name="botonBorrar">
                <i class="fa-regular fa-trash-can"></i>Borrar</button></td>';
                ?>
                <input type="hidden" id="titulo_borrar" name="titulo_borrar" value= '<?= $titulo ?>'>
                <input type="hidden" id="tareas_serializada" name="tareas_serializada" 
                value= '<?= $tarea_json ?>'>
                </form>
                <tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>