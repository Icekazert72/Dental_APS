const confirmadas = document.getElementById("confirmacion_abrir"),
    panel_confirmadas = document.getElementById("panel_confirmadas"),
    panel_citas = document.getElementById("panel_citas"),
    citas = document.getElementById("todos_abrir_citas"),
    pendientes = document.getElementById("pendientes_abrir"),
    panel_pendientes = document.getElementById("panel_pendientes"),
    menu = document.getElementById("cerrarMenu"),
    panel_todas = document.getElementById("panel_todas");

confirmadas.addEventListener('click', function () {
    panel_confirmadas.classList.add("ver");
    panel_citas.classList.remove("ver");
    panel_pendientes.classList.remove("ver");
    panel_todas.classList.add("ocultar");
    console.log('confirmadas');
    
});

citas.addEventListener('click', function () {
    panel_citas.classList.add("ver");
    panel_pendientes.classList.remove("ver");
    panel_confirmadas.classList.remove("ver");
    panel_todas.classList.add("ocultar");
    console.log('citas');
});

pendientes.addEventListener('click', function () {
    panel_pendientes.classList.add("ver");
    panel_confirmadas.classList.remove("ver");
    panel_citas.classList.remove("ver");
    panel_todas.classList.add("ocultar");
    console.log('pendientes');
});

menu.addEventListener('click', function () {
    panel_pendientes.classList.remove("ver");
    panel_confirmadas.classList.remove("ver");
    panel_citas.classList.remove("ver");
    panel_todas.classList.remove("ocultar");
    console.log('menu');
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