<?php 
    include_once("../mascotas.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $conexion = $databaseConnection->getConnection();
        $query = "SELECT nombre FROM Mascota WHERE id = $id";
        $result = $conexion->query($query);   
        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $nombreMascota = $row['nombre'];
            } 
            
        }
            }
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../css/stylos-vacunar-mascotas.css">
<head>
    <title>Formulario de Vacunas</title>
</head>
<body>
<div id="overlay" class="overlay"></div>
<div id="formulario" class="formulario">
    
   
    <form action="" method="POST">
    <label for="valor">Mascota:</label><br>
    <input type="text" id="valor" name="valor" value=" <?php echo $nombreMascota  ?>" readonly>
    
    <label for="vacuna">Seleccione una vacuna:</label><br>
        <select name="vacuna" id="vacuna" class="styled-select">
            <?php
            require_once "../controller/Connection.php";
            $conn= new DatabaseConnection();
            $conn=$conn->getConnection();
            $query = "SELECT id, nombre FROM Vacuna";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vacunas disponibles</option>";
            }
        
            ?>
        </select><br><br>
        <button type="submit"  name="agregarvacuna" class="btn-guardar"><i class="fas fa-save"></i> Agregar</button>
       <a href="../mascotas.php"><button  name="cerrar-editar-cancion" type="button" class="btn-cerrar" ><i class="fas fa-times"></i> Cerrar</button></a>  

    </form>

</div>

                <?php 
                    if(isset($_POST['agregarvacuna'])){
                        $vacuna_id = 1; 
                        $fecha = '2023-11-26';
                        $sql = "INSERT INTO ControlVacuna (Mascota_id, Vacuna_id, fecha) VALUES ( $id , $vacuna_id, $fecha)";
                        $result= $conn->query($sql);
                        if($result){

                        echo "Datos insertados correctamente.";
                             }
                                        }
                ?>
</body>
</html>
