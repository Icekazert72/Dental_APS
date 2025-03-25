document.getElementById("cerrarSesionBtn").addEventListener("click", function() {
    document.getElementById("loadingSpinner").style.display = "block";
    cerrarSesion();
});

function cerrarSesion() {
   console.log('funciona serrar session');
   
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './php/cerrar_sesion_admin.php', true); 
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                setTimeout(function () {
                    document.getElementById("loadingSpinner").style.display = "none";
                    window.location.href = "../../../Dental_APS/index.php"; 
                }, 7000);
            } else {
                alert('Hubo un problema al cerrar sesión.');
            }
        }
    };
    xhr.send();  
}