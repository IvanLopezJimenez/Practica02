<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 2 - Formulario registro CV</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css" type="text/css"> 
    </head>
    <body>
        <content>
            <?php
            //formulario donde introducimos los datos del usuario y su contraseña 
            echo'<a href="index.php"><button class = "atras" style=" width: 75px; padding: 10px; margin: 25px;">Back</button></a>';
            echo '<form action="alta.php" method="POST" role="form" class="container">
                    <h1>Registrarse</h1>
                    <div class="alert">';
                        if (isset($_GET['error'])){
                            if ($_GET['error']=='faltan_cosas'){
                                echo "Rellene todos los campos, por favor";
                            } 
                            else if ($_GET['error']=='ya_en_uso'){
                                echo "Usuario o Correo ya registrado.";
                            } 
                            else if ($_GET['error']=='wrongUsername'){
                                echo "Usuario no encontrado";
                            } 
                            else if ($_GET['error']=='wrongPassword'){
                                echo "Contraseña incorrecta";
                            } 
                            else if ($_GET['error']=='unfilled'){
                                echo "Tienes que completar todos los campos";
                            }
                        }
                    echo '</div>
                    <input type="text" placeholder="Name" name = "nombre">
                    <input type="text" placeholder="Surname" name = "apellido">
                    <input type="text" placeholder="Email" name = "correo">
                    <input type="text" placeholder="User" name = "usuario">
                    <input type="password" placeholder="Password" name = "passwd">
                    <button type="submit" value="Registrarse">Registrarse</button>
                </form>';

            
            // if (!isset($_REQUEST['usuario']) && isset($_REQUEST['passwd'])){
            //     $user = $_REQUEST['usuario'];
            //     $passwd = $_REQUEST['passwd'];
            // }

           
            
           
            
            // if (isset($nombre) && isset($apellido) && isset($usuario) && isset($contraseña) && isset($correo)) {
            //     $nombre = $_REQUEST['nombre'];
            //     $apellido = $_REQUEST['apellido'];
            //     $correo = $_REQUEST['correo'];
            //     $usuario = $_REQUEST['usuario'];
            //     $contraseña = $_REQUEST['passwd'];
            //     // header('Location: alta.php');
            //     // echo "hoal";
                
            // }
            // if ($nombre = "" || $apellido = "" || $correo = "" || $usuario = "" || $contraseña = "") {
            //                 echo "Rellene todos los campos, por favor.";
            //             }
            
            ?>
        </content>
        
    </body>
</html>