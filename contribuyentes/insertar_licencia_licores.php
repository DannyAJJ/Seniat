<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT `Siglas` FROM `clase_producto` WHERE `Nombre_producto` = \'CERVEZA\';";
$siglas = $conn->query($sql);
if (mysqli_num_rows($siglas) > 0) {$sigla = $siglas['Siglas'];}


$sql = "SELECT `Numero_autorizacion` FROM `licencia_licores` WHERE `Numero_autorizacion` LIKE \'$sigla%\' ORDER BY `Numero_autorizacion` DESC LIMIT 1;";
$ultimalicencia = $conn->query($sql);
if (mysqli_num_rows($ultimalicencia) > 0) {$ultimoValor = intval($ultimalicencia['Numero_autorizacion'])+1;}



$sql = "INSERT INTO `licencia_licores` ( `Fecha_autorizacion`, `Numero_autorizacion`, `Region`, `Unidad`, `Razon_social`,
`Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`,
`Numero_rif_representante`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`, 
`Telefono_reprensentante`, `Direccion_representante_legal`, `Habilitado`, `Correo_representante`, `N_inscripcion`, `Tomo`, 
`Oficina_resgistro_mercantil`, `Ciudad`) VALUES ( \'date('d-m-Y')\', \'$sigla $ultimoValor\', \'REGION CENTRAL\', \'2\', \'empresita\', 
\'J-500333223\', \'unadireccio n\', \'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS\', \'OSCAR ALFREDO ARELLANO DUARTE\', \'1\', \'dsds\', 
\'dasda\', \'1\', \'1\', \'1\', \'24\', \'cana\', \'234234\', \'23113\', \'otradirecion\', \'1\', \'dsadasda\', \'45347\', \'texto\', 
\'texto\', \'1\');";

?>