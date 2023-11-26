<?php  
 include_once("../mascotas.php");
require_once("../controller/Connection.php");
 $conn= new DatabaseConnection();
 $conn=$conn->getConnection();
 $id = $_GET['id'];
 $sql = "SELECT nombre, FechaNacimiento FROM Mascota WHERE id = $id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $nombreMascota = $row['nombre'];
        $fechaNacimiento = $row['FechaNacimiento'];
    }

}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../css/stylos-mascotas.css">
<body>

<div class="modal_edita" id="modal_editar">
<div  id="fondoOscuroeli" style="display: block;"></div>
        <form class="form_editar" id="form_editar" method="post">
        <span class="close-modal2" onclick="cerrarModalEditar()"><i class="fas fa-times-circle"></i></span>
            <div class="relleno"> 
            <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" value="<?php echo $nombreMascota; ?>"id="nombre" name="nombre"><br><br>
                <label for="fechaNacimiento"><i class="fas fa-calendar"></i> Fecha de Nacimiento:</label>
                <input value="<?php echo $fechaNacimiento; ?>" type="date" id="fechaNacimiento" name="fechaNacimiento"><br><br>
            </div>
            <div class="form-group">
                <label for="animales">Seleccione una Mascota:</label>
                <select id="animales" name="animal" class="styled-select">
                    <?php
                    $databaseConnection = new DatabaseConnection();
                    $conexion = $databaseConnection->getConnection();
                    $query = "SELECT * FROM TipoMascota";
                    $result = $conexion->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        <div class="form-group">
            <label for="animales">Seleccione una Raza:</label>
            <select id="animales" name="raza" class="styled-select">
            <?php
                $conexion = $databaseConnection->getConnection();
                $query = "SELECT * FROM Raza";
                $result = $conexion->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                    }
                }
            ?>
            </select>
        </div>
            <button name="editar-btn" class="btn-editar" onclick="confirmaredicionmascotas()">
                <i class="fas fa-edit"></i> Editar
            </button>
            <button  name="cerrar-editar-cancion" type="button" class="btn-cerrar" onclick="cerrarModalEditar()">
                <i class="fas fa-times"></i> Cerrar
            </button>

        </form>
</div>


</body>
</html>
<?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar-btn'])) {
            require_once("../controller/crud-mascotas.php");
           
            $conexion = $databaseConnection->getConnection();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $nuevaraza=$_POST['raza'];
            $nuevotipo=$_POST['animal'];
            $nuevonombre=$_POST["nombre"];
            $nuevafecha=$_POST["fechaNacimiento"];
            $mascotaCRUD = new MascotaCRUD($conexion);
            header('../mascotas.php');
             $resultadoActualizar = $mascotaCRUD->actualizarMascota($id,$nuevonombre,$nuevafecha,$nuevotipo,$nuevaraza );
            echo' 

            <link rel="stylesheet" href="../css/stylos-mascotas.css">
             <div style="display: block;" id="fondoOscuro" ></div>
            <div id="confirmacion" class="alerta img_gif" style="display: block;">
            <div class="div-border">
            <img src="../imagenes/Check animation.gif">
            </div>
            <h3>Actualizado con exito</h3>  
            </div>';
            
            header("location:../mascotas.php");


            }
if(isset($_POST['cerrar-editar-cancion'])) {
    echo' 

    <link rel="stylesheet" href="../css/stylos-mascotas.css">
    <div id="confirmacion" class="alerta img_gif" style="display: block;">
    <div class="div-border">
    <img src="../imagenes/Check animation.gif">
    </div>
    <p>accion cancelada</p>  
    </div>';
    }
}
?>
<script src="../javascript/script-pagina-mascotas.js"></script> 
