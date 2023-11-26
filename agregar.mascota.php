
<div class="overlay1" id="overlay1"></div>
         <div class="modal1" id="modal1">
    <form action="" method="POST" class="styled-form">
        
        <div class="form-group">
       
            <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="fechaNacimiento"><i class="fas fa-calendar"></i> Fecha de Nacimiento:</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento">
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
            $databaseConnection = new DatabaseConnection();
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
        <button type="submit" onclick="agregar()" name="agregarMascota" class="btn-guardar">
            <i class="fas fa-save"></i> Guardar
        </button>
        <button type="button" class="btn-cancelar" onclick="ocultarModal1()">
            <i class="fas fa-times"></i> Cancelar
        </button>
          </form>
          
</div> 
</div>                    
        </div>
        <?php
          $mascota = new MascotaCRUD($conexion);
                        
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregarMascota'])) {
                $nombre=$_POST["nombre"];
                $tipo_mascotas=$_POST["animal"];
                $fechaNacimiento=$_POST["fechaNacimiento"];
                $Raza=$_POST["raza"];
                $userId = $_SESSION['user_id'];     
                $resultadoCrear = $mascotaCRUD->crearMascota("$nombre", "$fechaNacimiento", $userId, $tipo_mascotas,$Raza);
                 
                    echo'
                  
                        <link rel="stylesheet" href="../css/stylos-mascotas.css">
                        <div style="display: block;" id="fondoOscuroagregar" ></div>
                        <div id="confirmacion" class="alerta img_gif" style="display: block;">
                        <div class="div-border">
                        <img src="./imagenes/Check animation.gif">
                        </div>
                        <h3>Actualizado con exito</h3>  
                        </div>';

                    
                } 
        ?>
        <script>
        function mostrarFormulario1() {
            document.getElementById("overlay1").style.display = "block";
            const modal = document.getElementById('modal1');
             modal.classList.add('active');
        }
        function ocultarModal1() {
            document.getElementById("overlay1").style.display = "none";
    const modal = document.getElementById('modal1');
    modal.classList.remove('active');
}
        </script>