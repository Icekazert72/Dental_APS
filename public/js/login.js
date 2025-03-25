var btnCrear = document.getElementById('btnCrear');
var btnNoCrear = document.getElementById('btnNoCrear');
var btnLectura = document.getElementById('btnLectura');
var btnNoCondicion = document.getElementById('btnNoCondicion');
var contentFormLog = document.getElementById('fomularioLogin');
var formularioCrear = document.getElementById('formularioCrear');
var condiciones = document.getElementById('masInforma');

btnCrear.addEventListener('click', function () {
    contentFormLog.style.display = "none";
    formularioCrear.style.display = "block";
    console.log('boton funciona');
});
btnNoCrear.addEventListener('click', function () {
    contentFormLog.style.display = "block";
    formularioCrear.style.display = "none";
    console.log('boton funciona');
});
btnLectura.addEventListener('click', function () {
    formularioCrear.style.display = "none";
    condiciones.style.display = "block";
    formularioCrear.style.display = "none";
    console.log('boton funciona');
});
btnNoCondicion.addEventListener('click', function () {
    formularioCrear.style.display = "block";
    condiciones.style.display = "none";
    console.log('boton funciona');
});


document.getElementById('crearCuenta').addEventListener('submit', function (e) {
    e.preventDefault(); 

    
    var checkBox = document.getElementById('exampleCheck1');

    
    if (!checkBox.checked) {
        alert("Debes leer y aceptar los criterios de inscripción antes de continuar.");
        return;  
    }

    
    var formData = new FormData(document.getElementById('crearCuenta'));

    var xhr = new XMLHttpRequest();

    
    xhr.open('POST', './php/crearCuenta.php', true);

   
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); 
            alert(xhr.responseText);  
        }
    };

    
    xhr.send(formData);
});


document.getElementById('formLog').addEventListener('submit', function(e) {
    e.preventDefault();  

    
    var email = document.getElementById('LogEmail').value;
    var telefono = document.getElementById('LogTelefono').value;

   
    if (email === "" || telefono === "") {
        Swal.fire({
            title: 'Error',
            text: 'Por favor, ingrese ambos campos de correo y teléfono.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        return;
    }

    
    document.getElementById('loadingSpinner_ini').style.display = 'flex';

   
    var formData = new FormData();
    formData.append('LogEmail', email);
    formData.append('LogTelefono', telefono);

   
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './php/loguear.php', true);

    xhr.onload = function() {
        document.getElementById('loadingSpinner_ini').style.display = 'none';  

        if (xhr.status == 200) {
           
            var response = xhr.responseText.trim();
            
            if (response === "success") {
                
                setTimeout(function() {
                    window.location.href = "./index.php";  
                }, 3000);
            } else if (response.includes("Paciente")) {
                
                setTimeout(function() {
                    window.location.href = "./index.php";  
                }, 3000);
            } else if (response.includes("Usuario")) {
               
                setTimeout(function() {
                    var tipoUsuario = response.split(':')[1].trim(); 
                    switch (tipoUsuario) {
                        case 'admin':
                            window.location.href = "../../../Dental_APS/admin/index.php"; 
                            break;
                        case 'medico':
                            window.location.href = "../../../Dental_APS/admin/dashboard_Medico/index.php"; 
                            break;
                        case 'enfermera':
                            window.location.href = "../../../Dental_APS/admin/index.php"; 
                            break;
                        case 'otro':
                            window.location.href = "../../../Dental_APS/admin/index.php"; 
                            break;
                        default:
                            window.location.href = "./login.php";  
                    }
                }, 3000);
            } else {
                
                Swal.fire({
                    title: 'Error',
                    text: response, 
                    backdrop: false,
                    position: 'center',
                    icon: 'error',
                    confirmButtonText: 'Intentar de nuevo'
                });
            }
        } else {
            
            Swal.fire({
                title: 'Error',
                text: 'Ocurrió un error, intentalo de nuevo.',
                backdrop: false,
                position: 'center',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    };


    xhr.send(formData);
});




