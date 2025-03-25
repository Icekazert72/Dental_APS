const todos_empleados = document.getElementById("todos_abrir"),
    panel_empleados = document.getElementById("panel_todos"),
    doctores = document.getElementById("doctores_abrir"),
    panel_doctores = document.getElementById("panel_doctores"),
    enferm = document.getElementById("enfermeros_abrir"),
    panel_enferm = document.getElementById("panel_enferm"),
    menu = document.getElementById("cerrarMenu");

todos_empleados.addEventListener('click', function () {
    panel_empleados.classList.add("ver");
    panel_doctores.classList.remove("ver");
    panel_enferm.classList.remove("ver");
});

doctores.addEventListener('click', function () {
    panel_doctores.classList.add("ver");
    panel_empleados.classList.remove("ver");
    panel_enferm.classList.remove("ver");
});

enferm.addEventListener('click', function () {
    panel_enferm.classList.add("ver");
    panel_empleados.classList.remove("ver");
    panel_doctores.classList.remove("ver");
});

menu.addEventListener('click', function () {
    panel_empleados.classList.remove("ver");
    panel_doctores.classList.remove("ver");
    panel_enferm.classList.remove("ver");
});

const boton_tema_oscuro = document.getElementById("boton-tema-oscuro"),
boton_tema_normal = document.getElementById("boton-tema-normal"),
fondo = document.getElementById("tema");

boton_tema_oscuro.addEventListener('click', function () {
    fondo.classList.add("oscuro");
    boton_tema_oscuro.classList.add("x");
    boton_tema_normal.classList.add("v");
});

boton_tema_normal.addEventListener('click', function () {
    fondo.classList.remove("oscuro");
    boton_tema_oscuro.classList.remove("x");
    boton_tema_normal.classList.remove("v");
});


function enviarFormulario(event) {
    event.preventDefault(); 

    var form = document.getElementById('registroForm');
    var formData = new FormData(form); 

    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../admin/php/verPacientes/registrar_usuario.php", true); 

    xhr.onload = function () {
        if (xhr.status === 200) {
           
            var respuesta = xhr.responseText;

            if (respuesta.includes("registrado correctamente")) {
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: respuesta,
                    confirmButtonText: 'Cerrar'
                });
                console.log(xhr.response);
                document.getElementById('registroForm').reset();
            } else {
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: respuesta,
                    confirmButtonText: 'Cerrar'
                });
                console.log(xhr.response);
                document.getElementById('registroForm').reset();
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: "Hubo un problema al registrar el usuario.",
                confirmButtonText: 'Cerrar'
            });
            console.log(xhr.response);
        }
    };

    xhr.send(formData); 

    console.log('funcion enviar funciiona');
    

}

document.getElementById('registroForm').addEventListener('submit', enviarFormulario);


function loadUsuarios() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../admin/php/verPacientes/loadUsuarios.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('todos_usuarios');

            if (citas.length > 0) {
                var rows = '';


                citas.forEach(function (usuarios) {
                    rows += `
                        <tr id="cita_${usuarios.id_usuario}">
                            <th>${usuarios.email}</th>
                            <th>${usuarios.nombre}</th>
                            <th>${usuarios.apellidos}</th>
                            <th>${usuarios.tipo_usuario}</th>
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
function usuarioMEdico() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../admin/php/verPacientes/usuarioMEdico.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('medicos');

            if (citas.length > 0) {
                var rows = '';


                citas.forEach(function (usuarios) {
                    rows += `
                        <tr id="cita_${usuarios.id_usuario}">
                            <th>${usuarios.email}</th>
                            <th>${usuarios.nombre}</th>
                            <th>${usuarios.apellidos}</th>
                            <th>${usuarios.tipo_usuario}</th>
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
function usuarioEnfermera() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../admin/php/verPacientes/usuarioEnfermera.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            var citas = JSON.parse(xhr.responseText);
            var tbody = document.getElementById('enfermera');

            if (citas.length > 0) {
                var rows = '';


                citas.forEach(function (usuarios) {
                    rows += `
                        <tr id="cita_${usuarios.id_usuario}">
                            <th>${usuarios.email}</th>
                            <th>${usuarios.nombre}</th>
                            <th>${usuarios.apellidos}</th>
                            <th>${usuarios.tipo_usuario}</th>
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


window.onload = function () {
    loadUsuarios();
    usuarioMEdico();
    usuarioEnfermera();
};