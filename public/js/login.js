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
    e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

    
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
    
  
    var formData = new FormData();
    formData.append('LogEmail', email);
    formData.append('LogTelefono', telefono);

    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './php/loguear.php', true);

   
    xhr.onload = function() {
        if (xhr.status == 200) {
          
            if (xhr.responseText === "success") {
                alert("¡Bienvenido!");
                window.location.href = "./index.php";  
            } else {

                alert("Correo o teléfono incorrectos.");
                console.log(xhr.response);
                
            }
        } else {
            alert("Ocurrió un error, intentalo de nuevo.");
        }
    };
    xhr.send(formData);
});
