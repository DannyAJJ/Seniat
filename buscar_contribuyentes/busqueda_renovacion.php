<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../index.html');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
$conn = new mysqli($servername, $username, $password, $dbname);
$rif_contribullente = $_POST['rif'];
if ($_SESSION['unidad']==1) {
  $limitunidadl = '';
}else {
  $limitunidadl = 'AND licencia_licores.Unidad = '.$_SESSION['unidad'];
}
  $sql2 = "SELECT licencia_licores.`Numero_autorizacion`,licencia_licores.Razon_social, renovacion_licores.`Fecha_renovacion`, renovacion_licores.`Proxima_renovacion` FROM `renovacion_licores`, licencia_licores WHERE licencia_licores.Numero_autorizacion = renovacion_licores.Numero_autorizacion $limitunidadl AND licencia_licores.Numero_rif_solicitante = \"$rif_contribullente\";";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
    $e = 0;
      echo "<table><tbody>";
      echo "<tr><td><strong>Nº de Licencia</strong></td><td><strong>Razón Social</strong></td><td><strong>Renovada</strong></td><td><strong>Expira</strong></td><td><strong>Opciones</strong></td></tr>";
    while($row2 = $result2->fetch_assoc()) {
      echo "<tr><td id= 'na$e'>". $row2['Numero_autorizacion'] ."</td><td>". $row2['Razon_social'] ."</td><td id= 'fa$e'>". $row2['Fecha_renovacion'] ."</td><td>". $row2['Proxima_renovacion'] ."</td><td><button onclick='verrenovacion($e)' class= 'enlace' type = 'button'>VER</button></td></tr>";
    $e=$e+1;
    }
    
    echo "</tbody></table>";
  }
?>
<script>
 function verrenovacion(e) {
    var eltd = document.getElementById(`na${e}`);
    var eltd1 = document.getElementById(`fa${e}`);
    var vari = eltd.textContent;
    var vari1 = eltd1.textContent;
    location.href = '../pdf/crear_renovacion_licores_pdf.php ?id='+vari+'&fecha='+vari1+'&tipo=0';
  }
</script>
 