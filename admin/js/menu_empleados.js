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
