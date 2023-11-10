<?php
// Conexión a la base de datos
$servername = "tu_servidor_mysql";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Función para crear una nueva vacuna
function crearVacuna($idMascota, $nombreVacuna, $fechaAdministracion) {
    global $conn;
    $sql = "INSERT INTO vacunas (id_mascota, nombre_vacuna, fecha_administracion) VALUES ('$idMascota', '$nombreVacuna', '$fechaAdministracion')";
    if ($conn->query($sql) === TRUE) {
        return "Vacuna creada con éxito.";
    } else {
        return "Error al crear la vacuna: " . $conn->error;
    }
}

// Función para leer todas las vacunas de una mascota
function leerVacunasMascota($idMascota) {
    global $conn;
    $sql = "SELECT * FROM vacunas WHERE id_mascota = '$idMascota'";
    $result = $conn->query($sql);
    $vacunas = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $vacunas[] = $row;
        }
    }
    return $vacunas;
}

// Función para actualizar una vacuna
function actualizarVacuna($idVacuna, $fechaAdministracion) {
    global $conn;
    $sql = "UPDATE vacunas SET fecha_administracion = '$fechaAdministracion' WHERE id = '$idVacuna'";
    if ($conn->query($sql) === TRUE) {
        return "Vacuna actualizada con éxito.";
    } else {
        return "Error al actualizar la vacuna: " . $conn->error;
    }
}

// Función para eliminar una vacuna
function eliminarVacuna($idVacuna) {
    global $conn;
    $sql = "DELETE FROM vacunas WHERE id = '$idVacuna'";
    if ($conn->query($sql) === TRUE) {
        return "Vacuna eliminada con éxito.";
    } else {
        return "Error al eliminar la vacuna: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
+