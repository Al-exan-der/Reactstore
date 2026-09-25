<?php
//abrir la sesion
session_start();

//verificar que llegue el indice
if (isset($_POST['indice'])){
    //eliminar el producto del carrito
    unset($_SESSION['carrito'][$_POST['indice']]);
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
}

header("location: carrito.php");
exit;
?>