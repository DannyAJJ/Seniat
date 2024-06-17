<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO `autorizacion_licores` (`Numero_registro`, `Fecha_registro`, `Numero_autorizacion`, `Fecha_autorizacion`, `Region`, `Unidad`, `Razon_social`, `Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Clasificacion_indice_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`, `Numero_rif_representante`, `Observaciones`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`, `Telefono_reprensentante`, `Direccion_representante_legal`, `Habilitado`) VALUES (\'3242\', \'faf\', \'FD 00001\', \'afafas\', \'REGION CENTRAL\', \'1\', \'empresita\', \'J-500333223\', \'una direccion\', \'1\', \'1\', \'OSCAR ALFREDO ARELLANO DUARTE\', \'1\', \'dsds\', \'dasda\', \'una direccion\', \'1\', \'1\', \'1\', \'24\', \'uva\', \'234234\', \'23113\', \'una direccion\', \'1\');";
if ($conn->query($sql) === TRUE) {
    echo "disque funciona";
} else {
    echo "el id exploto";
}
?>