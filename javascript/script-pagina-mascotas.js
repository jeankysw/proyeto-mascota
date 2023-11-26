function eliminarMascota(btn) {
    document.getElementById('fondoOscuro').style.display = 'block';
    document.getElementById('alerta').style.display = 'block';   
}

function confirmarEliminar() {
    document.getElementById('fondoOscuro').style.display = 'none';
    document.getElementById('alerta').style.display = 'none';
   
    
}

function cerrarAlerta() {
    window.location.href = '../mascotas.php'; 

}
function mostrarFormulario() {
    document.getElementById('fondoOscuro').style.display = 'block';
    document.getElementById('formEditar').style.display = 'block';
   
}
function ocultarFormulario() {
    document.getElementById('fondoOscuro').style.display = 'none';
    document.getElementById('formEditar').style.display = 'none';
   
}

function confirmarEdicion() {
    document.getElementById('fondoOscuro').style.display = 'block';
    document.getElementById('confirmarEdicion').style.display = 'block';
    window.location.href = './mascotas.php'; 
}

function editarMascota() {
    document.getElementById('fondoOscuro').style.display = 'none';
    document.getElementById('confirmarEdicion').style.display = 'none';
    document.getElementById('formEditar').style.display = 'none';
}

function cerrarConfirmacion() {
    
    document.getElementById('confirmarEdicion').style.display = 'none';
}
setTimeout(function() {
  
    document.getElementById('fondoOscuro').style.display = 'none';
    window.location.href = '../mascotas.php'; 
   
}, 1800);
setTimeout(function() {
  
    document.getElementById('fondoOscurovac').style.display = 'none';
    window.location.href = './vacunas.php'; 
   
}, 1800);
setTimeout(function() {
    
    document.getElementById('fondoOscuroagregar').style.display = 'none';
    window.location.href = './mascotas.php'; 
}, 1800);

setTimeout(function agregar() {
   
    document.getElementById('fondoOscuro2').style.display = 'none';
    window.location.href = './mascotas.php'; 
}, 1800);


$(document).ready(function() {
    $('#cerrarSesion').on('click', function() {
        $.ajax({
            type: 'GET',
            url: 'cerrar_session.php', 
            success: function(response) {
                
                window.location.href = 'login.php';
            },
            error: function(error) {
                console.error('Error al cerrar sesión:', error);
            }
        });
    });
});
function mostrarModal() {
    document.getElementById('modal1').style.display = 'block';
    document.getElementById('overlay1').style.display = 'block';
}


function confirmaredicionmascotas() {
    document.getElementById('form_editar').style.display='none'
  
}

function cerrarModalEditar() {
    document.getElementById('modal_editar').style.display = 'none';
    window.location.href = '../mascotas.php'; 
}
function cerrasrModalEditar() {
    document.getElementById('modal_editar').style.display = 'none';
    setTimeout(function() {
        window.location.href = '../mascotas.php';
    }, 2000); // 2000 milisegundos = 2 segundos
}

