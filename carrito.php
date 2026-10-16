
<?php
// Inicia la sesión para recuperar los datos del carrito que guardamos en $_SESSION.
session_start();

// Carga el carrito desde la sesión. Si no existe (usuario nunca agregó nada),
// el operador ?? asigna un array vacío para evitar errores.

$carrito = $_SESSION['carrito'] ?? [];
?>
<!DOCTYPE html>
<html class = "html-carrito">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrito</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
</head>
<link rel="stylesheet" href="assets/css/style.css">
<body >
     <header class="menu">

        <a href="index.php"><img src="assets/img/Logo.png" alt="logo" width="250px" class="logo"></a>
        <div class="menu-actions">
            <a href="carrito.php" class="form-login1">
                <img src="assets/img/carro-de-la-compra.png" alt="carrito" width="20px">
                <!-- CORREGIDO: $SESSION -> $_SESSION y removido el comentario mal puesto -->
                <?php if (count($_SESSION['carrito']) > 0): ?>
                <!-- el globito solo se muestra si hay al menos un producto en el carrito -->
                <span class="contador-carrito">
                    <?= count($_SESSION['carrito']) ?>
                </span>
                <?php endif; ?>
            </a>
            <form class="form-login" action="login.html" method="get">
                <button class="btn-primario">
                    <img src="assets/img/editar.png" alt="usuario" width="20px">
                </button>
            </form>
            <input type="text" placeholder="Búsqueda" class="menu-search">
        </div>
</header>
 <nav>
        <ul id="menud">
            <li>
                <a href="#" class="has-dropdown">Categorias</a>
                <div class="dropdown">
                    <a href="Accion.html">Accion</a>
                    <a href="Aventura.html">Aventura</a>
                </div>
            </li>
            <li>
                <a href="#" class="has-dropdown">Descubrir</a>
                <div class="dropdown">
                    <a href="Todos.html">Todos los Juegos</a>

                </div>
            </li>
            <li>
                <a href="updates.html">Novedades</a>
            </li>
        </ul>

    </nav>
<div class="carrito-contenedor">
    <h1 class = "carrito-h1">Tu Carrito</h1>
   
    <?php
    // Pregunta si el carrito está vacío (sin productos).
    // empty() devuelve true si es un array sin elementos.

    if (empty($carrito)): ?>
        <!-- Si está vacío, muestra este mensaje -->

        <p class="carrito-vacio">Carrito vacío</p>
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
<footer>
        <div class="footer">
            <img src="assets/img/Logo.png" height="50px" width="200px">
            <p>
                Lucas Lafuente - Alexis Gomez
            </p>
            <p>
                <a href="mailto:lucaslafuentehaeceg@gmail.com">lucaslafuentehaeceg@gmail.com</a> - <a
                    href="mailto:alexgome7i@gmail.com">alexgome7i@gmail.com</a>
            </p>

        </div>
    </footer>
    <script src="assets/js/script.js"></script>

</body>
</html>