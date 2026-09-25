<?php
// Inicia la sesión para recuperar los datos del carrito que guardamos en $_SESSION.
session_start();

// Carga el carrito desde la sesión. Si no existe (usuario nunca agregó nada),
// el operador ?? asigna un array vacío para evitar errores.

$carrito = $_SESSION['carrito'] ?? [];
?>
<!DOCTYPE html>
<html class = "html-carrito">
<head><title>Carrito</title></head>
<link rel="stylesheet" href="style.css">
<body >
<div class="carrito-contenedor">
    <h1 class = "carrito-h1">Tu Carrito</h1>
   
    <?php
    // Pregunta si el carrito está vacío (sin productos).
    // empty() devuelve true si es un array sin elementos.

    if (empty($carrito)): ?>
        <!-- Si está vacío, muestra este mensaje -->

        <center>
            <p class="carrito-vacio">Carrito vacío</p>
        </center>
    <?php else: ?>
        <!-- Si hay productos, entra en el bucle para mostrarlos -->
        <?php

        // Recorre cada producto del carrito.
        // $index es la posición numérica (0,1,2...) que usaremos para eliminar.
        // $producto contiene los datos: nombre, precio, imagen.

        foreach ($carrito as $index => $producto): ?>
            <div class="carrito-item">
                <!-- Muestra la imagen del producto (src viene del dato guardado) -->

                <img src="<?= $producto['imagen'] ?>" class="carrito-img">

                <!-- Muestra el nombre -->

                <span class = "carrito-nombre"><?= $producto['nombre'] ?></span>

                <!-- Muestra el precio con el signo $ -->

                <span class="carrito-total">$<?= $producto['precio'] ?></span>

                <!-- Formulario que envía el índice a eliminarcarrito.php para borrar este producto -->

                <form action="eliminarcarrito.php" method="POST" style="display:inline;">

                    <!-- El índice se envía oculto para identificar qué producto eliminar -->

                    <input type="hidden" name="indice" value="<?= $index ?>">

                    <button type="submit" class="carrito-eliminar">Eliminar</button>

                </form>
            </div>
        <?php endforeach; ?>
        <?php
        // Después del bucle, calcula y muestra el total de la compra.
        // array_column() extrae todos los 'precio' del carrito y array_sum() los suma.
        ?>
        <strong class = "carrito-total">Total: $<?= array_sum(array_column($carrito, 'precio')) ?></strong>
    <?php endif; ?>
   
    <!-- Enlace para volver al catálogo y seguir agregando productos -->
    <a href="index.php" class = "carrito-volver">Seguir comprando</a>
</div>
</body>
</html>