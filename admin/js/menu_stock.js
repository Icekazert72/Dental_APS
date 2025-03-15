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
   