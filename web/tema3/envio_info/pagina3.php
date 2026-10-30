<?php

echo "<pre>";
print_R($_POST);
echo "<pre>";

$textousuarios=$_POST['usuario'];
//si el dato es muy complejo hay que serializarlo para poder enviarlo por POST, y luego deserializarlo para poder usarlo
//esto es el json_encode y json_decode
$usuarios=json_decode($textousuarios,JSON_OBJECT_AS_ARRAY);


$habitantes=[
    "Alicante"=>["Novelda"=>25000,"Elche"=>30000,"Aspe"=>20000],
    "Castellon"=>["Vinaròs"=>38000,"Villarreal"=>40000,"Burriana"=>23000],
    "Valencia"=>["Algemesí"=>22000,"Gandia"=>15000,"Torrent"=>19000]
];


$habitante=$habitantes[$_POST['provincia']]??"";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="pagina3.php" method="post">
    <label for="poblacion">Datos de la población:</label>
    <select name="poblacion" id="poblacion">
        <?php foreach ($habitantes[$_POST['provincia']] as $key => $poblacion){
            echo "<option value='{$poblacion}'>{$key} - {$poblacion} habitantes</option>";
        }
         ?>
    </select>
    <button type="submit">Enviar</button>
    </form> 
</body>
</html>