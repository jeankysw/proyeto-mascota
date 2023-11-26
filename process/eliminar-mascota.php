
<?php
include_once("../mascotas.php");

echo '

<link rel="stylesheet" href="../css/stylos-mascotas.css">
<div  id="fondoOscuroeli" style="display: block;"></div>
<form method="post">
            <div id="alertaeli" style="display: block;">
            <img src="../imagenes/alert.jpg" alt="">
            <h3>¿Estás seguro de querer eliminar esta mascota? /h3>
            <div class="div-boton-eliminar"> 
            <button id="confirmarEliminar"  onclick="redirigir2()" type="submit" name="confirmaciondelet"  class="btn-aceptar"><i class="fas fa-check"></i> Aceptar</button>
            <a href="../mascotas.php">  <div class="btn-cerrar"><i class="fas fa-times"></i>Cancelar</div>
             </div></a>
          
        </form> ';
 
        ?>
         </div>

<?php

    if(isset($_POST["confirmaciondelet"])){
            include_once("../controller/crud-mascotas.php");
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";
            $conexion = new mysqli($servername, $username, $password, $dbname);

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $eliminarvacuna = "DELETE FROM ControlVacuna WHERE Mascota_id = $id";
            
            $mascotaCRUD = new MascotaCRUD($conexion);
            if($conexion->query($eliminarvacuna)){
                $resultadoEliminar = $mascotaCRUD->eliminarMascota($id);
            echo' 

            <link rel="stylesheet" href="../css/stylos-mascotas.css">
            <div style="display: block;" id="fondoOscuro" ></div>
            <div id="confirmacion" class="alerta img_gif" style="display: block;">
            <div class="div-border">
            <img src="../imagenes/Check animation.gif">
            </div>
            <h3>Eliminado con exito</h3>  
            </div>';
            
        }
       

            }
            
    }
    else{
       echo $conexion->error;

    }
  

?>
<script src="../javascript/script-pagina-mascotas.js"></script>
<script src="../javascript/script-pagina-principal.js"></script>
   