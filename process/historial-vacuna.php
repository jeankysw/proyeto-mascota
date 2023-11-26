<?php
   require_once "../mascotas.php"; ?>
    <link rel="stylesheet" href="../css/stylos-vacunas.css">
 
    <div class="overlay"></div>
    <div  id="fondoOscuroeli" style="display: block;"></div>
<div class="historial"> 
    <a class="cerrar" href="../mascotas.php">&times;</a>
<h2>Historial de Vacuna </h2>
<table>
    <tr>
        <th>Mascota</th>
        <th>Vacuna</th>
        <th>Fecha</th>
      
    </tr>
    <?php
  

     require_once '../controller/CRUD.vacuna.php';
     $vacunasclass = new CRUDvacuna();     
     $vacunas = $vacunasclass->leerVacunasMascota(); 
 
     foreach ($vacunas as $vacuna) {
         echo "<tr>";
         echo "<td>" . $vacuna["nombre_mascota"] . "</td>";
         echo "<td>" . $vacuna["nombre_vacuna"] . "</td>";
         echo "<td>" . $vacuna["fecha"] . "</td>";
        echo "</tr>";
         ;
     }
    
    ?>
</table>
</div>
 