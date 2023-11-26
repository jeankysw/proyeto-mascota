
<?php
 class Agregar_imagen extends DatabaseConnection{
       
    public function uploadAndLinkImage($userId, $imagen) {
         $conn=$this->getConnection();
                
            $nombreArchivo = $imagen['name'];
            $nombreTemporal = $imagen['tmp_name'];
            $tamañoArchivo = $imagen['size'];
            $tipoArchivo = $imagen['type'];
            $directorioDestino = 'foto/';
                
            if (move_uploaded_file($nombreTemporal, $directorioDestino . $nombreArchivo)) {
                $rutaImagen = $directorioDestino . $nombreArchivo;
                $sql = "INSERT INTO imagenes (nombre_archivo, tipo_archivo, tamaño_archivo, ruta) VALUES ('$nombreArchivo', '$tipoArchivo', '$tamañoArchivo', '$rutaImagen')";
                      
                $userId = $_SESSION['user_id'];
                if ($conn->query($sql) === TRUE) {
                    $imagen_id = $conn->insert_id;
                    $updateSql = "UPDATE User SET imagen_id = $imagen_id WHERE id = $userId";
                
                    if ($conn->query($updateSql) === TRUE) {
                        header("location:home.php");
                        } 
                    else {
                        return "Error al relacionar la imagen con el usuario: " . $conn->error;
                         }
                    } 
                else {
                    return 'Hubo un error al subir la imagen.';
                    }
                    } 
            else {
                 return 'No se ha seleccionado ninguna imagen.';
                }
            }           
                  
        }
    

?>