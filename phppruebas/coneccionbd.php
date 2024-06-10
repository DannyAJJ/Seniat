<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("<script>alert('no se conectó');</script>");
}
$sql = "SELECT * FROM usuarios "; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mostrar los detalles completos de todas las demás columnas
  while($row = $result->fetch_assoc()) {
    echo $row['Nombre_funcionario']." Cedula: ".$row['Cedula_funcionario']." Nivel: ".$row['Nivel_usuario'];
  }
} else {
  echo "<p style='color: black; font-size: 20px; font-weight: bold;'>0 resultados</p>";
}

?>

<?php 
$conn->close();
?>