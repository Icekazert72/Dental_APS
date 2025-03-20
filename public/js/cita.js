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
            console.log(xhr.response);

            if (xhr.responseText === 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Cita solicitada',
                    text: 'Tu cita ha sido solicitada con éxito.',
                });
                document.getElementById('citaForm').reset();
            } else if (xhr.responseText === 2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Cita solicitada',
                    text: 'regresa luego se te para ver la confirmacion',
                });
                document.getElementById('citaForm').reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al solicitar la cita. Intenta nuevamente.',
                });
                document.getElementById('citaForm').reset();
            }
        }
    };
    xhr.send(datos);
});
