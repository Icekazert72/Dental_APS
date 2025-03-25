
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
function loadCitas() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', './php/verPacientes/obtener_citas.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('citas_recientes');

            if (citas.length > 0) {
                var rows = '';


                citas.forEach(function (cita) {
                    rows += `
                        <tr id="cita_${cita.id_cita}">
                            <th>${cita.nombre}</th>
                            <th>${cita.fecha_hora}</th>
                            <th>${cita.motivo}</th>
                            <th style="gap: 10px;">
                                <div class="btn btn-success" style="z-index: 1; color: orange; background-color: aquamarine;" onclick="confirmar(${cita.id_cita})">
                                    <i style="color: white;" class="fa-solid fa-check"></i>
                                </div>
                                <div class="btn" style="z-index: 1; color: white; background-color: red;" onclick="eliminar(${cita.id_cita})">
                                    <i style="color: white;" class="fa-solid fa-xmark"></i>
                                </div>
                            </th>
                        </tr>
                    `;
                });


                tbody.innerHTML = rows;
            } else {

                tbody.innerHTML = `<tr><td colspan="4">No hay citas pendientes</td></tr>`;
            }
        }
    };
    xhr.send();
}
function confirmar(id_cita) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './php/verPacientes/update_cita.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = xhr.responseText;
            if (respuesta.indexOf("Cita actualizada correctamente") !== -1) {

                document.getElementById("cita_" + id_cita).querySelector("th:nth-child(4)").innerHTML = "Confirmada";


                Swal.fire({
                    icon: 'success',
                    title: 'Cita Confirmada',
                    text: 'La cita ha sido confirmada correctamente.',
                    confirmButtonText: 'Aceptar'
                });
                setInterval(function () {
                    loadCitas();
                }, 10000);
            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error al confirmar la cita.',
                    confirmButtonText: 'Intentar nuevamente'
                });
                setInterval(function () {
                    loadCitas();
                }, 10000);
            }
        }
    };
    xhr.send("id_cita=" + id_cita + "&estado=Confirmada");
}


function eliminar(id_cita) {
    // let inputOM = document.getElementById('jhhhh').value= id_cita;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './php/verPacientes/update_cita.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = xhr.responseText;
            if (respuesta.indexOf("Cita actualizada correctamente") !== -1) {

                document.getElementById("cita_" + id_cita).querySelector("th:nth-child(4)").innerHTML = "Cancelada";


                Swal.fire({
                    icon: 'warning',
                    title: 'Cita Cancelada',
                    text: 'La cita ha sido cancelada correctamente.',
                    confirmButtonText: 'Aceptar'
                });
                setInterval(function () {
                    loadCitas();
                }, 10000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error al cancelar la cita.',
                    confirmButtonText: 'Intentar nuevamente'
                });
                setInterval(function () {
                    loadCitas();
                }, 10000);
            }
        }
    };
    xhr.send("id_cita=" + id_cita + "&estado=Cancelada");
}

window.onload = function () {
    obtenerUsuariosRecientes();
    loadCitas();
};

