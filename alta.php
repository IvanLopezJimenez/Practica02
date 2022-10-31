<!-- validación de los datos de registre.php con database.php  -->
<!-- no se ve. -->
<!-- si estan mal los datos, vuelve a validar. -->
<!-- cojo la función de crear_user, lo creo y lo guardo en la database.php -->
<?php


require_once "database.php";
// include_once "registre.php";

// session_start();

//creamos conexión con la base de datos:
$conn = crear_conexion();

$usuario = (isset($_REQUEST['usuario'])) ? $_REQUEST['usuario'] : "";
$contraseña = (isset($_REQUEST['passwd'])) ? $_REQUEST['passwd'] : "";
$nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : "";
$apellido = (isset($_REQUEST['apellido'])) ? $_REQUEST['apellido'] : "";
$correo = (isset($_REQUEST['correo'])) ? $_REQUEST['correo'] : ""; 


// foreach ($conexion as $usuari){
//     if ($conexion == $usuari['usuario'] AND $conexion == $usuari['contraseña'] AND $conexion == $usuari['nombre'] AND $conexion == $usuari['apellido'] AND $conexion == $usuari['correo']){
//         header("Location: cv.php");
//     }
//     else {
//         echo"holaaa";
//         // header("Location: registre.php");
//     }
// }

if (empty($usuario) || empty($contraseña) || empty($nombre) || empty($apellido) || empty($correo)) {
    header("Location: registre.php?error=faltan_cosas");
    exit;
}


//comparamos si el correo o el usuario estan en la tabla
$consulta1 = ejecutar_query(comparar_valores_registro($correo, $usuario), $conn);

if ($consulta1-> num_rows > 0) {
    header("Location: registre.php?error=ya_en_uso");
    exit;
}

else {
    session_start();
    $consulta2 = ejecutar_query(insertar_valores($nombre, $apellido, $correo, $usuario, $contraseña), $conn);
    $_SESSION['usuario'] = $usuario;
    $_SESSION['correo'] = $correo;
    header("Location: cv.php");
    exit;

}
    



// //sacamos cuantas veces se encunetran en la tabla
// //$row_cnt = mysqli_num_rows($consulta1);
// printf("Result set has %d rows.\n", $row_cnt);
// //si se encuentran más de 0 veces, q se imprima el mesnaje de q ya hay un usuario registrado con esa info.
// if($row_cnt > 0){
//     echo "Nombre de usuario o mail ya están en uso";
// }
// //si no, q se añada a la tabla.
// //else {    
//     $consulta1 = ejecutar_query(insertar_valores($nombre, $apellido, $correo, $usuario, $passwd), $conn);
// //}





?>