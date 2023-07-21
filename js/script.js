window.addEventListener('load', () => {
  const contenedorCarga = document.getElementById('contenedor__carga');
  contenedorCarga.style.visibility = "hidden";
  contenedorCarga.style.opacity = "0";
});

function mostrarSearch(event) {
  event.preventDefault(); // Prevenir el comportamiento predeterminado del evento
  const search_contenedor = document.querySelector('.search-container');
  if (search_contenedor.style.display === "none" || search_contenedor.style.display === "") {
    search_contenedor.style.display = "flex";
    document.body.style.overflow = "hidden";
  } else {
    search_contenedor.style.display = "none";
    document.body.style.overflow = "auto";
  }
}


function buscarAhora(buscar) {
  var parametros = { "buscar": buscar };
  $.ajax({
      data: parametros,
      type: 'POST',
      url: '../php/buscar.php',
      success: function (data) {
          $('#search-results-container').html(data);
      }
  });
}
function abrirNavegacion() {
  var headerNavOpen = document.getElementById("headerNavOpen");
  headerNavOpen.style.display = "block";
  document.body.style.overflow = "hidden"; // Deshabilita el scroll
}

function cerrarNavegacion() {
  var headerNavOpen = document.getElementById("headerNavOpen");
  headerNavOpen.style.display = "none";
  document.body.style.overflow = "auto"; // Habilita el scroll
}


