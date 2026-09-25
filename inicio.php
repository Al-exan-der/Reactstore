<?php
session_start();
//si no estas logueado te redirige al login
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== true) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            color: white;
            margin-top: 150px;
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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