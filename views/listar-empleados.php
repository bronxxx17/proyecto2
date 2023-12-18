<?php
require_once '../models/listar.php';


$listarEmpleados = new ListarEmpleados();
$empleados = $listarEmpleados->obtenerEmpleados();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Listado de Empleados</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  
  <!-- Bootstrap CSS v5.3.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<body>
  <div class="container my-4">
    <h2>Listado de Empleados</h2>
    <div class="mb-3">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Sede</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Número Documento</th>
            <th>Fecha de Nacimiento</th>
            <th>Teléfono</th>
          </tr>
        </thead>
        <tbody>
            <?php if (!empty($empleados)) : ?>
              <?php foreach ($empleados as $empleado) : ?>
                <tr>
                  <td><?php echo $empleado['idempleado']; ?></td>
                  <td><?php echo $listarEmpleados->obtenerNombreSede($empleado['idsede']); ?></td>
                  <td><?php echo $empleado['apellidos']; ?></td>
                  <td><?php echo $empleado['nombres']; ?></td>
                  <td><?php echo $empleado['nrodocumento']; ?></td>
                  <td><?php echo $empleado['fechanac']; ?></td>
                  <td><?php echo $empleado['telefono']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="7">No hay empleados para mostrar.</td>
              </tr>
            <?php endif; ?>
          </tbody>
      </table>
    </div>

    <div class="row">
        <div class="col">
          <!-- Botones -->
          <a href="buscar-empleados.php" class="btn btn-primary">Buscar Empleado</a>
          <a href="registra-empleados.php" class="btn btn-success">Registrar Empleado</a>
          <a href="resumen-sedes.php" class="btn btn-danger">Estadisticas Graficas</a>
        </div>
      </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Zv/1aZsIoMANBp8A8YC4vewNp6k6Po7UpyKpu7kw+065Qm10h1y5aTBFLPh2+jTl" crossorigin="anonymous"></script>
</body>
</html>
