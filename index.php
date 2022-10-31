<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 2 - Formulario CV</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/style.css" type="text/css">
    </head>
    <body>
        <?php 
            session_start();
            if (isset($_SESSION['usuario'])){
                header('Location: cv.php');
                exit;
            }
            echo '<form action="valida.php" method="POST" role="form" class="container"> 
                <h1>¡Bienvenid@!</h1>        
                <h2>Login</h2>
                <div class="alert">';
                    if (isset($_GET['error'])){
                        if ($_GET['error']==1){
                            echo "El usuario o la contraseña son incorrectos";
                        } 
                        
                        else if ($_GET['error']=='no_en_uso'){
                            echo "Usuario o contraseña no registrado";
                        } 
                    }
                echo '</div>
                <input id="username" type="text" placeholder="Username" name="usuario">
                <input id="password" type="password" placeholder="Password"  name="passwd">
                <button type="submit" value="Iniciar Sesion">Inicar sesión</button>
                <p class="subtitulo">¿Todavía no estás registrado?</p>   
                <button type="submit" formaction="registre.php" class="regist" value="Registrarse">Registrarse</button>
            </form>';           
            echo '<div class= "copyright">
                    <p>© Ivan Lopez & Berta Pasamontes</p>
                </div>';

        ?>
    </body>
</html>