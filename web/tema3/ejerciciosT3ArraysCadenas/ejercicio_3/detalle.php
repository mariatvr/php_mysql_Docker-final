<?php
session_start();

if (!isset($_SESSION['empresa'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle por Vendedor</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 30px; }
        table { border-collapse: collapse; margin: 20px auto; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f4f4f4; }
        form { margin-bottom: 20px; }
        .volver { display: inline-block; margin-top: 20px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h2>CONSULTAR TRABAJADOR</h2>
    
    <form action="detalle.php" method="post">
        <label for="vendedor">Selecciona el vendedor: </label>
        <select name="vendedor" id="vendedor" required>
            <option value="" disabled selected>Elige un vendedor...</option>
            <?php
            for ($i = 1; $i <= 18; $i++) {
                $selected = (isset($_POST['vendedor']) && $_POST['vendedor'] == $i) ? "selected" : "";
                echo "<option value='$i' $selected>Vendedor $i</option>";
            }
            ?>
        </select>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if (isset($_POST['vendedor'])) {
        $v = (int)$_POST['vendedor'];
        $total_vendedor = 0;

        echo "<table>";
        echo "<tr>
                <th>Trabajador</th>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
                <th>Valor Producto</th>
                <th>Ingreso Total</th>
              </tr>";

        for ($producto = 1; $producto <= 10; $producto++) {
            $datos = $_SESSION['empresa'][$vendedor][$producto];
            
            $cantidad = $datos['cantidad'];
            $precio = $datos['precio'];
            $ingreso_total = $cantidad * $precio;
            
            $total_vendedor += $ingreso_total;
            
            echo "<tr>";
            echo "<td>vendedor$vendedor</td>";
            echo "<td>producto$producto</td>";
            echo "<td>$cantidad</td>";
            echo "<td>" . number_format($precio, 2) . " €</td>";
            echo "<td>" . number_format($ingreso_total, 2) . " €</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        echo "<h3>Total acumulado: " . number_format($total_vendedor, 2) . " €</h3>";
    }
    ?>

    <a class="volver" href="index.php">Volver al Menú</a>
</body>
</html>