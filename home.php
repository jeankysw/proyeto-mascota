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
    <title>Home pets</title>
    <link rel="stylesheet" href="./css/stylos-pagina-principal.css">
    <link rel="stylesheet" href="./css/stylo.logueo.css">
    <link rel="stylesheet" href="./css/stylocsseditar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <header>
            <div class="logo">Pets Lovers</div>
            <nav>
                <ul>
                <li><a href="home.php">Home</a></li>
                    <li><a href="vacunas.php{">vacunas</a></li>
                    <li><a href="mascotas.php">mascotas</a></li>
                    <li><a href="registrar-razas">Razas</a></li>
                </ul>
            </nav>
            
 <div onclick="togglePerfilMostrar()"   class="contenedor_perfil">
    <div  id="perfil-mostrar" class="hover-div oculto">
        <span class="cerrar" onclick="cerrarperfil()">&times;</span>
        <?php
         require_once __DIR__. "../vendor/autoload.php";
         use Dotenv\Dotenv;
         $dotenv = Dotenv::createImmutable(__DIR__);
         $dotenv->load();
        ?>
        
    <div style="margin-bottom: 25px;" class="conten_img">
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
      
    <h3 class="name"  ><?php echo" $nombre " ?></h3>
    <div class="conten_btn"><button class="Edita-img" onclick="mostrarFormularioimg()">Editar</button>         <!-- codigo php -->
    <form action="./process/cerrar-session.php" method="post">
    <button type="submit" class="btn-perfil" name="cerrarSesion">Cerrar sesión</button>
</form>
    </div>
    </div>
               
            </div>
        </div>
    </header>
</div>
   
<div class="contenedor_cuerpo">
    <?php   
    $dbConnection = new DatabaseConnection();
    $conn = $dbConnection->getConnection();
    $users=new cruduser();
    $leer=$users->read();

    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>usuario</th>
            <th>Correo electrónico</th>
            <th>Contraseña </th>
            <th>Role</th>        
            <!-- Agrega más columnas según tu esquema de base de datos -->
        </tr>";
                     
    foreach ($leer as $fila) {
            echo "<tr>
                    
            <td>" . $fila["id"] .  "</td>
            <td>" . $fila["nombre"] . "</td>
            <td>" . $fila["username"] . "</td>
            <td>" . $fila["email"] . "</td>
            <td>" . $fila["password"] . "</td>
            <td>" . $fila["Role_id"] . " </td>
            <td><button type='submit id='actualizar' name='actualizar'> editar</button></td>
            <td><button name='eliminar'> <a href='./process/actualizar.php'>eliminaer</button></td>
            </tr>";
                }
            echo "</table>";
?>


<?php 

 require_once(__DIR__ ."./process/agregar_imagen.php");
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";
                        
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
            </form>            
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
<script src="./javascript/script-pagina-principal.js"></script>
<script src="./javascript/script-pagina-mascotas.js"></script>

</html>