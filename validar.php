<?php
//obligatorio para usar sesiones
session_start();
//conexion a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "reactstore");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
//recibir datos del formulario
$email = $_POST['corusu'];
$password = $_POST['pasusu1'];
//busca el usuario por correo
$stmt = mysqli_prepare($conexion, "SELECT nom_usu, pas_usu1 FROM login_user WHERE cor_usu = ?" );
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
//s indicaque busca un parametro string
$resultado = mysqli_stmt_get_result($stmt);
if ($usuario = mysqli_fetch_assoc($resultado)) {
    //El usuario existe, verificar la contraseña
    
    if ($password == $usuario['pas_usu1']) {
        //si la contraseña es correcta, iniciar sesión
        $_SESSION['usuario'] = true;
        $_SESSION['nombre'] = $usuario['nom_usu'];
        $_SESSION['email'] = $email;
        header("Location: index.php");
        //se modifica a donde se redireccione una vez se incie sesion
        exit();
        } else{
            //la contraseña es incorrecta -> mostramos un mensaje con un link para volver 
            echo "contraseña incorrectos. <a href='login.html'>Volver a intentar</a>";
        }
        } else {
             //el correo no existe en la base de datos  
            echo "el correo no esta registrado. <br><a href='login.html' >Volver</a>";
        }
//cerraps la conexion a la base de datos para liberar recursos
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            color: white;
            margin-top: 150px;
            justify-content: center;
            color: var(--color-texto);
            background-color: var(--color-superficie);
            padding: 20px;
            border-radius: 8px;
            max-width: 350px;
            height: 100px;
            margin: 300px auto;
            text-align: center;
        }
        a {
            display: inline-block;
            background-color: var(--color-acento-calido);
            border: 2px solid var(--color-acento-calido);
            text-decoration: none;
            color: var(--color-fondo);
            padding: 8px;
            margin-top: 8px;
            border-radius: 48px;
            cursor: pointer;
            border-bottom: 2px solid var(--color-acento-calido);
            box-shadow:
                0 0 8px var(--color-acento-calido),
                0 0 24px var(--color-acento-calido),
                inset 0 0 8px rgba(255, 166, 0);
}
    a:hover {
            background-color: var(--color-acento-calido);
            box-shadow:
                0 0 15px var(--color-acento-calido),
                0 0 35px var(--color-acento-calido),
                0 0 60px var(--color-acento-calido),
                inset 0 0 10px rgba(255, 166, 0);
}

    </style>
    
</head>
</html>