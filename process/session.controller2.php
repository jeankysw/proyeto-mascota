<?php
// require_once(__DIR__ . "/../model/user.model.php");
require_once(__DIR__ . "/../controller/Connection.php");

        $conexion = new DatabaseConnection;
        $conexion=$conexion->getConnection();
        

           $username = $conexion->real_escape_string($_POST['usuario']); 
           $password = $conexion->real_escape_string($_POST['contrasena']); 
           $passwordencriptada= md5($password);
        
      
      
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$passwordencriptada'";
            $result = $conexion->query($sql);

                  if ($result->num_rows > 0) {
            
                  $row = $result->fetch_assoc();
                  $usuario = $row['username'];
                  $contrasena = $row['password'];
                  $user_id = $row['id'];

                  session_start();
                  $_SESSION['usuario'] = $usuario;
                  $_SESSION['contrasena'] = $contrasena;
                  $_SESSION['user_id'] = $user_id;
                  $_SESSION['name'] = $nombre;
                  header("Location: home.php");
      
                  }     
      else {
            echo '<div class="alert alert-danger">USUARIO O CONTRASEÑA INCORRECTA</div>';
      } 
            
      //       else {
      //            
  
      // }
      
   