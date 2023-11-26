<?php
require_once 'Connection.php'; 

class MascotaCRUD {
 

    public function crearMascota($nombre, $fechaNacimiento, $userId, $tipo_mascotas, $raza_id) {
        $databaseConnection = new DatabaseConnection();
        $conexion = $databaseConnection->getConnection();
        $consulta = "SELECT * FROM `mydb`.`User` WHERE id = $userId;";
        $resultadoConsulta = $conexion->query($consulta);
        $sql = "INSERT INTO Mascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) VALUES ('$nombre', '$fechaNacimiento', '$userId', '$tipo_mascotas', '$raza_id')";
        if ($conexion->query($sql) === TRUE) {
            
        } else {
            echo "Error al crear la mascota: " . $conexion->error;
        }
    }
    public function obtenerMascotas() {
        $databaseConnection = new DatabaseConnection();
        $conexion = $databaseConnection->getConnection();
        $resultado = $conexion->query("SELECT mascotas.id, mascotas.nombre, mascotas.FechaNacimiento,
        users.nombre AS nombre_usuario, tipoMascota.nombre AS tipo_mascota, raza.nombre AS nombre_raza
 FROM Mascota AS mascotas
 LEFT JOIN User AS users ON mascotas.User_id = users.id
 LEFT JOIN TipoMascota AS tipoMascota ON mascotas.TipoMascota_id = tipoMascota.id
 LEFT JOIN Raza AS raza ON mascotas.Raza_id = raza.id;
 ");

        if ($resultado->num_rows > 0) {
            $mascotas = [];
            while ($fila = $resultado->fetch_assoc()) {
                $mascotas[] = $fila;
            }
            return $mascotas;
        } else {
            return "No se encontraron mascotas.";
        }
    }

 
    public function actualizarMascota($id, $nuevoNombre,$fechaNacimiento,$nuevotipo,$nuevaraza ){
        $databaseConnection = new DatabaseConnection();
        $conexion = $databaseConnection->getConnection();
        $sql = "UPDATE Mascota SET nombre='$nuevoNombre', fechaNacimiento='$fechaNacimiento' ,TipoMascota_id='$nuevotipo',Raza_id='$nuevaraza' WHERE id=$id";

        if ($conexion->query($sql) === TRUE) {
            return "Mascota actualizada correctamente.";
        } else {
            return "Error al actualizar la mascota: " . $conexion->error;
        }
    }
    

    public function eliminarMascota($id) {
        $databaseConnection = new DatabaseConnection();
        $conexion = $databaseConnection->getConnection();
        $sql = "DELETE FROM Mascota WHERE id=$id";

        if ($conexion->query($sql) === TRUE) {
            return "Mascota eliminada correctamente.";
        } else {
            return "Error al eliminar la mascota: " . $conexion->error;
        }
    }
}


$databaseConnection = new DatabaseConnection();
$conexion = $databaseConnection->getConnection();


$mascotaCRUD = new MascotaCRUD($conexion);

?>
