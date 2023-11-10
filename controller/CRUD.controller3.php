<?php
require_once(__DIR__ . "/../model/user.model.php");
require_once(__DIR__ . "/Connection.php");

class cruduser extends DatabaseConnection
{
    public function create(User $usuario)

    {
        $conexion =  $this->getConnection();
       
        $nombre = $usuario -> name  = ($conexion -> real_escape_string($_POST['nombre']));
        $userName = $usuario -> username = $conexion -> real_escape_string($_POST['usuario']); 
        $email = $usuario -> email = $conexion -> real_escape_string($_POST['correo']); 
        $password = $usuario -> password = $conexion -> real_escape_string($_POST['contraseña']);
        $passwordencriptrada = md5($password);
        $role_id = $usuario -> role =  "1";
        $consulta = "SELECT * FROM `mydb`.`User` where id;";
            $resultado = $conexion->query($consulta);
            $numColumnas = $resultado->num_rows;
            $numColumnas++;
       
        $sql = "INSERT INTO user (id, nombre, username, email, password, Role_id) VALUES ($numColumnas, '$nombre', '$userName', '$email', '$passwordencriptrada', $role_id)";

        return $conexion->query($sql);
        if ($conexion->query($sql)) {
            echo "Error al crear el registro: " . $conexion->error;
        }
    
    }


    public function read()
    {
        $conexion =  $this->getConnection();
        $sql = "SELECT id, user FROM username";
        $result = $conexion->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            } 
        }
        return $users;
    }
    

    public function update($id, $name, $username, $email , $password, $role)
    {
        //conexion de la base de datos
        $mysqli = $this->getConnection();

        // Sanitizar los datos
        $newName = $mysqli->real_escape_string($name);
        $newusername = $mysqli->real_escape_string($username);
        $newemail = $mysqli->real_escape_string($email);
        $newpassword = $mysqli->real_escape_string($password);
        
        // Consulta para actualizar los datos
        $sql = "UPDATE 'user' SET name = '$newName', username = '$newusername', email = '$newemail', password = '$newpassword' WHERE id = $id";
        
        //miramos si se actualizo
        if ($mysqli->query($sql)) {
            echo "Registro actualizado con éxito.";
        } else {
            echo "Error al actualizar el registro: " . $mysqli->error;
        }
        // Cerramos la conexion a la base de datos
        $mysqli->close();
    }

    public   function delete($id)
    {
        //conexion de la base de datos
        $mysqli = $this->getConnection();
        //evitar caracteres de connsultas
        $sql = "DELETE FROM 'user' WHERE id = $id";

        if ($mysqli->query($sql)) {
            echo "Registro eliminado con éxito.";
        } else {
            echo "Error al eliminar el registro: " . $mysqli->error;
        }

        $mysqli->close();
    }
}

