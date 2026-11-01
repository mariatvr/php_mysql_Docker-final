<?php
session_start();

// Verificar si la sesión de la empresa está inicializada
if (!isset($_SESSION['empresa'])) {
    header("Location: index.php");
    exit();
}

$ingresos_totales_empresa = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Totales de Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 30px; }
        table { border-collapse: collapse; margin: 0 auto; width: 50%; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background-color: #f4f4f4; }
        .total-empresa { font-size: 24px; color: #d9534f; font-weight: bold; margin-top: 20px; }
        .volver { display: inline-block; margin-top: 20px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h2>TOTALES POR VENDEDOR</h2>
    
    <table>
        <thead>
            <tr>
                <th>Vendedor</th>
                <th>Total Ingresos (€)</th>
            </tr>
        </thead>
        <tbody>
            // Calcular y mostrar los totales por vendedor
            <?php
            for ($vendedor = 1; $vendedor <= 18; $vendedor++) {
                
                $suma_vendedor = 0;
                
                for ($producto = 1; $producto <= 10; $producto++) {
                    $cantidad = $_SESSION['empresa'][$vendedor][$producto]['cantidad'];
                    $precio = $_SESSION['empresa'][$vendedor][$producto]['precio'];
                    
                    $suma_vendedor += ($cantidad * $precio);
                }
                
                $ingresos_totales_empresa += $suma_vendedor;
                
                echo "<tr>";
                echo "<td>Vendedor $vendedor</td>";
                echo "<td>" . number_format($suma_vendedor, 2) . " €</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="total-empresa">
        INGRESO TOTAL DE LA EMPRESA: <?= number_format($ingresos_totales_empresa, 2) ?> €
    </div>

    <br>
    <a class="volver" href="index.php">Volver al Menú</a>
</body>
</html>