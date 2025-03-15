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

const reciente = document.getElementById("recientes"),
    c_recientes = document.getElementById("C_recientes"),
    recetado = document.getElementById("recetado"),
    panel_recientes = document.getElementById("panel_reciente"),
    panel_c_reciente = document.getElementById("panel_c_reciente"),
    panel_recetado = document.getElementById("panel_recetado");

reciente.addEventListener('click', function () {
    panel_recientes.classList.add("ver");
    panel_c_reciente.classList.remove("ver");
    panel_recetado.classList.remove("ver");
});

c_recientes.addEventListener('click', function () {
    panel_c_reciente.classList.add("ver");
    panel_recientes.classList.remove("ver");
    panel_recetado.classList.remove("ver");
});

recetado.addEventListener('click', function () {
    panel_recetado.classList.add("ver");
    panel_recientes.classList.remove("ver");
    panel_c_reciente.classList.remove("ver");
});

const menu = document.getElementById("boton-tema");

menu.addEventListener('click', function () {
    panel_recientes.classList.remove("ver");
    panel_c_reciente.classList.remove("ver");
    panel_recetado.classList.remove("ver");
});