<?php
session_start();

if (isset($_POST['fila']) && isset($_POST['columna'])) {
    
    $fila_pulsada = $_POST['fila'];
    $columna_pulsada = $_POST['columna'];
    $id_asiento = $fila_pulsada . "-" . $columna_pulsada;
    
    
    if (isset($_SESSION['ocupados'][$id_asiento])) {
        unset($_SESSION['ocupados'][$id_asiento]);
    } else {
        $_SESSION['ocupados'][$id_asiento] = true; 
    }
}


function obtenerImagen($id_asiento) {
    if (isset($_SESSION['ocupados'][$id_asiento])) {
        return "asientoRojo.jpg";
    } else {
        return "asientoVerde.jpg";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
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
    <table>
        <tbody>
            <!-- FILA 1 -->
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

        </tbody>
    </table>
</body>
</html>