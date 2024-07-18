<?php 
$tipo = $_GET['tipo']

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="estilosr.css">
    <script src="../jquery-3.7.1.min.js"></script>
</head>

<div id="report-container">

        <center><h3>REPORTES <?php switch ($tipo) {case 'prolicor': echo "PRODUCCION LICORES"; break;case 'pvplicor': echo "P.V.P. LICORES"; break;case 'pvptabaco': echo "P.V.P. TABACO"; break;}?></h3></center>

        <a class="links" href="../menu/index.php"></a>

    <div id="year-controls">
      <button id="prev-year">«</button>
      <span id="current-year"><?php echo date('Y');?></span>
      <button id="next-year">»</button>
    </div>
    <table id="report-table">
      <thead>
        <tr>
          <th>Mes</th>
          <th>Total Hecho</th>
          <th>Total Ganado</th>
        </tr>
      </thead>
      <tbody id="report-body">
        <!-- Filas de reporte por mes -->
      </tbody>
      <tfoot>
        <tr>
          <th>Total Año</th>
          <td id="total-year-done">0</td>
          <td id="total-year-earned">0</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <main>
    <video muted autoplay loop>
        <source src="../video/videof.mp4" type="video/mp4">
    </video>
    <div class="capa"></div>
  </main>

<script>
  let currentYear = parseInt("<?php echo date('Y'); ?>");
let reportData = [];
    function agregarano(ano) {
      if (!reportData.some(item => item.year == ano)) {

        busqueda(ano).then(function (data) {
          reporteano = data;
          reportData.push({ year: ano, data: [] });
          for (let i = 1; i < 13; i++) {
            reportData.find(item => item.year == ano)['data'].push({ month: getMonthName(i - 1), done: parseFloat(reporteano['meses'][i]['cantidad']), earned: parseFloat(parseFloat(reporteano['meses'][i]['suma']).toFixed(2)) });
          }
          renderReportTable(ano);
        });
      } else {
        renderReportTable(ano);
      }

    }

// Función para renderizar la tabla
function renderReportTable(year) {
  let totalYearDone = 0;
  let totalYearEarned = 0;
  const reportBody = document.getElementById('report-body');
  reportBody.innerHTML = '';
  
  for (let i = 0; i < 12; i++) {
    const month = getMonthName(i);
    const dataano = reportData.find(item => item.year == currentYear);
    const data = dataano['data'].find(item => item.month === month);
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${month}</td>
      <td>${data.done}</td>
      <td>${data.earned}</td>
    `;
    reportBody.appendChild(row);
    totalYearDone += data.done;
    totalYearEarned += data.earned;
  }
  
  document.getElementById('total-year-done').textContent = totalYearDone;
  document.getElementById('total-year-earned').textContent = totalYearEarned;
}

// Función para obtener el nombre del mes
function getMonthName(monthIndex) {
  const months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  return months[monthIndex];
}

// Eventos para adelantar o retroceder el año
document.getElementById('prev-year').addEventListener('click', () => {
  currentYear--;
  agregarano(currentYear);
  document.getElementById('current-year').innerHTML = currentYear;
  renderReportTable(currentYear);
});

document.getElementById('next-year').addEventListener('click', () => {
  currentYear++;
  agregarano(currentYear);
  document.getElementById('current-year').innerHTML = currentYear;
  renderReportTable(currentYear);
});

// Renderizar la tabla inicialmente
agregarano(currentYear);
function busqueda(a) {
  return $.ajax({ 
    url: 'busqueda.php',
    type: 'POST',
    dataType: 'json',
    data: {
      ano: a,
      tipo: '<?php echo $tipo?>'
    }
  });
}
</script>
</html>