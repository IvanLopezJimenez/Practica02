<!-- validación de los datos de index.php con database.php -->
<!-- no se ve. -->
<!-- si estan mal los datos, vuelve a validar. -->

<?php

require_once "database.php";
require_once "index.php";
// foreach ($conexion as $usuari){
//     if ($conexion == $usuari['user'] AND $conexion == $usuari['contraseña'] AND $conexion == $usuari['nombre'] AND $conexion == $usuari['apellido'] AND $conexion == $usuari['correo']){
//         header("Location: cv.php");
//     }
//     else {
//         header("Location: index.php");
//     }
// }


//pov: user tiene usuario y contraseña correcta
// session_start();
// $_SESSION['user'] = $user;
//hemos creado una sesión, por lo q todos los docs pueden ver q hay aquí dentro.

$usuario = (isset($_REQUEST['usuario'])) ? $_REQUEST['usuario'] : "";
$contraseña = (isset($_REQUEST['passwd'])) ? $_REQUEST['passwd'] : "";

$conn = crear_conexion();

$consulta1 = ejecutar_query(comparar_valores_inicio($contraseña, $usuario), $conn) ;



if ( $consulta1-> num_rows > 0){
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: cv.php"); 
    exit;
}
else {
    header("Location: index.php?error=no_en_uso");
    exit;
}

// if (!$conn){
//     //creamos conexión con la base de datos:
//     $conn = crear_conexion();
//     $consulta1 = ejecutar_query(comparar_valores_inicio($contraseña, $usuario), $conn) ;
//     $row_cnt = mysqli_num_rows($consulta1);
//     printf("Result set has %d rows.\n", $row_cnt);

//     if($row_cnt > 0){
//         header("Location: cv.php");
//     }
//     else {    
//         echo 'Nombre o contraseña incorrecto.';
//     }


// }

?>
