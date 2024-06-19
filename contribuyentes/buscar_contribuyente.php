<style>

/* Estilos para la tabla */
table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
  }
  
  th {
    background-color: #f0f0f0;
    font-weight: bold;
  }
  
  td {
    vertical-align: middle;
  }
  
  /* Estilos para los enlaces */
  .enlace {
    text-decoration: none;
    color: #337ab7;
    margin-right: 10px;
    border-radius: 5px;
    padding: 5px 10px;
    background-color: #f7f7f7;
    border: 1px solid #ccc;
  }
  
  .enlace:hover {
    color: #23527c;
    background-color: #eee;
    border-color: #aaa;
  }
  
  /* Estilos para el mensaje de sin resultados */
  p {
    font-size: 18px;
    font-weight: bold;
    color: #666;
    text-align: center;
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f7f7f7;
  }

</style>


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

    echo "<td><a class='enlace' href>VER</a></td><td><a class='enlace' href=''>LIQ. PROD.</a></td><td><a class='enlace' href=''>LIQ. P.V.P</a></td><td><a class='enlace' href=''>RENOVACIÓN</a></td><td><a class='enlace' href=''>ELIMINAR</a></td></tr>";
    }
    echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}
?>