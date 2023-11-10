<?php
// require_once(__DIR__ . "/../model/user.model.php");
require_once(__DIR__ . "/../controller/Connection.php");

        $conexion = new DatabaseConnection;
        $conexion=$conexion->getConnection();
        $username = $conexion->real_escape_string($_POST['usuario']); 
        $password = $conexion->real_escape_string($_POST['contrasena']); 
        $passwordencriptada= md5($password);


        
        if ($username==="" or $password=== "") {
              echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
        }
     else {
             $sql = "SELECT * FROM user WHERE username='$username' AND password='$passwordencriptada'";;
             $result = $conexion->query($sql);
             if ($result->num_rows > 0) {
            header("Location:home.php");
            exit;   
                  } 
            else {
                   echo '<div class="alert alert-danger">USUARIO O CONTRASEÑA INCORRECTA</div>';
            }
      }
      
   