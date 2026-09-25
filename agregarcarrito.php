<?php
session_start();  // ← agregar esto al principio
if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito']=[];
}
$_SESSION['carrito'][]=[
    'nombre'=>$_POST['nombre'],
    'precio'=>$_POST['precio'],
    'imagen'=>$_POST['imagen']
];
header("location: carrito.php");
exit;
?>


        

