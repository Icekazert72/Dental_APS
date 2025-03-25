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

const solidos = document.getElementById("solidos"),
    semisolidos = document.getElementById("semisolidos"),
    liquidos = document.getElementById("liquidos"),
    gaseosos = document.getElementById("gaseosos"),
    panel_solidos = document.getElementById("panel_solidos"),
    panel_semisolidos = document.getElementById("panel_semisolidos"),
    panel_liquidos = document.getElementById("panel_liquidos"),
    panel_gaseosos = document.getElementById("panel_gaseosos");

    solidos.addEventListener('click', function () {
        panel_solidos.classList.add("ver");
        panel_semisolidos.classList.remove("ver");
        panel_gaseosos.classList.remove("ver");
        panel_liquidos.classList.remove("ver");
    });

    semisolidos.addEventListener('click', function () {
        panel_semisolidos.classList.add("ver");
        panel_solidos.classList.remove("ver");
        panel_liquidos.classList.remove("ver");
        panel_gaseosos.classList.remove("ver");
    });

    liquidos.addEventListener('click', function () {
        panel_liquidos.classList.add("ver");
        panel_solidos.classList.remove("ver");
        panel_semisolidos.classList.remove("ver");
        panel_gaseosos.classList.remove("ver");
    });
    
    gaseosos.addEventListener('click', function () {
        panel_gaseosos.classList.add("ver");
        panel_solidos.classList.remove("ver");
        panel_semisolidos.classList.remove("ver");
        panel_liquidos.classList.remove("ver");
    });

    const menu = document.getElementById("cerrarMenu");

    menu.addEventListener('click', function () {
        panel_solidos.classList.remove("ver");
        panel_semisolidos.classList.remove("ver");
        panel_liquidos.classList.remove("ver");
        panel_gaseosos.classList.remove("ver");
    });
   

    document.getElementById('farmacoForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

      
        var nombre = document.getElementById('nombre').value.trim();
        var dosis = document.getElementById('dosis').value.trim();
        var via = document.getElementById('via').value.trim();
        var forma_administracion = document.getElementById('forma_administracion').value.trim();
        var efectos_secundarios = document.getElementById('efectos_secundarios').value.trim();
        var estado_fisico = document.getElementById('estado_fisico').value.trim();
        var stock = document.getElementById('stock').value.trim();

      
        if (nombre === '' || dosis === '' || via === '' || forma_administracion === '' || efectos_secundarios === '' || estado_fisico === '' || stock === '') {
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Por favor, complete todos los campos requeridos.',
                confirmButtonText: 'Cerrar'
            });
            return;
        }

        
        var formData = new FormData(this); 

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../../admin/php/verPacientes/insertar_farmaco.php', true); 

       
        xhr.onload = function() {
            if (xhr.status === 200) {
                
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
                    text: 'Hubo un problema al registrar el fármaco.',
                    confirmButtonText: 'Cerrar'
                });
            }
        };

       
        xhr.send(formData);
    });

    function Farmaco_solidos() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../admin/php/verPacientes/obtener_solidos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.response);
                var farmaco = JSON.parse(xhr.responseText);
                var tbody = document.getElementById('farm_solidos');
    
                if (farmaco.length > 0) {
                    var rows = '';
    
    
                    farmaco.forEach(function (farmaco) {
                        rows += `
                            <tr id="cita_${farmaco.id_cita}">
                                <th>${farmaco.nombre}</th>
                                <th>${farmaco.estado_fisico}</th>
                                <th>${farmaco.via}</th>
                                <th>${farmaco.stock}</th>
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

    function Farmaco_liquidos() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../admin/php/verPacientes/obtener_liquidos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.response);
                var farmaco = JSON.parse(xhr.responseText);
                var tbody = document.getElementById('farm_liquidos');
    
                if (farmaco.length > 0) {
                    var rows = '';
    
    
                    farmaco.forEach(function (farmaco) {
                        rows += `
                            <tr id="cita_${farmaco.id_cita}">
                                <th>${farmaco.nombre}</th>
                                <th>${farmaco.estado_fisico}</th>
                                <th>${farmaco.via}</th>
                                <th>${farmaco.stock}</th>
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
    function Farmaco_semisolidos() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../admin/php/verPacientes/obtener_semisolidos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.response);
                var farmaco = JSON.parse(xhr.responseText);
                var tbody = document.getElementById('farm_semisolidos');
    
                if (farmaco.length > 0) {
                    var rows = '';
    
    
                    farmaco.forEach(function (farmaco) {
                        rows += `
                            <tr id="cita_${farmaco.id_cita}">
                                <th>${farmaco.nombre}</th>
                                <th>${farmaco.estado_fisico}</th>
                                <th>${farmaco.via}</th>
                                <th>${farmaco.stock}</th>
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
    
    function Farmaco_gaseosos() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../admin/php/verPacientes/obtener_gaseosos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.response);
                var farmaco = JSON.parse(xhr.responseText);
                var tbody = document.getElementById('farm_gaseosos');
    
                if (farmaco.length > 0) {
                    var rows = '';
    
    
                    farmaco.forEach(function (farmaco) {
                        rows += `
                            <tr id="cita_${farmaco.id_cita}">
                                <th>${farmaco.nombre}</th>
                                <th>${farmaco.estado_fisico}</th>
                                <th>${farmaco.via}</th>
                                <th>${farmaco.stock}</th>
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
        Farmaco_solidos();
        Farmaco_liquidos();
        Farmaco_semisolidos();
        Farmaco_gaseosos();
    };