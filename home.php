<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home pets</title>
    <link rel="stylesheet" href="./css/stylos-pagina-principal.css">
    <link rel="stylesheet" href="./css/stylo.logueo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <header>
            <div class="logo">Pets Lovers</div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Vacunas</a></li>
                    <li><a href="#">Control de Vacunas</a></li>
                </ul>
            </nav>
            
    <div class="contenedor_perfil">
        <div class="hover-div">
            <p>perezepiayujeancarlos@gmail.com</p>
            <div class="conten_img">
                <img src="./imagenes/Bienestar animal.jpeg" alt="">
                <div class="input-wrapper">
                    <input type="file" id="fileInput">
                    <label for="fileInput" class="file-label">
                        <img src="./imagenes/flat-style-circle-edit_icon-icons.com_66939.png" alt="">
                    </label>
                </div>
            
                <h3>hola, jean perez</h3>
            </div>
            <button class="btn-perfil">Cerrar sesion</button>
        </div>
            
              

    </div>
        </header>
    </div>
</body>



   
    <div class="contenedor_cuerpo">
 
    <table>
        <thead>
        <?php 
            
        
        
        require_once(__DIR__ ."./controller/CRUD.controller3.php");
        $readd=new cruduser();
        $leer == $readd->read();

        foreach ($leer as $leer): ?>
                <tr>
                    <td><?php echo $leer['id']; ?></td>
                    <td><?php echo $leer['username']; ?></td>
                </tr>
            <?php endforeach; ?>
        </thead>
        <tbody>  <?php 
        foreach ($leer as $leer): ?>
                <tr>
                    <td><?php echo $leer['id']; ?></td>
                    <td><?php echo $leer['username']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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


    <script src="./javascript/script-pagina-principal.js"></script>

</body>

</html>