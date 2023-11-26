<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: home.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styl0-index copy.css">
    <title>Registro</title>
</head>
<body>

       
<div id="container" class="container">
<div class="registro">
            <!-- <div class="logo-form"><img class="logo-for" src="loogo.png" alt=""></div> -->
            
            <h2 class="h2">Registro</h2>
            <?php
            require_once __DIR__. "../vendor/autoload.php";
            use Dotenv\Dotenv;
           $dotenv = Dotenv::createImmutable(__DIR__);
           $dotenv->load();
         
           require_once("./controller/Connection.php");    
           $dbConnection = new DatabaseConnection();
                $conn = $dbConnection->getConnection();
                
                if (isset($_POST["registrar"])) {
                    require_once ("./process/create-user.php");
                        
                }

            ?>
            <form  method="POST" id="registro-form">
            <div class="submit submit--bgShadow">
                <input class="submit__input" id="submitInput" type="text"   name="nombre">
                <label for="submitInput" class="submit__title">Nombre</label>
            </div>
            <div class="submit submit--bgShadow">
                <input class="submit__input" id="submitInput" type="text"  name="usuario">
                <label for="submitInput" class="submit__title">Usuario</label>
            </div>
            <div class="submit submit--bgShadow">
                <input  class="submit__input" id="submitInput" type="email" name="correo">
                <label for="submitInput" class="submit__title">Correo</label>
            </div>
            <div class="submit submit--bgShadow">
                <input class="submit__input" id="submitInput" type="password" name="contraseña">
                <label for="submitInput" class="submit__title">Contraseña</label>
            </div>
                <!-- <input type="password" placeholder="confirmar contraseña" name="confirmar contraseña"> -->
                <button class="btn" name="registrar" type="submit">Registrar</button>
                <button type="submit" name="iniciarbtn" id="enviar2">Iniciar Sesión</button>
            </form>
            <?php
              if (isset($_POST["iniciarbtn"])) {
                  header("Location:login.php"); 
              }

              ?>
             
        </div>
         <div class="logo-form"><img class="logo-for1" src="./imagenes/imge.perro-registro.jpg." alt=" imagen de fondo"></div>
        
    <script src="sccript.js"></script>
</body>
</html>