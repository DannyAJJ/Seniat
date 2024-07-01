<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
$conn = new mysqli($servername, $username, $password, $dbname);
$rif_contribullente = $_POST['rif'];
echo "<table><tbody>";
  $sql2 = "SELECT licencia_licores.`Numero_autorizacion`,licencia_licores.Razon_social, renovacion_licores.`Fecha_renovacion`, renovacion_licores.`Proxima_renovacion` FROM `renovacion_licores`, licencia_licores WHERE licencia_licores.Numero_autorizacion = renovacion_licores.Numero_autorizacion AND licencia_licores.Numero_rif_solicitante = \"$rif_contribullente\";";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
      echo "<tr><td>Nº de Licencia</td><td>Razón Social</td><td>Renovada</td><td>Expira</td><td>Opciones</td></tr>";
    while($row2 = $result2->fetch_assoc()) {
      echo "<tr><td>". $row2['Numero_autorizacion'] ."</td><td>". $row2['Razon_social'] ."</td><td>". $row2['Fecha_renovacion'] ."</td><td>". $row2['Proxima_renovacion'] ."</td><td><button class= 'enlace' type = 'button'>VER</button></td></tr>";
    }
  }
    echo "</tbody></table>";
?>