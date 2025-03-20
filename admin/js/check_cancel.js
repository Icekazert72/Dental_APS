function loadCitasConfirmadas() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../admin/php/confirm_Check.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('confirmados_check');

            if (citas.length > 0) {
                var rows = '';


                citas.forEach(function (cita) {
                    rows += `
                        <tr id="cita_${cita.id_cita}">
                        <th>${cita.nombre}</th>
                        <th>${cita.fecha_hora}</th>
                        <th>${cita.motivo}</th>
                        <th style='gap: 12px;'>
                            <button type='button' class='btn' style='background-color: #65e48a;' onclick='completado(${cita.id_cita});'>
                            <i style='color:rgb(255, 255, 255);' class='fa-solid fa-check-double'></i></button>
                            <button type='button' class='btn' style='background-color: #c17d47;' onclick='retornar_pendiente(${cita.id_cita});'>
                            <i style='color:rgb(255, 255, 255);' class='fa-solid fa-pause'></i></button>
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




function completado(ID) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta cita será marcada como completada.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: '¡Sí, completar!'
    }).then((result) => {
        if (result.isConfirmed) {

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../admin/php/verPacientes/actualizar_estado.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText == 'success') {
                        Swal.fire(
                            '¡Completada!',
                            'La cita ha sido marcada como completada.',
                            'success'
                        );
                        loadCitasConfirmadas();
                    } else {
                        Swal.fire(
                            'Error',
                            'Hubo un problema al actualizar el estado de la cita.',
                            'error'
                        );
                    }
                }
            };
            xhr.send('id_cita=' + ID + '&estado=completada');
        }
    });
}




function retornar_pendiente(ID) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta cita será marcada como pendiente y se aplazará un día.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ffc107',
        cancelButtonColor: '#dc3545',
        confirmButtonText: '¡Sí, aplazar!'
    }).then((result) => {
        if (result.isConfirmed) {

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../admin/php/verPacientes/actualizar_estado.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText == 'success') {
                        Swal.fire(
                            '¡Pendiente!',
                            'La cita ha sido marcada como pendiente y aplazada un día.',
                            'success'
                        );
                        loadCitasConfirmadas();
                    } else {
                        Swal.fire(
                            'Error',
                            'Hubo un problema al actualizar el estado de la cita.',
                            'error'
                        );
                    }
                }
            };
            xhr.send('id_cita=' + ID + '&estado=pendiente');
        }
    });
}

window.onload = function () {
    loadCitasConfirmadas();
};