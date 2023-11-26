
const botonIngresar = document.getElementById('redirigir');
botonIngresar.addEventListener('click', () => {
    
});
const botonIngresa2 = document.getElementById('confirmarEliminar1');
botonIngresar.addEventListener('click', () => {
    window.location.href ='../mascotas.php';
});

const botoniniciarsesion = document.getElementById('registrar');
botoniniciarsesion.addEventListener('click', () => {
    window.location.href = 'login.php'; 
});
const botonregistrar = document.getElementById('login');
botonregistrar.addEventListener('click', () => {
    window.location.href = 'regitro.php'; 
});
const apareceform = document.getElementById('form');
const actualizar = document.getElementById('actualizar');

actualizar.addEventListener('click', () => {
    apareceform.style.display = 'block';
});
function mostrarFormularioimg() {
    var modal = document.getElementById('modal');
    modal.style.display = 'block';
  }
 
  function cerrarModal(event) {
    var modal = document.getElementById('modal');
    if (event.target == modal || event.target.classList.contains('cerrar')) {
      modal.style.display = 'none';
    } else if (event.target.closest('.form-img')) {
      return;
    }

  }
  function perfilmostrar() {
    var perfil = document.getElementById('perfil-mostrar');
    perfil.style.display = 'block';
    if (perfil.style.display == 'block')
    {
      perfil.style.display = 'none';
    }
    else{perfil.style.display == 'block'
  }
  }

  function cerrarperfil() {
       perfil.style.display = 'none';
    }

    function mostrarImagen(event) {
        const archivo = event.target.files[0];
        const vistaPrevia = document.getElementById('vista-previa');
    
        if (archivo) {
            const lector = new FileReader();
    
            lector.onload = function(event) {
                vistaPrevia.style.display = 'block';
                vistaPrevia.src = event.target.result;
            }
    
            lector.readAsDataURL(archivo);
        } 
    }
