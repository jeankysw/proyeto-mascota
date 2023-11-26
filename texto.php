<?php 

 require_once __DIR__. "../vendor/autoload.php";
 use Dotenv\Dotenv;
 $dotenv = Dotenv::createImmutable(__DIR__);
 $dotenv->load();
 require_once(__DIR__ . "../controller/Connection.php");
 require_once(__DIR__ ."../controller/CRUD.controller3.php");

$conexion = new DatabaseConnection;
        $conn = $conexion->getConnection();
       

if (isset($_SESSION['usuario']) && isset($_SESSION['contrasena'])) {
    $usuario = $_SESSION['usuario'];
    $contrasena = $_SESSION['contrasena'];

        $sqlid = "SELECT imagen_id FROM user WHERE username = '$usuario' AND password = '$contrasena'";
        $resultid = $conn->query($sqlid);
                    
        if ($resultid && $resultid->num_rows > 0) {
             $row = $resultid->fetch_assoc();
            $imagen_id = $row['imagen_id'];
            $sql_imagen = "SELECT ruta FROM imagenes WHERE id = $imagen_id";
            $result_imagen = $conn->query($sql_imagen);
                    
            if ($result_imagen && $result_imagen->num_rows > 0) {
                $row_imagen = $result_imagen->fetch_assoc();
                $rutaImagen = $row_imagen['ruta'];
                $_SESSION['rutaImagen'] = './foto/images.png';
                    
                echo "<img id='vista-previa2' src='$rutaImagen' alt='Imagen de perfil'>";
                 require_once(__DIR__ . "./model/user.model.php");
                $_SESSION['ruta_imagen'] = $rutaImagen;

                } else {
                     $rutaImagen='./foto/images.jpg';
                echo "<img src=' $rutaImagen'>" ;
                        }
                    } else {
                        echo "No se encontró el usuario o la contraseña es incorrecta.";
                    }
                }
            
            
        
 
?>