<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <div style="width: 70% ; margin:auto;">
    <!-- canvas   = lienzo = obra de arte-->
    <canvas id="lienzo"></canvas>
  </div>
  

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const contexto = document.querySelector("#lienzo")
    const grafico= new Chart(contexto , {
      type :'bar',
      data :{
        labels : ["A" , " B" , "C" , "D" , "E" , "F" , "G"],
        datasets: [{
          label : " total de sedes",
          data  : []
        }]
      }   
    });

    (function () {
      fetch(`../controllers/empleados.controller.php?operacion=getResumenSedes`)
        .then(respuesta => respuesta.json())
        .then(datos => {
          //console.log(datos)
          grafico.data.labels = datos.map(registro => registro.sede)
          grafico.data.datasets[0].data = datos.map(registro => registro.total)
          grafico.update()
        })
        .catch(e => {
          console.error(e)
        })  
    })();



</script>
</body>
</html>