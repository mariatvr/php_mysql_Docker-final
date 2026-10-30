<?php
session_start();

if (!isset($_SESSION['empresa'])) {
    $_SESSION['empresa'] = [];
    
    for ($vendedor = 1; $vendedor <= 18; $vendedor++) {
        
        for ($producto = 1; $producto <= 10; $producto++) {
            
            $cantidad = rand(0, 15);
            $precio = rand(10, 300) / 10; 
            
            $_SESSION['empresa'][$vendedor][$producto] = [
                'cantidad' => $cantidad,
                'precio' => $precio
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Empresa</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .menu a {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }
        .menu a:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h1>GESTIÓN DE VENTAS</h1>
    <div class="menu">
        <a href="ventas.php">Almacenar / Modificar Ventas</a>
        <a href="totales.php">Ver Totales e Ingresos</a>
        <a href="detalle.php">Consultar Detalles de Vendedor</a>
    </div>
</body>
</html>