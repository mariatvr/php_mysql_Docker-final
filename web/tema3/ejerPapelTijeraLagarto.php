<?php

function resultado_partida(string $jugadaUsuario, string $jugadaMaquina):string  
{
    // SE PUEDE HACER con muchos if, lo vamos a hacer con arrays asociativos
    $resultado_jugadas=[
        "Piedra"=>["Piedra"=>"E", "Papel"=>"D", "Tijeras"=>"V", "Lagarto"=>"V", "Spock"=>"D"],
        "Papel"=>["Piedra"=>"V", "Papel"=>"E", "Tijeras"=>"D", "Lagarto"=>"D", "Spock"=>"V"],
        "Tijeras"=>["Piedra"=>"D", "Papel"=>"U", "Tijeras"=>"E", "Lagarto"=>"V", "Spock"=>"V"],
        "Lagarto"=>["Piedra"=>"D", "Papel"=>"V", "Tijeras"=>"D", "Lagarto"=>"E", "Spock"=>"V"],
        "Spock"=>["Piedra"=>"V", "Papel"=>"D", "Tijeras"=>"V", "Lagarto"=>"D", "Spock"=>"E"]
    ];

    return $resultado_jugadas[$jugadaUsuario][$jugadaMaquina];


}


$jugadas = ['Piedra', 'Papel', 'Tijeras', "Lagarto", "Spock"];

//Hay partida
if (isset($_POST["JugadaUsuario"])){
    $jugadaUsuario = $_POST["JugadaUsuario"]??"";


    // $jugadaMaquina = $jugadas[rand(0, count($jugadas)-1)];
    $jugadaMaquina = $jugadas[array_rand($jugadas)];
    $resultado = resultado_partida($jugadaUsuario,$jugadaMaquina);
    $color="";
    $mensaje="";
    if ($resultado=="E"){
        $color="BLACK";$mensaje="HAS EMPATADO";
    } else if ($resultado=="D"){
        $color="RED";$mensaje="QUE PENA, HAS PERDIDO";
    } else{
        $color="GREEN";$mensaje="ENHORABUENA MÁQUINA GANASTE";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra, Papel, Tijera, Lagarto, Spock</title>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
<select name="JugadaUsuario" id="JugadaUsuario">
    <?php
    foreach ($jugadas as $valor) {
        echo "<option value='$valor'>{$valor}</option>";
    }
    ?>
</select>
<button type="submit">Jugar</button>
</form>
<?php
if (isset ($_POST["JugadaUsuario"])){
    echo "Tu has jugado [$jugadaUsuario] y la máquina ha jugado [$jugadaMaquina]";
    echo "<p style= 'color:{$color};'>{$mensaje}</p>";
}
?>

</body>
</html>