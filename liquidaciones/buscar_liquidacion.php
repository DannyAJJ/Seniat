<link rel="stylesheet" href="estilosphp.css">

<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../login/index.html');
}
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$rif_contribullente = $_POST['rif'];
if ($_SESSION['unidad']==1) {
  $limitunidadl = '';
  $limitunidadt = '';
}else {
  $limitunidadl = 'AND licencia_licores.Unidad = '.$_SESSION['unidad'];
  $limitunidadt = 'AND licencia_tabaco.Unidad = '.$_SESSION['unidad'];
}
$sql = "SELECT liquidacion_licores.Secuencial, liquidacion_licores.Licencia, liquidacion_licores.Fecha_liquidacion, liquidacion_licores.Numero_manfiesto, liquidacion_licores.N_liquidacion, SUM(detalle_produccion_licores.Total_detalle) as 'Total_produccion', licencia_licores.Numero_rif_solicitante FROM liquidacion_licores, detalle_produccion_licores, licencia_licores WHERE licencia_licores.Numero_rif_solicitante = \"$rif_contribullente\" AND detalle_produccion_licores.Id_liquidacion = liquidacion_licores.N_liquidacion AND licencia_licores.Numero_autorizacion = liquidacion_licores.Licencia $limitunidadl GROUP BY liquidacion_licores.N_liquidacion;";
$result = $conn->query($sql);
$sql2 = "SELECT liquidacion_licores.Secuencial, liquidacion_licores.Licencia, liquidacion_licores.Fecha_liquidacion, liquidacion_licores.Numero_manfiesto, liquidacion_licores.N_liquidacion, SUM(detalle_pvp_licores.Total) as 'Total_pvp', licencia_licores.Numero_rif_solicitante FROM liquidacion_licores, detalle_pvp_licores, licencia_licores WHERE licencia_licores.Numero_rif_solicitante = \"$rif_contribullente\" AND detalle_pvp_licores.Id_liquidacion = liquidacion_licores.N_liquidacion AND licencia_licores.Numero_autorizacion = liquidacion_licores.Licencia $limitunidadl GROUP BY liquidacion_licores.N_liquidacion;";
$result2 = $conn->query($sql2);
$i = 0; 
echo "<center><strong><h2>Producción de Licores</h2></strong></center>";
if ($result->num_rows > 0) {
    echo "<table><tbody>";
    echo "<tr><td><b>Licencia</b></td><td><b>Secuencial</b></td><td><b>Fecha Liquidada</b></td><td><b>Manifiesto</b></td><td><b>Total Produccion</b></td><td><b>Opciones</b></td></tr>";

  // Mostrar los detalles completos de todas las demás columnas
  
  while($row = $result->fetch_assoc()) {
    $liquidacionl[$i] = $row['N_liquidacion'];
    echo "<tr>";
    echo "<td>" . $row["Licencia"]. "</td><td>" .$row["Secuencial"]. "</td><td>" . $row["Fecha_liquidacion"] . "</td>"."<td>" . $row["Numero_manfiesto"]. "</td>"."<td>" . $row["Total_produccion"]. " Bs.</td>";

    echo "<td><button class='enlace' type= 'button'>VER</button>";
    $i= $i+1;

  }
  
  echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}
echo "<center><strong><h2>P.V.P. de Licores</h2></strong></center>";
if ($result->num_rows > 0) {
    echo "<table><tbody>";
    echo "<tr><td><b>Licencia</b></td><td><b>Secuencial</b></td><td><b>Fecha Liquidada</b></td><td><b>Manifiesto</b></td><td><b>Total P.V.P.</b></td><td><b>Opciones</b></td></tr>";

  // Mostrar los detalles completos de todas las demás columnas
  
  while($row = $result2->fetch_assoc()) {
    
  $liquidacionl[$i] = $row['N_liquidacion'];
    echo "<tr>";
    echo "<td>" . $row["Licencia"]. "</td><td>" .$row["Secuencial"]. "</td><td>" . $row["Fecha_liquidacion"] . "</td>"."<td>" . $row["Numero_manfiesto"]. "</td>"."<td>" . $row["Total_pvp"]. " Bs.</td>";

    echo "<td><button class='enlace' type= 'button'>VER</button>";
    $i= $i+1;

  }
  
  
  echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}

$sql = "SELECT liquidacion_tabaco.Secuencial, liquidacion_tabaco.Licencia, liquidacion_tabaco.Fecha_liquidacion, SUM(detalle_tabaco.Impuesto) as 'Total', liquidacion_tabaco.N_liquidacion, licencia_tabaco.Numero_rif_solicitante FROM liquidacion_tabaco, detalle_tabaco, licencia_tabaco WHERE licencia_tabaco.Numero_rif_solicitante = \"$rif_contribullente\" AND detalle_tabaco.Id_liquidacion = liquidacion_tabaco.N_liquidacion $limitunidadt AND licencia_tabaco.Numero_autorizacion = liquidacion_tabaco.Licencia GROUP BY liquidacion_tabaco.N_liquidacion;";
$result = $conn->query($sql);

echo "<center><strong><h2>P.V.P. de Tabaco</h2></strong></center>";
if ($result->num_rows > 0) {
  
    echo "<table><tbody>";
    echo "<tr><td><b>Nº de Licencia</b></td><td><b>Secuencial</b></td><td><b>Fecha Liquidada</b></td><td><b>Total P.V.P.</b></td><td><b>Opciones</b></tr>";

// Mostrar los detalles completos de todas las demás columnas
  while($row = $result->fetch_assoc()) {
  $liquidaciont[$i] = $row['N_liquidacion'];
    echo "<tr>";
    echo "<td>" . $row["Licencia"]. "</td><td id= 'secuencial$i'>" .$row["Secuencial"]. "</td><td>" . $row["Fecha_liquidacion"] . "</td>"."<td>" . $row["Total"]. " Bs.</td>";

    echo "<td><button class='enlace' type= 'button'>VER</button>";
    
    $i= $i+1;
    }
    echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}
?>
