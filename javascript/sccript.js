document.getElementById('toggle').addEventListener('click', function () {
    const login = document.querySelector('.login');
    const registro = document.querySelector('.registro');
    
    login.style.transform = login.style.transform === 'translateX(0)' ? 'translateX(-100%)' : 'translateX(0)';
    registro.style.transform = registro.style.transform === 'translateX(100%)' ? 'translateX(0)' : 'translateX(100%)';
});
// const botonRedirigir = document.getElementById('enviar2');


// botonRedirigir.addEventListener('click', () => {
//     // Redirige a la URL deseada
//     window.location.href = 'http://localhost/archivosphp/MASCOTAS-/index.php'; // Reemplaza 'https://www.ejemplo.com' con la URL a la que desees redirigir.
// });
const botonRedirigir2 = document.getElementById('enviar');

botonRedirigir2.addEventListener('click', () => {
    header("Location: regitro.php"); 
    exit();
});