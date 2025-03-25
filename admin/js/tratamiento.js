function loadTodos() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../admin/php/verPacientes/loadTodos.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('todo_pacientes');

            if (citas.length > 0) {
                var rows = '';


                citas.forEach(function (patient) {
                    rows += `
                        <tr>
                            <th class="fototable"><img src="${patient.foto}" alt=""></th>
                            <th>${patient.nombre}</th>
                            <th>${patient.apellidos}</th>
                            <th>${patient.servicio}</th>
                            <th>${patient.estado}</th>
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

function loadTratados() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../admin/php/verPacientes/loadTratados.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('Completada');

            if (citas.length > 0) {
                var rows = '';


                citas.forEach(function (patient) {
                    rows += `
                        <tr>
                            <th class="fototable"><img src="${patient.foto}" alt=""></th>
                            <th>${patient.nombre}</th>
                            <th>${patient.apellidos}</th>
                            <th>${patient.servicio}</th>
                            <th>${patient.estado}</th>
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


function loadPAcientes_pendientes() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../admin/php/verPacientes/tratando.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('tratamiento_table');

            if (citas.length > 0) {
                var rows = '';

                // Obtener médicos
                var medicoXHR = new XMLHttpRequest();
                medicoXHR.open('GET', '../../admin/php/verPacientes/obtener_medicos.php', true);
                medicoXHR.onreadystatechange = function () {
                    if (medicoXHR.readyState === 4 && medicoXHR.status === 200) {
                        var medicos = JSON.parse(medicoXHR.responseText);

                        citas.forEach(function (patient) {
                            var medicoOptions = '';

                            // Generar las opciones de médicos
                            medicos.forEach(function (medico) {
                                medicoOptions += `
                                    <option value="${medico.id_medico}">${medico.nombre}</option>
                                `;
                            });

                            rows += `
                                <tr>
                                    <th class="fototable"><img src="${patient.foto}" alt=""></th>
                                    <th>${patient.nombre}</th>
                                    <th>${patient.servicio}</th>
                                    <th>${patient.motivo}</th>
                                    <th style="display:flex; gap:10px; justify-content:center; ">
                                        <form action="" method="post" id="form_Asicnacion_${patient.id_cita}">
                                            <select class="btn" name="medico_id" id="medico_select_${patient.id_cita}">
                                                <option value="#">Médico</option>
                                                ${medicoOptions}
                                            </select>
                                            <button type="submit" style="border:none;" class="btn-submit">
                                                <i style="color: green;" class="fa-solid fa-circle-check"></i>
                                            </button>
                                        </form>
                                        <button class="btn btn-primary mb-3" id="mostrarFormularioBtn" data-id-paciente="${patient.id_paciente}">H.C</button>
                                    </th>
                                </tr>
                            `;
                        });

                        tbody.innerHTML = rows;

                        // Agregar un eventListener al formulario para manejar el submit
                        citas.forEach(function (patient) {
                            var form = document.getElementById('form_Asicnacion_' + patient.id_cita);
                            form.addEventListener('submit', function (event) {
                                event.preventDefault();  
                                asignarMedico(patient.id_cita);
                            });
                        });
                        var btns = document.querySelectorAll("#mostrarFormularioBtn");
                        btns.forEach(function (btn) {
                            btn.addEventListener('click', function () {
                                var idPaciente = btn.getAttribute("data-id-paciente");
                                mostrarFormularioHistorialClinico(idPaciente);
                            });
                        });

                    }
                };
                medicoXHR.send();
            } else {
                tbody.innerHTML = `<tr><td colspan="4">No hay citas pendientes</td></tr>`;
            }
        }
    };
    xhr.send();
}

function mostrarFormularioHistorialClinico(idPaciente) {
    document.getElementById('formulario').style.display = 'block';
    document.getElementById('id_paciente').value = idPaciente;

}

document.getElementById('formHistorialClinico').addEventListener('submit', function (event) {
    event.preventDefault();

    var form = new FormData(document.getElementById('formHistorialClinico'));


    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../admin/php/verPacientes/insertar_historial.php', true);


    xhr.onload = function () {
        console.log(xhr.responseText);

        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'Historial clínico agregado correctamente.'
                });

                document.getElementById('formulario').style.display = 'none';
                document.getElementById('formHistorialClinico').reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al procesar la solicitud.'
            });
        }
    };


    xhr.send(form);
});

function asignarMedico(id_cita) {
    var medico_id = document.getElementById('medico_select_' + id_cita).value;

    if (medico_id === "#") {
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'Por favor selecciona un médico.',
            confirmButtonText: 'Cerrar'
        });
        return;
    }

    // Crear la solicitud AJAX para actualizar la cita con el ID del médico
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/verPacientes/asignar_medico.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Enviar los datos de la cita y el ID del médico
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Usar SweetAlert para mostrar el resultado
            if (xhr.responseText.includes("Cita asignada correctamente")) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: xhr.responseText,
                    confirmButtonText: 'Cerrar'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: xhr.responseText,
                    confirmButtonText: 'Cerrar'
                });
            }

            // Después de asignar el médico, actualizar la tabla de citas
            loadPAcientes_pendientes();
        }
    };

    xhr.send('id_cita=' + id_cita + '&id_medico=' + medico_id);
}

window.onload = function () {
    loadTodos();
    loadPAcientes_pendientes();
    loadTratados();
};