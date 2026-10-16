<?php
$nombre=$_POST['nomusu'];
$apellido=$_POST['apeusu'];
$fechanacimiento=$_POST['nacusu'];
$numerotelefonico=$_POST['numusu'];
$correo=$_POST['corusu'];
$contraseña=$_POST['pasusu1'];
$repetircontraseña=$_POST['pasusu2'];

if ($contraseña !== $repetircontraseña) {
    echo "Las contraseñas no coinciden. <a href='signup.html'>Volver al registro</a>";
    exit;
}

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
$consulta = "INSERT INTO login_user (nom_usu, ape_usu, nac_usu, num_usu, cor_usu, pas_usu1, pas_usu2) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $consulta);

if (!$stmt) {
    die("Error al preparar la consulta: " . mysqli_error($conexion));
}

mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido, $fechanacimiento, $numerotelefonico, $correo, $contraseña, $repetircontraseña);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit;
} else {
    echo "ERROR: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
