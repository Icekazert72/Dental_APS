const consultas = document.getElementById("todos_abrir_consultas"),
      panel_consulta = document.getElementById("panel_consultas"),
      diarias = document.getElementById("diarias_abrir"),
      panel_diarias = document.getElementById("panel_diarias");

      consultas.addEventListener('click', function () {
            panel_consulta.classList.add("ver");
            panel_diarias.classList.remove("ver");
      });

      diarias.addEventListener('click', function () {
            panel_diarias.classList.add("ver");
            panel_consulta.classList.remove("ver");
      });

const menu = document.getElementById("cerrarMenu");

menu.addEventListener('click', function () {
    panel_consulta.classList.remove("ver");
    panel_diarias.classList.remove("ver");
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


