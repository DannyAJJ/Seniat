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
$sql = "SELECT licencia_licores.Numero_autorizacion,licencia_licores.Fecha_autorizacion, unidades.Unidad, licencia_licores.Razon_social FROM licencia_licores, unidades WHERE `Numero_rif_solicitante` = \"$rif_contribullente\" AND `Habilitado` = 1 AND unidades.Id_unidad = licencia_licores.Unidad; ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<center><strong><h2>Licencias de Licores</h2></strong></center>";
    echo "<table><tbody>";
    echo "<tr><td><b>Nº de Licencia</b></td><td><b>Razon Social</b></td><td><b>Unidad</b></td><td><b>Expira</b></td><td colspan ='5'><center><b>Opciones</b></center></td></tr>";

  // Mostrar los detalles completos de todas las demás columnas
  while($row = $result->fetch_assoc()) {
    $fecha = DateTime::createFromFormat('d-m-Y',$row["Fecha_autorizacion"]);
    $fecha->modify('+1 year');
    $fechas = $fecha->format('d-m-Y');
    
    echo "<tr>";
    echo "<td>" . $row["Numero_autorizacion"]. "</td><td>" .$row["Razon_social"]. "</td><td>" . $row["Unidad"] . "</td>"."<td>" . $fechas. "</td>";

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


$sql = "SELECT licencia_tabaco.Numero_autorizacion,licencia_tabaco.Fecha_autorizacion, unidades.Unidad, licencia_tabaco.Razon_social FROM licencia_tabaco, unidades WHERE `Numero_rif_solicitante` = \"$rif_contribullente\" AND `Habilitado` = 1 AND unidades.Id_unidad = licencia_tabaco.Unidad; ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<center><strong><h2>Licencias de Licores</h2></strong></center>";
    echo "<table><tbody>";
    echo "<tr><td><b>Nº de Licencia</b></td><td><b>Razon Social</b></td><td><b>Unidad</b></td><td><b>Expira</b></td><td colspan ='5'><center><b>Opciones</b></center></td></tr>";

  // Mostrar los detalles completos de todas las demás columnas
  while($row = $result->fetch_assoc()) {
    $fecha = DateTime::createFromFormat('d-m-Y',$row["Fecha_autorizacion"]);
    $fecha->modify('+1 year');
    $fechas = $fecha->format('d-m-Y');
    
    echo "<tr>";
    echo "<td>" . $row["Numero_autorizacion"]. "</td><td>" .$row["Razon_social"]. "</td><td>" . $row["Unidad"] . "</td>"."<td>" . $fechas. "</td>";

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
