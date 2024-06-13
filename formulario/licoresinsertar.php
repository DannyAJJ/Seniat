<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$Numero_registro = $_POST[''];
$Fecha_registro = $_POST[''];
$Numero_autorizacion = $_POST[''];
$Unidad = $_POST[''];
$Razon_social = $_POST[''];
$Numero_rif_solicitante = $_POST[''];
$Direccion = $_POST[''];
$Autorizacion_ejerce = $_POST[''];
$Clasificacion_indice_ejerce = $_POST[''];
$Administrador_representante_legal = $_POST[''];
$Nacionalidad = $_POST[''];
$Cedula_representante = $_POST[''];
$Numero_rif_representante = $_POST[''];
$Observaciones = $_POST[''];
$Firmante = $_POST[''];
$Segunda_firma = $_POST[''];
$Persona_juridica = $_POST[''];
$Grado_alcoholico = $_POST[''];
$Materia_prima = $_POST[''];
$Telefono_solicitante = $_POST[''];
$Telefono_reprensentante = $_POST[''];
$Direccion_representante_legal = $_POST[''];

$sql = "INSERT INTO `autorizacion_licores` (`Numero_registro`, `Fecha_registro`, `Numero_autorizacion`, `Unidad`, `Razon_social`,
 `Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Clasificacion_indice_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`,
  `Numero_rif_representante`, `Observaciones`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`,
   `Telefono_reprensentante`, `Direccion_representante_legal`) VALUES ('$Numero_registro', '$Fecha_registro', '$Numero_autorizacion', '$Unidad', '$Razon_social',
    '$Numero_rif_solicitante', '$Direccion', '$Autorizacion_ejerce', '$Clasificacion_indice_ejerce', '$Administrador_representante_legal', '$Administrador_representante_legal',
     '$Nacionalidad', '$Cedula_representante', '$Numero_rif_representante', '$Observaciones', '$Firmante', '$Segunda_firma', '$Persona_juridica', '$Grado_alcoholico',
      '$Materia_prima', '$Telefono_solicitante', '$Telefono_solicitante', '$Direccion_representante_legal')"; 

$result = $conn->query($sql);
//echo '<span>nou</span>';
if ($result->num_rows == 1) {
  header("Location:../menu/index.html");
  exit();

} else {
  echo '<span>nou</span>';
}


$conn->close();
?>