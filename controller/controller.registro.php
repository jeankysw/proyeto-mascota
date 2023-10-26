
<?php
if (isset($_POST["registrar"])) {
    if (empty($_POST["nombre"]) || empty($_POST["usuario"]) || empty($_POST["contraseña"])) {
        echo '<div class="alert alert-danger">LOS CAMPOS ESTÁN VACÍOS</div>';
    } elseif (empty($_POST["nombre"])) {
        echo '<div class="alert alert-danger">NOMBRE ESTÁ VACÍO</div>';
    } elseif (empty($_POST["usuario"])) {
        echo '<div class="alert alert-danger">USUARIO ESTÁ VACÍO</div>';
    } else {

            require_once("./controller/Connection.php"); 
            $dbConnection = new DatabaseConnection();
            $conn = $dbConnection->getConnection();
        
            $nombre = $_POST["nombre"];
            $usuario = $_POST["usuario"];
            $contraseñAa =md5($_POST["contraseña"]);
            $role_id = 2; 
            $correo = $_POST["correo"];

            $consulta = "SELECT * FROM `mydb`.`User` where id;";
            $resultado = $conn->query($consulta);
            $numColumnas = $resultado->num_rows;
            $numColumnas++;
            
            $query = "INSERT INTO `mydb`.`User` (`id`,`nombre`, `username`, `email`, `password`, `Role_id`) VALUES  ('$numColumnas' ,'$nombre','$usuario', '$correo' ,'$contraseñAa', '$role_id')";
               
            if ($conn->query($query) === TRUE) {
                echo "<div class='alert alert-danger2'>Registro Exitoso </div>";
            } else {
                echo "<div class='alert alert-danger.'>. $conn->error </div>" ;
            }
    }
}

?>