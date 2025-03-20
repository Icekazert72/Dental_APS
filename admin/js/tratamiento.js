
document.addEventListener("DOMContentLoaded", function() {
    // Función tratamiento() que maneja la solicitud y actualización de la tabla
    function tratamiento() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../../admin/php/verPacientes/tratando.php", true); // Ajusta la URL si es necesario
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onload = function() {
            if (xhr.status === 200) {
                var patients = JSON.parse(xhr.response);
                var tbody = document.getElementById("tratamiento");

                // Limpiar el tbody antes de insertar nuevas filas
                tbody.innerHTML = '';

                // Crear una cadena vacía para la nueva estructura HTML
                var newRows = '';

                // Recorrer los pacientes y construir el contenido HTML
                patients.forEach(function(patient) {
                    newRows += `
                        <tr>
                            <td class="fototable"><img src="${patient.foto}" alt="Foto de ${patient.nombre}"></td>
                            <td>${patient.nombre}</td>
                            <td>${patient.apellido}</td>
                            <td>${patient.servicio}</td>
                            <td>${patient.estado}</td>
                        </tr>
                    `;
                });

                // Insertar el nuevo contenido HTML en el tbody
                tbody.innerHTML = newRows;
            }
        };

        xhr.onerror = function() {
            console.error("Error en la solicitud");
        };

        xhr.send();
    }

    // Llamada inicial a la función tratamiento para cargar los pacientes cuando la página esté lista
    tratamiento();
});
