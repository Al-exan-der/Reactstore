<?php
session_start();  // ← agregar esto al principio
if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito']=[];
}
$nombre = $_POST['nombre'] ?? '';
$precio = $_POST['precio'] ?? '';
$imagen = $_POST['imagen'] ?? '';

if (!is_string($nombre) || trim($nombre) === '' || !is_string($precio) || trim($precio) === '' || !is_string($imagen) || trim($imagen) === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    exit('Faltan datos requeridos para agregar el producto.');
}

// Normaliza rutas locales para que siempre apunten a assets/img.
// Mantiene intactas las URLs externas (http/https).
if (!preg_match('/^https?:\/\//i', $imagen)) {
    $imagen = str_replace('\\', '/', $imagen);
    $imagen = preg_replace('#^\./#', '', $imagen);
    $imagen = preg_replace('#^img/#', 'assets/img/', $imagen);
    if (!str_starts_with($imagen, 'assets/img/')) {
        $imagen = 'assets/img/' . ltrim($imagen, '/');
    }
}

$_SESSION['carrito'][]=[
    'nombre'=>$nombre,
    'precio'=>$precio,
    'imagen'=>$imagen
];
//agregado por mi para el overlay del carrito
if (($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'fetch') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'nombre'   => $nombre,
        'precio'   => $precio,
        'imagen'   => $imagen,
        'cantidad' => count($_SESSION['carrito'])
    ]);
    exit;
}
header("location: carrito.php");
exit;
?>


        
