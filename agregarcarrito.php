<?php
session_start();  // ← agregar esto al principio
if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito']=[];
}
$imagen = $_POST['imagen'];

// Normaliza rutas locales para que siempre apunten a assets/img.
// Mantiene intactas las URLs externas (http/https).
if (!preg_match('/^https?:\/\//i', $imagen)) {
    $imagen = str_replace('\\\\', '/', $imagen);
    $imagen = preg_replace('#^\./#', '', $imagen);
    $imagen = preg_replace('#^img/#', 'assets/img/', $imagen);
    if (!str_starts_with($imagen, 'assets/img/')) {
        $imagen = 'assets/img/' . ltrim($imagen, '/');
    }
}

$_SESSION['carrito'][]=[
    'nombre'=>$_POST['nombre'],
    'precio'=>$_POST['precio'],
    'imagen'=>$imagen
];
header("location: carrito.php");
exit;
?>


        

