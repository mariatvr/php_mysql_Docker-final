<?php

echo "<pre>";
print_R($_POST);
echo "</pre>";



$poblaciones=[
    "Alicante"=>["Novelda","Elche","Aspe"],
    "Castellon"=>["Vinaròs","Villarreal","Burriana"],
    "Valencia"=>["Algemesí","Gandia","Torrent"]
];

$provincia=$_POST['provincia'];
$provinciaElegida= $poblaciones[$provincia]??"";

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
    <label for="poblacion">Población:</label>
    <select name="poblacion" id="poblacion">
        <?php foreach ($provinciaElegida as $key => $poblacion){
            echo "<option value='{$poblacion}'>{$poblacion}</option>";
        }
         ?>
    </select>
    <input type="hidden" name="provincia" value="<?= $provincia ?>">
    <input type="hidden" name="provincia" value="<?= $provincia ?>">
    <button type="submit">Enviar</button>
    </form> 
</body>
</html>