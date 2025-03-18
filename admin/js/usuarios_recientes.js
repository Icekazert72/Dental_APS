
function obtenerUsuariosRecientes() {
    
    var xhr = new XMLHttpRequest();

    
    xhr.open('GET', './php/obtener_usuarios.php?tiempo=24', true); 

    
    xhr.onload = function () {
        if (xhr.status === 200) {
            
            document.getElementById('usuarios_recientes').innerHTML = xhr.responseText;
        } else {
            
            alert('Error al cargar los usuarios.');
        }
    };

    
    xhr.onerror = function () {
        alert('Error de conexión con el servidor.');
    };
    
    xhr.send();
}
window.onload = function () {
    obtenerUsuariosRecientes();
};