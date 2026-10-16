<?php
session_start();
//si no estas logueado te redirige al login
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== true) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
    <html lang="es">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body{
            color: white;
            margin-top: 150px;
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio | React Store</title>
    </head>

    <body>
        <div class="container-login">
            <h1>Bienvenido,<?=htmlspecialchars($_SESSION['nombre'])?></h1>
            <p>Bienvenido a tu carrito de compras</p>
            <a href="carrito.php" class="button-login">ver productos</a>
            <a href="logout.php" class="button-login">Cerrar Sesión</a>
        </div>
        
    </body>

    </html>