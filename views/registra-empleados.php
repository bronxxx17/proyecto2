<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
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
    <div class="alert alert-info mt-3">
        <h5>Registro de empleados</h5>
        <samp>Complete la información solicitada</samp>
    </div>
    <div class="card-body">
        <form action="" id="formEmpleado" autocomplete="off">

            <div class="mb-3">
                <label for="sedes" class="form-label">Sede:</label>
                <select name="marca" id="sedes" class="form-select" required>
                    <option value="">---Seleccione---</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nrodocumento"  class="form-label">N° DNI:</label>
                <input type="text" id="nrodocumento" maxlength="8" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" id="apellidos" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" id="nombres" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha nacimiento:</label>
                <input type="text" id="fecha" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telefonos"  class="form-label">N° telefónico:</label>
                <input type="text" id="telefonos" maxlength="9" class="form-control" required>
            </div>
            <div class="mb-3 text-end">
                <button class="btn btn-primary" id="guardar" type="submit">Guardar Datos</button>
                <button class="btn btn-primary" type="reset">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        function $(id) {
            return document.querySelector(id)
        }

        (function () {
            fetch(`../controllers/Sedes.controller.php?operacion=listar`)
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        datos.forEach(element => {
                            const tagOption = document.createElement("option");
                            tagOption.value = element.idsede;
                            tagOption.innerHTML = element.sede;
                            $("#sedes").appendChild(tagOption);
                        });
                    })
                    .catch(e => {
                        console.error(e)
                    })
        })();

        $("#formEmpleado").addEventListener("submit", (event) => {

            // Evitamos el envío por ACTION
            event.preventDefault();

            // Envío por Ajax (fetch)
            if (confirm("¿Desea registrar estos datos?")) {

                const parametros = new FormData();
                parametros.append("operacion", "add");
                parametros.append("idsede", $("#sedes").value);
                parametros.append("apellidos", $("#apellidos").value);
                parametros.append("nombres", $("#nombres").value);
                parametros.append("nrodocumento", $("#nrodocumento").value);
                parametros.append("fechanac", $("#fecha").value);
                parametros.append("telefono", $("#telefonos").value);

                fetch(`../controllers/Empleados.controller.php`, {
                    method: "POST",
                    body: parametros
                })
                        .then(respuesta =>respuesta.json())
                        .then(datos => {
                            if (datos.idEmpleado > 0) {
                                $("#formEmpleado").reset();
                                alert(`Empleado registrado con ID: ${datos.idEmpleado}`);
                            } else {
                                alert("Hubo un error al registrar el empleado");
                            }
                        })
                        .catch(e => {
                            console.error(e);
                        });
            }
        })

    })

</script>
</body>
</html>
