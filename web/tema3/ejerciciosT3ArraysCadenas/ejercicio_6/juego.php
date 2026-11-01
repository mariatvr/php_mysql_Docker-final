<?php
session_start();

// Recoger el nivel elegido
if (isset($_POST['nivel'])) {

    $nivel = (int) $_POST['nivel'];

    if ($nivel == 5 || $nivel == 7 || $nivel == 10) {

        $_SESSION['tamaño'] = $nivel;

        // Reiniciar la partida
        unset($_SESSION['tablero']);
        unset($_SESSION['intentos']);
        unset($_SESSION['descubiertos']);
        unset($_SESSION['fin']);
    }
}

// Comprobar que se ha elegido una dificultad
if (!isset($_SESSION['tamaño'])) {
    header("Location: index.php");
    exit();
}

$tamaño = $_SESSION['tamaño'];


// CREAR EL TABLERO
if (!isset($_SESSION['tablero'])) {

    // Crear todas las casillas vacías
    for ($fila = 0; $fila < $tamaño; $fila++) {

        for ($columna = 0; $columna < $tamaño; $columna++) {

            $_SESSION['tablero'][$fila][$columna] = "vacio";

        }
    }

    // Colocar las 5 bombas
    for ($i = 0; $i < 5; $i++) {

        do {
            $fila = rand(0, $tamaño - 1);
            $columna = rand(0, $tamaño - 1);

        } while ($_SESSION['tablero'][$fila][$columna] != "vacio");

        $_SESSION['tablero'][$fila][$columna] = "bomba";
    }

    // Colocar el tesoro
    do {
        $fila = rand(0, $tamaño - 1);
        $columna = rand(0, $tamaño - 1);

    } while ($_SESSION['tablero'][$fila][$columna] != "vacio");

    $_SESSION['tablero'][$fila][$columna] = "tesoro";


    // Colocar las 2 vidas extra
    for ($i = 0; $i < 2; $i++) {

        do {
            $fila = rand(0, $tamaño - 1);
            $columna = rand(0, $tamaño - 1);

        } while ($_SESSION['tablero'][$fila][$columna] != "vacio");

        $_SESSION['tablero'][$fila][$columna] = "vida";
    }

    // Inicializar los intentos
    $_SESSION['intentos'] = 5;

    // Inicializar las casillas descubiertas
    $_SESSION['descubiertos'] = [];

    // Inicializar el estado de la partida
    $_SESSION['fin'] = false;
}


// PROCESAR LA CASILLA PULSADA
if (
    isset($_POST['fila']) &&
    isset($_POST['columna']) &&
    $_SESSION['fin'] == false
) {

    $fila = (int) $_POST['fila'];
    $columna = (int) $_POST['columna'];

    // Comprobar que las coordenadas son válidas
    if (
        $fila >= 0 && $fila < $tamaño &&
        $columna >= 0 && $columna < $tamaño
    ) {

        $id_asiento = $fila . "-" . $columna;

        // Comprobar que no se haya descubierto antes
        if (!isset($_SESSION['descubiertos'][$id_asiento])) {

            // Guardar la casilla como descubierta
            $_SESSION['descubiertos'][$id_asiento] = true;

            // Restar un intento por pulsar
            $_SESSION['intentos']--;

            // Consultar qué contiene la casilla
            $contenido = $_SESSION['tablero'][$fila][$columna];

            if ($contenido == "bomba") {

                $_SESSION['fin'] = "bomba";

            } elseif ($contenido == "vida") {

                $_SESSION['intentos']+=2;

            } elseif ($contenido == "tesoro") {

                $_SESSION['fin'] = "ganado";

            }

            // Comprobar si se han acabado los intentos
            if (
                $_SESSION['intentos'] <= 0 &&
                $_SESSION['fin'] == false
            ) {

                $_SESSION['fin'] = "perdido";

            }
        }
    }
}


// MOSTRAR LA PÁGINA
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda del tesoro</title>

    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }

        button {
            width: 45px;
            height: 45px;
            cursor: pointer;
            font-size: 20px;
        }

        .resultado {
            font-size: 24px;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <h1>¡BUSCA EL TESORO!</h1>

    <h2>Intentos disponibles: <?= $_SESSION['intentos'] ?></h2>

    <?php

    // Mostrar el resultado de la partida
    if ($_SESSION['fin'] == "ganado") {

        echo "<p class='resultado'>¡ENHORABUENA! ¡HAS ENCONTRADO EL TESORO!</p>";

    } elseif ($_SESSION['fin'] == "bomba") {

        echo "<p class='resultado'>¡EXPLOTÓ LA BOMBA, PERDISTE!</p>";

    } elseif ($_SESSION['fin'] == "perdido") {

        echo "<p class='resultado'>¡TE HAS QUEDADO SIN INTENTOS!</p>";

    }

    ?>


    <!-- GENERAR EL TABLERO -->

    <table>

        <?php

        for ($fila = 0; $fila < $tamaño; $fila++) {

            echo "<tr>";

            for ($columna = 0; $columna < $tamaño; $columna++) {

                echo "<td>";

                $id_asiento = $fila . "-" . $columna;

                // Mostrar el contenido si está descubierta
                if (
                    isset($_SESSION['descubiertos'][$id_asiento]) ||
                    $_SESSION['fin'] != false
                ) {

                    $contenido = $_SESSION['tablero'][$fila][$columna];

                    if ($contenido == "bomba") {

                        echo "💣";

                    } elseif ($contenido == "tesoro") {

                        echo "💎";

                    } elseif ($contenido == "vida") {

                        echo "❤️";

                    } else {

                        echo "⬜";

                    }

                } else {

                    // Mostrar botón si la casilla no está descubierta
                    if ($_SESSION['fin'] == false) {

                        echo "<form action='juego.php' method='post'>";

                        echo "<input type='hidden' name='fila' value='$fila'>";
                        echo "<input type='hidden' name='columna' value='$columna'>";

                        echo "<button type='submit'>?</button>";

                        echo "</form>";

                    } else {

                        echo "?";

                    }
                }

                echo "</td>";

            }

            echo "</tr>";

        }

        ?>

    </table>


    <?php

    // Botón para comenzar otra partida
    if ($_SESSION['fin'] != false) {

        ?>

        <form action="index.php" method="post">

            <button type="submit" style="width: auto;">
                Volver a empezar
            </button>

        </form>

        <?php

    }

    ?>

</body>
</html>
