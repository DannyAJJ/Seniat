<link rel="stylesheet" href="estilosphp.css">

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

    echo "<td><a class='enlace' href>VER</a>
          <td><a class='enlace' href=''>LIQ. PROD.</a></td>
          <td><a class='enlace' href=''>LIQ. P.V.P</a></td>
          <td><a class='enlace' href=''>RENOVACIÓN</a></td>
          <td><a class='enlace' href=''>ELIMINAR</a></td></tr>";
    }
    echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}
?>