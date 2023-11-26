<?php
require_once(__DIR__."./Connection.php");
     class CRUDvacuna extends DatabaseConnection {
        function crearVacuna($nombre) {
            $conn =$this->getConnection();
            $sql = "INSERT INTO vacuna (nombre) VALUES ('$nombre')";
            if ($conn->query($sql) === TRUE) {
                return "Vacuna creada con éxito.";
            } else {
                return "Error al crear la vacuna: " . $conn->error;
            }
        }


        function leerVacunasMascota() {
            $conn =$this->getConnection();
            $sql = "SELECT cv.Mascota_id, m.nombre AS nombre_mascota, cv.Vacuna_id, v.nombre AS nombre_vacuna, cv.fecha
            FROM ControlVacuna cv
            INNER JOIN Mascota m ON cv.Mascota_id = m.id
            INNER JOIN Vacuna v ON cv.Vacuna_id = v.id";
            $result = $conn->query($sql);
            $vacunas = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $vacunas[] = $row;
                }
            }
            return $vacunas;
        }


        }
?>
+