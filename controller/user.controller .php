<?php


if (isset($_POST["Iniciarsesion"])) {
    if (empty($_POST["usuario"]) && empty($_POST["contrasena"])){
        echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
        }
        elseif (empty($_POST["usuario"])){
            echo '<div class="alert alert-danger">USUARIO INVALIDO</div>';
            }
            elseif( empty($_POST["contrasena"])){
                echo '<div class="alert alert-danger">CONTRASEÑA INCORRETA</div>';
                }
     else {
        $dbConnection = new DatabaseConnection();
        $conn = $dbConnection->getConnection();
        
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        

        $usuario = $_POST["usuario"];
        $clave = md5($_POST["contrasena"]);
        // $conn = new mysqli($_ENV["SERVER"], $_ENV["USER"],$_ENV["PASS"],$_ENV["DB"]);
        $consult = "SELECT * FROM user WHERE username='$usuario' AND password='$clave'";
        $result = $conn->query($consult);

        if ($result->num_rows > 0) {
            header("Location:principal.php");
            exit; 
        } else {
            echo '<div class="alert alert-danger">USUARIO O CONTRASEÑA INCORRECTA</div>';
        }

        $conn->close();
       
    }
  
}
?>