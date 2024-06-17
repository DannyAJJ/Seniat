<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$rif_contribullente = $_POST['rif'];
$sql = "SELECT autorizacion_licores.Numero_autorizacion, unidades.Unidad, autorizacion_licores.Razon_social FROM autorizacion_licores, unidades WHERE `Numero_rif_solicitante` = \"$rif_contribullente\" AND `Habilitado` = 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tbody>";
  // Mostrar los detalles completos de todas las demás columnas
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["Numero_autorizacion"]. "</td><td>" .$row["Razon_social"]. "</td><td>" . $row["Unidad"] . "</td>";

    echo "<td><a href=''>Liqidar Produccion</a><a href=''>Liqidar P.V.P.</a><a href=''>Renovar</a><a href=''>Eliminar</a></td></tr>";
    }
    echo "</tbody></table>";
} else {
  echo "<p style='color: black; font-size: 20px; font-weight: bold;'>0 resultados</p>";
}
?>
<a href="">Liqidar Produccion</a><a href="">Liqidar P.V.P.</a><a href="">Renovar</a><a href="">Eliminar</a>