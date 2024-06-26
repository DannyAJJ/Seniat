<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "INSERT INTO `licencia_licores` ( `Fecha_autorizacion`, `Numero_autorizacion`, `Region`, `Unidad`, `Razon_social`,
`Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`,
`Numero_rif_representante`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`, 
`Telefono_reprensentante`, `Direccion_representante_legal`, `Habilitado`, `Correo_representante`, `N_inscripcion`, `Tomo`, 
`Oficina_resgistro_mercantil`, `Ciudad`) VALUES ( \'date('d-m-Y')\', \'FD 00002\', \'REGION CENTRAL\', \'2\', \'empresita\', 
\'J-500333223\', \'unadireccio n\', \'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS\', \'OSCAR ALFREDO ARELLANO DUARTE\', \'1\', \'dsds\', 
\'dasda\', \'1\', \'1\', \'1\', \'24\', \'cana\', \'234234\', \'23113\', \'otradirecion\', \'1\', \'dsadasda\', \'45347\', \'texto\', 
\'texto\', \'1\');";

?>