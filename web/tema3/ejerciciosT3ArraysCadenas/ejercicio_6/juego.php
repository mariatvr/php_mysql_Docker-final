<?php

session_start();

// COMENZAR UNA PARTIDA NUEVA
if (isset($_POST['nivel'])) {

    $nivel = $_POST['nivel'];

    $filas = $nivel;
    $columnas = $nivel;

    $tablero = array();

    // Inicializar el tablero
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $tablero[$i][$j] = ' ';
        }
    }

    // Colocar el tesoro
    $tesoroFila = rand(0, $filas - 1);
    $tesoroColumna = rand(0, $columnas - 1);

    $tablero[$tesoroFila][$tesoroColumna] = 'T';

    // Establecer vidas e intentos según el nivel
    if ($nivel == 5) {
        $numVidas = 2;
        $intentos = 5;
    } elseif ($nivel == 7) {
        $numVidas = 5;
        $intentos = 7;
    } else {
        $numVidas = 9;
        $intentos = 10;
    }

    // Colocar las vidas aleatoriamente
    $vidasColocadas = 0;

    while ($vidasColocadas < $numVidas) {

        $filaVida = rand(0, $filas - 1);
        $columnaVida = rand(0, $columnas - 1);

        if ($tablero[$filaVida][$columnaVida] == ' ') {
            $tablero[$filaVida][$columnaVida] = 'V';
            $vidasColocadas++;
        }
    }

    // Guardar los datos en la sesión
    $_SESSION['tablero'] = $tablero;
    $_SESSION['descubiertas'] = array();
    $_SESSION['intentos'] = $intentos;
    $_SESSION['ganado'] = false;
    $_SESSION['terminado'] = false;


// CONTINUAR LA PARTIDA
} elseif (isset($_POST['fila']) && isset($_POST['columna'])) {

    $tablero = $_SESSION['tablero'];

    $fila = $_POST['fila'];
    $columna = $_POST['columna'];

    // Comprobar que la partida no haya terminado
    if (!$_SESSION['terminado']) {

        // Comprobar que la casilla no esté descubierta
        if (!isset($_SESSION['descubiertas'][$fila][$columna])) {

            $_SESSION['descubiertas'][$fila][$columna] = true;

            // Comprobar qué hay en la casilla
            if ($tablero[$fila][$columna] == 'T') {

                $_SESSION['ganado'] = true;
                $_SESSION['terminado'] = true;

            } elseif ($tablero[$fila][$columna] == 'V') {

                $_SESSION['intentos']--;

            } else {

                $_SESSION['intentos']--;
            }

            // Comprobar si se han agotado los intentos
            if ($_SESSION['intentos'] <= 0 && !$_SESSION['ganado']) {
                $_SESSION['terminado'] = true;
            }
        }
    }

} else {
    header("Location: index.php");
    exit;
}

// Recuperar el tablero
$tablero = $_SESSION['tablero'];

$filas = count($tablero);
$columnas = count($tablero[0]);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Búsqueda del tesoro</title>
</head>
<body>

    <h1>BUSCA EL TESORO</h1>

    <h2>Intentos restantes: <?php echo $_SESSION['intentos']; ?></h2>

    <?php

    if ($_SESSION['ganado']) {
        echo "<h2>¡ENHORABUENA! ¡HAS ENCONTRADO EL TESORO!</h2>";
    } elseif ($_SESSION['terminado']) {
        echo "<h2>¡TE HAS QUEDADO SIN INTENTOS! ¡FIN DE LA PARTIDA!</h2>";
    }

    ?>

    <table border="1">

        <?php

        for ($i = 0; $i < $filas; $i++) {

            echo "<tr>";

            for ($j = 0; $j < $columnas; $j++) {

                echo "<td style='width: 45px; height: 45px; text-align: center;'>";

                if (isset($_SESSION['descubiertas'][$i][$j])) {

                    if ($tablero[$i][$j] == 'T') {
                        echo "T";
                    } elseif ($tablero[$i][$j] == 'V') {
                        echo "V";
                    } else {
                        echo "-";
                    }

                } elseif (!$_SESSION['terminado']) {

                        echo "<form action='juego.php' method='post'>";
                        echo "<input type='hidden' name='fila' value='$i'>";
                        echo "<input type='hidden' name='columna' value='$j'>";
                        echo "<button type='submit'>?</button>";
                        echo "</form>";

                    } else {

                        if ($tablero[$i][$j] == 'T') {
                            echo "T";
                        } elseif ($tablero[$i][$j] == 'V') {
                            echo "V";
                        } else {
                            echo "-";
                        }

                }

                echo "</td>";
            }

            echo "</tr>";
        }

        ?>

    </table>

    <br>

    <form action="index.php" method="post">
        <button type="submit">Volver al menú</button>
    </form>

</body>
</html>
