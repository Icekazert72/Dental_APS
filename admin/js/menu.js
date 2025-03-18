
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

document.getElementById('formCrearPaciente').addEventListener('submit', function (e) {
      e.preventDefault(); // Prevenir el envío del formulario
  
      // Crear un objeto FormData y agregar los datos del formulario
      var formData = new FormData(document.getElementById('formCrearPaciente'));
  
      // Crear un nuevo objeto XMLHttpRequest
      var xhr = new XMLHttpRequest();
      
      // Configurar la solicitud POST
      xhr.open('POST', 'NuevoPaciente.php', true);
  
      // Configurar la respuesta de la solicitud
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Manejar la respuesta del servidor
              console.log(xhr.responseText); // Imprimir la respuesta del servidor
              alert(xhr.responseText); // Mostrar la respuesta al usuario (opcional)
          }
      };
  
      // Enviar la solicitud con los datos del formulario (incluyendo la imagen)
      xhr.send(formData);
  });


  
function obtenerUsuariosRecientes() {
    
      var xhr = new XMLHttpRequest();
  
      
      xhr.open('GET', './verPacientes/pacientes.php', true); 
  
      
      xhr.onload = function () {
          if (xhr.status === 200) {
              document.getElementById('todo_pacientes').innerHTML = xhr.responseText;
              
              console.log(xhr.response);
              
          } else {
              
              alert('Error al cargar los usuarios.');
          }
      };
      
      xhr.onerror = function () {
          alert('Error de conexión con el servidor.');
      };
  
      
      xhr.send();
  }

  window.onload = function () {
      obtenerUsuariosRecientes();
  };
  