<?php
// session_start();

// if (isset($_SESSION['usuario'])) {
//     header("Location: home.php"); 
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styl0-index copy.css">
    <link rel="stylesheet" href="css/style-index-inicio-dession">
    <title>Login </title>
</head>
<body>

    <div id="container" class="container">
       
            
    
        <div class="login">
       <div class="logo-form1"><img src="./imagenes/loogo.png" alt="" class="logo-for"></div>
            <style>
                .logo-form1{
                    justify-content: center;
                    display: flex;
                    flex-direction: column;    
                    max-width: 500px;
                    max-height: 400px;
                    align-items: center;
                }
                .logo-for{
                    width: 70%;
                }
            </style>
<!---------------------------------------------------------- inicio de sesion formulario -------------------------------------->
            <h2>Iniciar Sesión</h2>
            <?php
            
            require_once __DIR__. "../vendor/autoload.php";
            use Dotenv\Dotenv;
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            // require_once (__DIR__ . './controller/Connection.php');
            // $conn = new Connection;
        
            require_once(__DIR__ . "../controller/Connection.php");
                $dbConnection = new DatabaseConnection();
                $conn = $dbConnection->getConnection();
                
                if (isset($_POST["Iniciarsesion"])) {
                    require_once(__DIR__ . "/process/session.controller2.php");
                }
                
    
        
            ?>
            <form  method="POST" id="login-form">
                <div class="submit submit--bgShadow">
                    <input class="submit__input" id="submitInput"  type="text"  name="usuario">
                    <label for="submitInput" class="submit__title">Usuario</label>
                </div>
                <div class="submit submit--bgShadow">
                    <input  class="submit__input" id="submitInput" type="password"  name="contrasena">
                    <label for="submitInput" class="submit__title">Contrasena</label>
                </div>
    
                    <button class="btn" name="Iniciarsesion" >Iniciar Sesión</button>
                    <button type="submit" name="registrarbtn" id="enviar">Registrar</button>
            </form>   
        
        </div>
                <?php
                if (isset($_POST["registrarbtn"])) {
                    header("Location:regitro.php"); 
                }
                ?>
             <div class="logo-form"><img class="logo-for1"  src="./imagenes/imge.perro-registro.jpg." alt=" imagen de fondo"></div>
      
    </div>

    <script src="javascript/sccript.js"></script>
</body>
</html>