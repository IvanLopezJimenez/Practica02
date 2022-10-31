<?php
//CONEXIÓN A LA BASE DE DATOS QUE HEMOS CREADO EN ALLWAYSDATA

//cogemos de config.php la info de nuestra base de datos.

use LDAP\Result;

require_once "config.php";


// include_once "registre.php";




// Creamos una conexión. 
//lo podemos hacer con PDO() o con mysqli()
//      El PDO es una libreria de php pq te busca lo q le pones
//$conexion = new PDO("mysql:host=$host; bdname =$base_datos; $user, $password");

function crear_conexion(){

    $host = "mysql-berta.alwaysdata.net";
    $user = "berta";

    //sí, es mi contraseña. no me robes na Ivan
    $passwd = "dragonballboladedrac";
    $dbname = "berta_cv";

    $conexion = new mysqli($host, $user, $passwd, $dbname);

    //chequeamos si se ha hecho bien la conexión
    if ($conexion -> connect_error) {
        die("Conexión fallida: ". $conexion->connect_error);
    }
    echo "Connected successfully";
    return $conexion;
}


//__________________________________ POL ________________________________________________________
        // //selecciona todo (= *) de la base de datos "usuari"
        // $consulta1 = [];
        // SELECT * FROM usuari;

        // //si ID, user, password y todo coincide, te lleva a cv.php. si no, te lleva otra vez a index.php pq quiere decir q algo no coincide.
        // $id = ....;
        // INSERT (nom, email);
        //     VALUES ("berta", "bertapasamontes@gmail.com")

        // foreach ($consulta as $user) {
        //     //si el nombre introducido, e correo, la contraseña es lo mimso q está en la base de datos, envia al usuario a su CV.
        //     if ($nom == $user['nom']){
        //         header("Location: cv.php");
        //     }
        // }

        //reenviar archivo php a otro php: función header('location:___.php')"

        // si no se cumple, envia al usuario de nuevo al inicio.
        // else {
        //     header("Location: index.php");
        // }
//_________________________________pol___________________________________________________________


//"sql=..." = coge "user, contraseña y host" de la tabla de allwaysdata "usuario".
// $sql = "SELECT user, contraseña, host FROM usuari";

//pasa lo cogido a lenguaje sql.
// $result = $conexion->query($sql);

//se cuentan las filas 
// $contador_de_filas = $result->num_rows;

//si el numero de filas es mayor a 0
// if ($contador_de_filas > 0) {
//     //se crea una array asociativa / tabla
//     while ($row = $result->fetch_assoc()) {
//         //se imprime cada fila <- no se tiene que ver en realidad. se imprime para ver si funciona
//         echo "User: ". $row["user"] . " - Password: ". $row["contraseña"]. " - Host: " . $row["host"]. "<br>";
//         header("Location: valida.php");
//     }
// }
// else {
//     echo "No hay resultados";
//     // header("Location: index.php");
// }

// $conexion->close();


//____________________AÑADIR LOS DATOS DEL USUARIO REGISTRADO__________________________________________________________________________________

//Programación con objetos
function ejecutar_query($query, $conexion){
    try{
        if($conexion && $query != ""){
            $resultado = $conexion-> query($query);
            echo "Consulta ejecutada";
            return $resultado;

            // $stmt = $conexion->prepare("UPDATE usuari SET name = ? WHERE id = ?");
            // $stmt->bind_param("si", $_POST['name'], $_SESSION['id']);
            // $stmt->execute();
            // $stmt->close();
        }
    }

    catch (PDOException $e){
        echo "MySQL.connection --Error--";
    }
    return $conexion;

}

//función q coge los datos introducidos en el registre.php y los añade a la tabla.
function insertar_valores($nombre, $apellido, $correo, $user, $contraseña){

    //estas varibales deben estar en el config.php, pero no los pilla. Hya q arreglarlo.
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['correo'];
    $user = $_REQUEST['usuario'];
    $contraseña = $_REQUEST['passwd'];


    $datos = "INSERT INTO berta_cv.usuari (nombre, apellido, correo, user, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$user', '$contraseña')";
    echo $datos;
    return $datos;
}


//función que mira si en la tabla USUARI hay algun "usuario" o "correo" igual a que se está introduciendo en el registre.php. 
//      Cogemos "usuario" o "correo" pq es lo que no se puede repetir. "nombre", "apellido" y "contraseña", sí que se puede repetir.
function comparar_valores_registro($correo, $user){

    $correo = $_REQUEST['correo'];
    $user = $_REQUEST['usuario'];

    $datos = "SELECT * FROM berta_cv.usuari WHERE correo = '$correo' OR user = '$user'";
    echo $datos;
    return $datos;
}

function comparar_valores_inicio($contraseña, $user){

    $contraseña = $_REQUEST['passwd'];
    $user = $_REQUEST['usuario'];

    $datos = "SELECT * FROM berta_cv.usuari WHERE contraseña = '$contraseña' AND user = '$user'";
    echo $datos;
    return $datos;
}
//quitar espacios
// $name = trim($name);
?>