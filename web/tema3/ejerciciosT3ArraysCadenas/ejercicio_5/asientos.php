<?php
session_start();
if (isset($_POST['fila']) && isset($_POST['columna'])) {
    $mensaje="";
    $fila_pulsada = $_POST['fila'];
    $columna_pulsada = $_POST['columna'];
    $id_asiento = $fila_pulsada . "-" . $columna_pulsada;
    
    $asientosTotales=100;
    
    if (isset($_SESSION['ocupados'][$id_asiento])) {
        unset($_SESSION['ocupados'][$id_asiento]);
        $mensajeLibre="Acabas de liberar el asiento " . $id_asiento;
    } else {
        $_SESSION['ocupados'][$id_asiento] = true; 
        $mensaje="Acabas de reservar el asiento " . $id_asiento;
    }
}

function obtenerImagen($id_asiento){
    if (isset($_SESSION['ocupados'][$id_asiento])) {
        return "asientoRojo.jpg";
    } else {
        return "asientoVerde.jpg";
    }
}

$asientos_totales = 100;
$asientos_ocupados = 0;

if (isset($_SESSION['ocupados'])) {
    $asientos_ocupados = count($_SESSION['ocupados']);
}

$asientos_disponibles = $asientos_totales - $asientos_ocupados;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asientos de avión</title>
    <style>
        body { text-align: center; }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: max-content;
            margin-left: auto;
            margin-right: auto;
            font-size: 15px;
        }
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 5px;
        }
       
        form { margin: 0; }
        
        input[type="image"] {
            width: 40px;
            height: 40px;
        }
        .pasillo {
            border: none; 
            width: 30px;
        }
    </style>
</head>
<body>
    <h1>RESERVA DE ASIENTOS</h1>
    <h3>Asientos disponibles: <?= $asientos_disponibles ?></h3>
    <h4><?php if (!empty($mensaje)): ?>
            <div class="asientoReservado">
                <?= $mensaje; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($mensajeLibre)): ?>
            <div class="asientoLibre">
                <?= $mensajeLibre; ?>
            </div>
        <?php endif; ?>
        </h4>
        <table>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="image" src="<?= obtenerImagen('1-1') ?>" alt="Asiento">
                        <input type="hidden" name="fila" value="1">
                        <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="image" src="<?= obtenerImagen('1-2') ?>" alt="Asiento">
                        <input type="hidden" name="fila" value="1">
                        <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="image" src="<?= obtenerImagen('1-3') ?>" alt="Asiento">
                        <input type="hidden" name="fila" value="1">
                        <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="image" src="<?= obtenerImagen('1-4') ?>" alt="Asiento">
                        <input type="hidden" name="fila" value="1">
                        <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('2-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="2">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('2-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="2">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('2-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="2">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('2-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="2">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('3-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="3">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('3-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="3">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('3-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="3">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('3-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="3">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('4-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="4">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('4-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="4">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('4-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="4">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('4-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="4">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('5-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="5">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('5-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="5">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('5-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="5">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('5-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="5">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('6-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="6">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('6-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="6">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('6-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="6">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('6-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="6">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('7-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="7">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('7-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="7">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('7-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="7">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('7-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="7">
                            <input type="hidden" name="columna" value="4">
                        </form></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('8-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="8">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('8-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="8">
                            <input type="hidden" name="columna" value="2">
                    </form>
                    </td>
                    <td class="pasillo"></td>
                    
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('8-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="8">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('8-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="8">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('9-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="9">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('9-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="9">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('9-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="9">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td><form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="image" src="<?= obtenerImagen('9-4') ?>" alt="Asiento">
                        <input type="hidden" name="fila" value="9">
                        <input type="hidden" name="columna" value="4">
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('10-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="10">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('10-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="10">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo">

                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('10-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="10">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('10-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="10">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('11-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="11">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('11-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="11">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo">

                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('11-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="11">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('11-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="11">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('12-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="12">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('12-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="12">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('12-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="12">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('12-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="12">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('13-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="13">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('13-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="13">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('13-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="13">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('13-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="13">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('14-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="14">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('14-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="14">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('14-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="14">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('14-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="14">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('15-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="15">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('15-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="15">
                            <input type="hidden" name="columna" value="2">
                    </form>
                    </td>
                    <td class="pasillo">
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('15-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="15">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('15-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="15">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('16-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="16">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('16-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="16">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('16-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="16">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('16-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="16">
                            <input type="hidden" name="columna" value="4">
                        </form>
                </td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('17-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="17">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('17-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="17">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('17-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="17">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('17-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="17">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('18-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="18">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('18-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="18">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('18-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="18">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('18-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="18">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('19-1') ?>" alt="Asiento Verde">
                            <input type="hidden" name="fila" value="19">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('19-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="19">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('19-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="19">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('19-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="19">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('20-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="20">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('20-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="20">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('20-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="20">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('20-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="20">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('21-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="21">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('21-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="21">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('21-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="21">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('21-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="21">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('22-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="22">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('22-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="22">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('22-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="22">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('22-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="22">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('23-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="23">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('23-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="23">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('23-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="23">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('23-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="23">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('24-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="24">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('24-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="24">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('24-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="24">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('24-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="24">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('25-1') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="25">
                            <input type="hidden" name="columna" value="1">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('25-2') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="25">
                            <input type="hidden" name="columna" value="2">
                        </form>
                    </td>
                    <td class="pasillo"></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('25-3') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="25">
                            <input type="hidden" name="columna" value="3">
                        </form>
                    </td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="image" src="<?= obtenerImagen('25-4') ?>" alt="Asiento">
                            <input type="hidden" name="fila" value="25">
                            <input type="hidden" name="columna" value="4">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
</body>
</html>