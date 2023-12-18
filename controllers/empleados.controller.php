-- Active: 1702677803592@@127.0.0.1@3306@senatidb
<?php

require_once '../models/Empleados.php';

if(isset($_POST['operacion'])){

  
  $empleado = new Empleado();

  if($_POST['operacion'] == 'search'){
 
    $respuesta = $empleado -> search(["nrodocumento" => $_POST['nrodocumento']]);
    echo json_encode($respuesta);

  }
  if($_POST['operacion'] == 'add'){

    $datosRecibidos = [
      "idsede"             => $_POST["idsede"],
      "apellidos"          => $_POST["apellidos"],
      "nombres"            => $_POST["nombres"],
      "nrodocumento"       => $_POST["nrodocumento"],
      "fechanac"           => $_POST["fechanac"],
      "telefono"           => $_POST["telefono"]

    ];
    $idobtenido = $empleado-> add($datosRecibidos);
    console.log($idobtenido);
  }
}// fin POST
if (isset($_GET['operacion'])){
  $empleado = new Empleado();

  if($_GET['operacion'] == 'getResumenSedes'){
    echo json_encode($empleado->getResumenSedes());
  }
}