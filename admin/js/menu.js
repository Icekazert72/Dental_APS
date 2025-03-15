
const cerrarMenu = document.getElementById("cerrarMenu");
const tratamiento = document.getElementById("tratamiento_abrir");
const panel_tratamiento = document.getElementById("panel_tratamiento");
const todos = document.getElementById("todos_abrir"),
      panel_todos = document.getElementById("panel_todos");

const tratado = document.getElementById("tratado_abrir");
const panel_tratado = document.getElementById("panel_tratado");

tratado.addEventListener('click', function () {
      panel_tratado.classList.add("ver");
      panel_tratamiento.classList.remove("ver");
      panel_todos.classList.remove("ver");
});

todos.addEventListener('click', function () {
      panel_todos.classList.add("ver");
      panel_tratamiento.classList.remove("ver");
      panel_tratado.classList.remove("ver");
});

cerrarMenu.addEventListener('click', function () {
      panel_todos.classList.remove("ver");
      panel_tratamiento.classList.remove("ver");
      panel_tratado.classList.remove("ver");
});

tratamiento.addEventListener('click', function () {
      panel_tratamiento.classList.add("ver");
      panel_tratado.classList.remove("ver");
      panel_todos.classList.remove("ver");
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

