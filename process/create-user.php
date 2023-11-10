<?php

require_once(__DIR__ ."/../controller/CRUD.controller3.php");
require_once(__DIR__ ."/../controller/Connection.php");
$users=new cruduser();
$userx=new User();

if (isset($_POST["registrar"])) {
    if ($_POST["nombre"] == "" or ($_POST["usuario"] == "") or ($_POST["correo"] == "") or ($_POST["contraseña"] == "") ) {
        echo "<div class='alert-danger'> Los campos estan vacios</div>";
        }
        else{
    $usuarioconsulta=$_POST["usuario"];
    $conexion =new DatabaseConnection;
    $conexion=$conexion->getConnection();
    $query = "SELECT COUNT(*) AS user FROM User WHERE username = '$usuarioconsulta'";
    $result = $conexion->query($query);

    if ($result) {
        $usuario = $result->fetch_assoc();
        
        if ($usuario==1) {
            echo "<div class='alert-danger'>Registro Fallidow  </div>";
            }

     $estado=$users->create($userx);
        if($estado) {
            echo "<div class='alert-danger2'> Registro Exitoso</div>"  ;                
              }

        else {
             echo "<div class='alert-danger'>Registro Fallido  </div>";
       
            }
     }
    }

}

?>