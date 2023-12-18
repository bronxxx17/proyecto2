<!DOCTYPE html>
<html lang="es">
<head>
  <title>Detalles de los empleados</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />

  <!-- Bootstrap CSS v5.2.1 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header bg-primary">
        <span class="text-light">Detalles de los empleados</span>
      </div>
      <div class="card-body">
        <form action="formBusqueda" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" maxlength="8" placeholder="Escriba el N° DNI" class="form-control text-center" id="nrodocumento" autofocus>
            <button class="btn btn-success" type="button" id="btBuscar">Buscar DNI:</button>
          </div>
          <small id="status">NO HAY BÚSQUEDAS ACTIVAS</small>
        </div>
        <div class="mb-3">
          <label for="sede" class="form-label">Sede :</label>
          <input type="text" class="form-control" id="sede" >
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido empleados:</label>
          <input type="text" class="form-control" id="apellido">
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombres empleados:</label>
          <input type="text" class="form-control" id="nombre">
        </div>
        <div class="mb-3">
          <label for="fechanac" class="form-label">Fecha nacimiento:</label>
          <input type="text" class="form-control" id="fechanac">
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Número telefónico:</label>
          <input type="text" class="form-control" id="telefono">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    function $(id) { return document.querySelector(id) }

    function buscarDni() {
      const nrodocumento = $("#nrodocumento").value

      if (nrodocumento != "") {
        const parametros = new FormData()
        parametros.append("operacion", "search")
        parametros.append("nrodocumento", nrodocumento)

        $("#status").innerHTML = "BUSCANDO POR FAVOR ESPERE ...."

        fetch('../controllers/Empleados.controller.php', {
          method: "POST",
          body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
          console.log(datos)
        if (! datos) {
          $("#status").innerHTML = "NO SE ENCONTRÓ EL DNI"
          $("#FormBusqueda").reset()
          $("#nrodocumento").focus()
        } else {
          $("#status").innerHTML = "DNI ENCONTRADO"
        $('#sede').value = datos.sede   
        $('#apellido').value = datos.apellido
        $('#nombre').value = datos.nombre
        $('#fechanac').value = datos.fechanac
        $('#telefono').value = datos.telefono
          }
        })
        .catch(e => {
          console.error(e)
        })
      }
    }

    $("#nrodocumento").addEventListener("keypress", (event) => {
      if (event.keyCode == 13) {
        buscarDni()
      }
    }) 

    $("#btBuscar").addEventListener("click", buscarDni)
  })
</script>
</body>
</html>
