var botonUsuario = document.getElementById("btnUsuario");
const ModalUsuario = new bootstrap.Modal(document.getElementById("ModalLogin"));
const ModalCrearUsuario = new bootstrap.Modal(document.getElementById("ModalCrearLogin"));

botonUsuario.addEventListener('click', HabrirModal);

function HabrirModal() {
    Swal.fire({
      title: "Ya tienes una Cuenta ?",
      showDenyButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No"
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        ModalUsuario.show();
      } else if (result.isDenied) {
        ModalCrearUsuario.show();
      }
    });
}