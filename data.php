<?php
$nombre=$_POST['nomusu'];
$apellido=$_POST['apeusu'];
$fechanacimiento=$_POST['nacusu'];
$numerotelefonico=$_POST['numusu'];
$correo=$_POST['corusu'];
$contraseña=$_POST['pasusu1'];
$repetircontraseña=$_POST['pasusu2'];

//CADENA DE CONEXION
$hostname="localhost";
$username="root";
$clave="";
$basedatosname="reactstore";
$tablaname="login_user";

//crear cadena conexion
$conexion = mysqli_connect($hostname, $username, $clave, $basedatosname);

//Chequear conexion
if (!$conexion){
    die("Error al conectar a la base de datos " . mysqli_connect_error());
}

//insertar datos
$consulta = "INSERT INTO login_user (nom_usu, ape_usu, nac_usu, num_usu, cor_usu, pas_usu1, pas_usu2) VALUES ('$nombre','$apellido','$fechanacimiento', '$numerotelefonico','$correo','$contraseña','$repetircontraseña')";

if (mysqli_query($conexion, $consulta))
{
    header("Location: index.php");
}
else
{
    echo "ERROR: " .$consulta . "<br>" . mysqli_error($conexion);
}
?>

