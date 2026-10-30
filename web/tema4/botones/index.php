<?php

$mensaje="";
$mensaje=(isset($_GET["jett_x"]))?"Has pulsado Jett":(isset($_GET["reyna_x"])?"Has pulsado reyna":"");
//otra opción es hacerlo con if y else
//operador fusion null:
$mensaje=(isset($_GET["jett_x"]))?"Has pulsado Jett":(isset($_GET["reyna_x"])?"Has pulsado reyna":"");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?= $mensaje ?></h2>
    <form action="<?=  $_SERVER['PHP_SELF'] ?>" method="get">
         <input type="image" src="jett.jpg" id="jett" name="jett" alt="">
    </form>
    
    <form action="<?=  $_SERVER['PHP_SELF'] ?>" method="get">
         <input type="image" src="reyna.jpg" id="reyna" name="reyna" alt="">
    </form>
</body>
</html>