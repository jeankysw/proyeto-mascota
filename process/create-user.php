<?php

require_once(__DIR__ ."/../controller/CRUD.controller3.php");
require_once(__DIR__ ."/../controller/Connection.php");
$users=new cruduser();
$userx=new User();

if (isset($_POST["registrar"])) {
    if ($_POST["nombre"] == "" or ($_POST["usuario"] == "") or ($_POST["correo"] == "") or ($_POST["contraseña"] == "") ) {
        echo "<div class='alert-danger'> Los campos estan vacios</div>";
        }
        else {
            $usuarioconsulta = $_POST["usuario"];
            $emailconsulta = $_POST["correo"];
            $conexion = new DatabaseConnection;
            $conexion = $conexion->getConnection();
            $query = "SELECT COUNT(*) AS user FROM User WHERE username = '$usuarioconsulta'";
            $queryEmail = "SELECT COUNT(*) AS email FROM User WHERE email = '$emailconsulta'";
            $resultEmail = $conexion->query($queryEmail);
            $result = $conexion->query($query);
        
            if ($result) {
                $usuario = $result->fetch_assoc();
                $email = $resultEmail->fetch_assoc();
                
                if ($usuario['user'] > 0) {
                    echo "<div class='alert alert-danger'>El usuario ya existe.</div>";
                } 
                else if ($email['email'] > 0) {
                    echo "<div class='alert alert-danger'>El correo electrónico ya está en uso.</div>";
                }
                
                else {
                   
                    $estado=$users->create($userx);
                    if ($estado) {
                        echo "<div class='alert alert-danger2'>Registro Exitoso.</div>";
                    } else {
                        
                        echo "<div class='alert alert-danger'>Error al crear el usuario: " . $conexion->error . "</div>";
                    }
                }
            } else {
                echo "<div class='alert alert-danger'>Error en la consulta a la base de datos.</div>";
            }
        }
        

}

?>