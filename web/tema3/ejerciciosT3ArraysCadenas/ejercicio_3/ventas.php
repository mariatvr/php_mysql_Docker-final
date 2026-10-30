<?php
session_start();

if (!isset($_SESSION['empresa'])) {
    header("Location: index.php");
    exit();
}

$mensaje = "";

if (isset($_POST['vendedor'], $_POST['producto'], $_POST['cantidad'])) {
    
    $v = (int)$_POST['vendedor'];
    $p = (int)$_POST['producto'];
    $cantidad_nueva = (int)$_POST['cantidad'];

    $_SESSION['empresa'][$v][$p]['cantidad'] += $cantidad_nueva;
    
    $total_acumulado = $_SESSION['empresa'][$v][$p]['cantidad'];
    
    $mensaje = "¡Venta registrada! Se han añadido $cantidad_nueva unidades. El Vendedor $v ahora tiene un total de $total_acumulado unidades del Producto $p.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 30px; }
        form { display: inline-block; text-align: left; background: #f4f4f4; padding: 20px; border-radius: 5px; }
        select, input, button { margin: 10px 0; padding: 5px; width: 100%; box-sizing: border-box; }
        .exito { color: #28a745; font-weight: bold; margin-bottom: 15px; padding: 10px; border: 1px solid #28a745; background-color: #e9f7ef; border-radius: 5px; display: inline-block; max-width: 500px; }
        .volver { display: inline-block; margin-top: 20px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h2>REGISTRAR NUEVAS VENTAS</h2>
    
    <?php if ($mensaje != ""): ?>
        <div><span class="exito"><?= $mensaje ?></span></div>
    <?php endif; ?>

    <form action="ventas.php" method="post">
        <label>Selecciona el Vendedor:</label>
        <select name="vendedor" required>
            <?php
            for ($i = 1; $i <= 18; $i++) {
                echo "<option value='$i'>Vendedor $i</option>";
            }
            ?>
        </select>

        <label>Selecciona el Producto:</label>
        <select name="producto" required>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>Producto $i</option>";
            }
            ?>
        </select>

        <label>Cantidad Adicional Vendida:</label>
        <input type="number" name="cantidad" min="1" required placeholder="Ej: 5">

        <button type="submit">Sumar a las ventas</button>
    </form>

    <br>
    <a class="volver" href="index.php">Volver al Menú</a>
</body>
</html>