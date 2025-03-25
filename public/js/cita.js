document.getElementById('citaForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Previene el envío tradicional del formulario

    // Obtener los valores de los campos
    const fecha = document.getElementById('fecha').value;
    const motivo = document.getElementById('motivo').value;
    const servicio = document.getElementById('servicio').value;
    const id = document.getElementById('id').value;

    // Validación de campos
    if (fecha === "" || motivo === "" || servicio === "" || id === "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos deben ser completos.',
        });
        return;
    }

    // Crear el objeto de datos para enviar al servidor
    const datos = new FormData();
    datos.append('fecha', fecha);
    datos.append('motivo', motivo);
    datos.append('servicio', servicio);
    datos.append('id', id);

    // Crear la solicitud AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './php/solicitar_cita.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Verificar si la solicitud fue exitosa (según el código de respuesta del servidor)
            const response = JSON.parse(xhr.responseText);

            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Cita solicitada',
                    backdrop: false,
                    text: 'Tu cita ha sido solicitada con éxito.',
                });
                document.getElementById('citaForm').reset();
                loadCitas();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    backdrop: false,
                    text: response.message || 'Hubo un problema al solicitar la cita. Intenta nuevamente.',
                });
                document.getElementById('citaForm').reset();
            }
        }
    };
    xhr.send(datos);
});

document.getElementById("cerrarSesionBtn").addEventListener("click", function() {
    document.getElementById("loadingSpinner").style.display = "block";
    cerrarSesion();
});

function cerrarSesion() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './php/cerrar_sesion.php', true); 
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                setTimeout(function () {
                    document.getElementById("loadingSpinner").style.display = "none";
                    window.location.href = "../index.php"; 
                }, 7000);
            } else {
                alert('Hubo un problema al cerrar sesión.');
            }
        }
    };
    xhr.send();  
}

function loadHistorial() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', './php/obtener_historial.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var Historial = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('historial');

            if (Historial.length > 0) {
                var rows = '';

                Historial.forEach(function (historial) {
                    rows += `
                        <tr">
                            <td>${historial.fecha_hora}</td>
                            <td>${historial.diagnostico}</td>
                            <td>${historial.tratamiento}</td>
                            <td>${historial.notas}</td>
                        </tr>
                    `;
                });

                tbody.innerHTML = rows;
            } else {
                tbody.innerHTML = `<tr><td colspan="4">No hay Historial Medico</td></tr>`;
            }
        }
    };
    xhr.send();
}

function loadCitas() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', './php/obtener_citas.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('mis_citas');

            if (citas.length > 0) {
                var rows = '';

                citas.forEach(function (cita) {
                    var estado = cita.estado ? cita.estado.toLowerCase() : 'desconocido';
                    rows += `
                        <tr>
                            <td>${cita.fecha_hora}</td>
                            <td>${cita.motivo}</td>
                            <td class="estado estado-${estado}">${cita.estado}</td>
                            <td>${cita.servicio}</td>
                            <td><button class="btn btn-warning btn-accion">Cancelar</button></td>
                        </tr>
                    `;
                });

                tbody.innerHTML = rows;
            } else {
                tbody.innerHTML = `<tr><td colspan="6">No hay citas</td></tr>`;
            }
        }
    };
    xhr.send();
}

window.onload = function () {
    loadHistorial();
    loadCitas(); // Llamada para cargar las citas del paciente
}