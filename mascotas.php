<?php session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: no_session.php"); 
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-BcW7HqEA6LBKav5wZpoy0sH0JU6Aw2SAOlY8H0zeAdU0KwJLdIHsUT+1ZaXPF+c56BS0K5d5o5pPaLCEsAWTmA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/stylos-pagina-principal.css">
    <link rel="stylesheet" href="../css/stylo.logueo.css">
    <link rel="stylesheet" href="../css/stylocsseditar.css">
    <link rel="stylesheet" href="../css/stylos-mascotas.css">
    <link rel="stylesheet" href="./css/stylos-pagina-principal.css">
    <link rel="stylesheet" href="./css/stylo.logueo.css">
    <link rel="stylesheet" href="./css/stylocsseditar.css">
    <link rel="stylesheet" href="./css/stylos-mascotas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <header>
            <div class="logo">Pets Lovers</div>
            <nav>
                <ul>
                  <li><a href="home.php">Home</a></li>
                    <li><a href="vacunas.php">Vacuna</a></li>
                    <li><a href="mascotas.php">mascotas</a></li>
                    <li><a href="registrar-razas">Razas</a></li>
                </ul>
            </nav>
            
 <div onclick="togglePerfilMostrar()"   class="contenedor_perfil">
    <img src="" alt="PERFIL">
    <div  id="perfil-mostrar" class="hover-div oculto">
        
        <span class="cerrar" onclick="cerrarperfil()">&times;</span>
        <?php
         require_once __DIR__. "../vendor/autoload.php";
         use Dotenv\Dotenv;
         $dotenv = Dotenv::createImmutable(__DIR__);
         $dotenv->load();
        ?>
        
    <div  style="margin-bottom: 25px;"  class="conten_img">
               <?php 
                
                require_once( "texto.php");
                if (isset($_SESSION['usuario'])) {
                    $nombreUsuario = $_SESSION['usuario'];
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "mydb";
                    $conn = new mysqli($servername, $username, $password, $database);

                    $sql = "SELECT nombre, email FROM user WHERE username = '$nombreUsuario'";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nombre = $row['nombre'];
                        $correo = $row['email'];
                       
                    } 
                    $conn->close();
                } 
                ?>               
                     
    </div>
    <h3 class="name"><?php echo" $nombre " ?></h3>
    <div class="conten_btn">
        
    <button class="Edita-img" onclick="mostrarFormularioimg()">Editar</button>         
   <form action="./process/cerrar-session.php" method="post">
    <button type="submit" class="btn-perfil" name="cerrarSesion">Cerrar sesión</button>
</form>
    </div>
    </div>
               
            </div>
        </div>
    </header>
</div>
   
<div class="contenedor_cuerpo-mascotas">
<h1 style="text-align:center;" >mascotas</h1>
<div class="conte-medio">
<?php
        require_once(__DIR__."./controller/crud-mascotas.php");
        $mascota = new MascotaCRUD($conexion);

        $mascotas = $mascota->obtenerMascotas($conexion);
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>usuario</th>
                    <th>tipo de mascotas</th>
                    <th>raza</th>
                    <th class="centrar" >Vacuna</th>
                    <th class="centrar">Editar</th>
                    <th class="centrar">Eliminar</th>
                </tr>
        
    <?php foreach ($mascotas as $mascota) : ?>
    
                <tr>
                <td><?php echo $mascota['id']; ?></td>
                    <td><?php echo $mascota['nombre']; ?></td>
                    <td><?php echo $mascota['FechaNacimiento']; ?></td>
                    <td><?php echo $mascota['nombre_usuario']; ?></td>
                    <td><?php echo $mascota['tipo_mascota']; ?></td>
                    <td><?php echo $mascota['nombre_raza']; ?></td>
                    <td class="centrar"><a onclick="modaleditar()"  href="./process/vacunar-mascotas.php?id=<?php echo $mascota['id']; ?>"><i class="fas fa-syringe icono"></i></a></td>
                    <td class="centrar"><a onclick="modaleditar()"  href="./process/actualizar-mascotas.php?id=<?php echo $mascota['id']; ?>"><i class="fas fa-edit"></i></a></td>
                    <td class="centrar"><a href="./process/eliminar-mascota.php?id=<?php echo $mascota['id']; ?>" > <i class="fas fa-trash-alt" ></i></a></td>
                </tr> 
    <?php endforeach; ?>
    
        </table>
    </div>
    <button onclick="mostrarFormulario1()" class="btn-agregar"><i class="fas fa-plus"></i> Agregar</button>
 
    <a href="./process/historial-vacuna.php"><button type="submit" onclick="mostrarFormular1()" name="vacuna" class="btn-vacuna"><i class="fas fa-book"></i> Historial</button></a>
   
    <?php 
            
    ?>


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
            <button type="submit" onclick="agregar()" name="agregarMascota" class="btn-guardar"><i class="fas fa-save"></i> Guardar</button>
            <button type="button" class="btn-cancelar" onclick="ocultarModal1()"><i class="fas fa-times"></i> Cancelar</button>
        </form>
    </div> 
</div>                    
</div>
        <?php
                        
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



    <?php
        require_once(__DIR__ ."./process/agregar_imagen.php");            
            $handler = new Agregar_imagen();
                        
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])) {
                $userId = 1;
                $mensaje = $handler->uploadAndLinkImage($userId, $_FILES['imagen']);
                echo $mensaje;
                } 
            else {
                echo'              
                <div id="modal" class="modal">
                    <form class="form-img"  method="POST" id="form" enctype="multipart/form-data">   
                    <span class="cerrar" onclick="cerrarModal(event)">&times;</span>
                
                    <div class="input-wrapper">
                        <div class="conten_img2">'
                        ?>
                        <?php
                            require_once( "texto.php");
                            echo "<img id='vista-previa' src='$rutaImagen' alt='Imagen de perfil'>";
                        ?>

                        <?php    echo'<input type="file"  onchange="mostrarImagen(event)" name="imagen" accept="image/*" id="fileInput">
                            <label for="fileInput" class="file-label">
                                <img class="enlas" src="./imagenes/flat-style-circle-edit_icon-icons.com_66939.png" alt="">
                            </label>
                        <button class="btn-enviar-img" name="enviar" type="submit">Enviar</button>
                    </div> 
                </div> 
            </form>
        </div> ';
        } 
        ?>     
  </div> 
</div> 
</div>

    <footer>
        <div class="contenedor-piedepagina">
            <div class="row2">
                <div class="col-md-6">
                    <h3>Contacto</h3>
                    <p>Dirección: 123 Calle de las Mascotas</p>
                    <p>Teléfono: (123) 456-7890</p>
                    <p>Email: info@vacupets.com</p>
                </div>
                <div class="col-md-6">
                    <h3>Contacto</h3>
                    <p>Dirección: 123 Calle de las Mascotas</p>
                    <p>Teléfono: (123) 456-7890</p>
                    <p>Email: info@vacupets.com</p>
                </div>
                
                <div class="col-md-7">
                    <h3>Síguenos en Redes Sociales</h3>
                    <ul class="social-icons">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


   
</body>
<script src="./javascript/script-pagina-mascotas.js"></script>
<script src="./javascript/script-pagina-principal.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>