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
    <title>Registrar Razas</title>
    <link rel="stylesheet" href="../css/stylos-pagina-principal.css">
    <link rel="stylesheet" href="../css/stylo.logueo.css">
    <link rel="stylesheet" href="./css/stylos-raza.css">
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
                    <li><a href="vacunas.php">Vacunas</a></li>
                    <li><a href="mascotas.php">mascotas</a></li>
                    <li><a href="registrar-razas">Razas</a></li>
                </ul>
            </nav>
            
        <div onclick="togglePerfilMostrar()"   
        class="contenedor_perfil">
        <?php ?>
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
            <h3 class="name" ><?php echo" $nombre " ?></h3>
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
   
<div class="contenedor_cuerpo-mascotas raza">
    <div class="conten-igual">
<h2>Registrar Nueva Raza</h2>
<form method="post" action="">
<label for="animales">Seleccione una Mascota:</label>
        <select id="animales" name="animal" class="styled-select">
            <?php
            $databaseConnection = new DatabaseConnection();
            $conn = $databaseConnection->getConnection();
            $query = "SELECT * FROM TipoMascota";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }
            }
            ?>
        </select>
        <label for="nombre_raza"><i class="fas fa-paw"></i> Nombre de la Raza:</label>
        <input required type="text" id="nombre_raza" name="nombre_raza"><br><br>
        <input type="submit" name="registrar_raza" value="Registrar Raza">
    </form>
</div>
<div class="conten-igual">

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar_raza'])) {
                
                $nombreRaza = $_POST['nombre_raza'];
                $id= $_POST['animal'];
                $nombreRaza = $_POST['nombre_raza'];

                $sql = "INSERT INTO Raza (nombre,TipoMascota_id) VALUES ('$nombreRaza','$id')";
                $resultt=$conn->query($sql);
                if ($resultt) {
     
                }
} 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cantidad de Mascotas por Raza</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            overflow-y: auto;
            height: 350px;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Cantidad de Mascotas por Raza</h2>
    <table>
        <thead>
            <tr>
                <th>Raza</th>
                <th>Cantidad de Mascotas</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT Raza.nombre AS nombre_raza, COUNT(Mascota.id) AS cantidad_mascotas 
            FROM Raza LEFT JOIN Mascota ON Raza.id = Mascota.Raza_id 
            GROUP BY Raza.nombre";
    
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre_raza"] . "</td>";
                    echo "<td>" . $row["cantidad_mascotas"] . "</td>";
                    echo "</tr>";
                }
            } 
        
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>

<?php
?>





</div>

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
<script src="./javascript/script-pagina-mascotas.js"></script>
<script src="./javascript/script-pagina-principal.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>