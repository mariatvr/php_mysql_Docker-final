<?php
$provincias=["Alicante", "Castellon", "Valencia"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="pagina2.php" method="post">
    <label for="provincia">Provincia:</label>
    <select name="provincia" id="provincia">
        <?php foreach ($provincias as $key => $provincia){
            echo "<option value='{$provincia}'>{$provincia}</option>";
        }
         ?>
    </select>
    <button type="submit">Enviar</button>
    </form> 
</body>
</html>