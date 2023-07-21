function searchIndex(buscar) {
  var parametros = { buscar: buscar };
  $.ajax({
    data: parametros,
    type: "POST",
    url: "php/buscarIndex.php",
    success: function (data) {
      $("#search-results-container").html(data);
    },
  });
}
