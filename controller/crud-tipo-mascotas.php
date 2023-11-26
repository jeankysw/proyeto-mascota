<?php

require_once(__DIR__."./Connection.php");
class TipoMascotaCrud extends DatabaseConnection{
    
    

    public function agregarTipoMascota($nombre, $joven, $adulto, $edad_adulto) {

        $conn=$this->getConnection();
        $sql = "INSERT INTO TipoMascota (nombre, EdadEquivalenteJoven, EdadEquivalenteAdulto, EdadAdulto) VALUES ('$nombre', $joven, $adulto, $edad_adulto)";

        if ($conn->query($sql) === TRUE) {
            return "Nuevo tipo de mascota agregado con éxito.";
        } else {
            return "Error al agregar el tipo de mascota: " . $conn->error;
        }
    }
    
    public function obtenerTiposMascotas() {
        $conn=$this->getConnection();
        $sql = "SELECT * FROM TipoMascota";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $tiposMascotas = [];
            while ($row = $result->fetch_assoc()) {
                $tiposMascotas[] = $row;
            }
            return $tiposMascotas;
        } else {
            return [];
        }
    }

    public function eliminarTipoMascota($id) {
        $conn=$this->getConnection();
        $sql = "DELETE FROM TipoMascota WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return "Tipo de mascota eliminado con éxito.";
        } else {
            return "Error al eliminar el tipo de mascota: " . $conn->error;
        }
    }

}
?>
