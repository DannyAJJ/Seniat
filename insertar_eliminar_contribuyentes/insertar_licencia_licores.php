<?php

//Metodo post

$sector = $_POST['sector'];
$tipopersona = $_POST['tipodepersona'];
$nombre = $_POST['nombre'];
//$cedulacombo = $_POST['cedulacombo'];
$cedula = $_POST['cedula'];
$rif = $_POST['rif'];
$domfiscal = $_POST['domiciliofiscal'];
$telefono = $_POST['telefono'];
$inscripcion = $_POST['inscripcion'];
$tomo = $_POST['tomo'];
$registro = $_POST['registro'];
$nombrerepresentante = $_POST['nombrerepresentante'];
$apellidorepresentante = $_POST['apellidorepresentante'];
$nacionalidad = $_POST['nacionalidad'];
$cedularepresentante = $_POST['cedularepresentante'];
$rifempresa = $_POST['rifempresa'];
$direccionrepresentante = $_POST['direccionrepresentante'];
$correorepresentante = $_POST['correorepresentante'];
$telefonorepresentante = $_POST['telefonorepresentante'];
$clase = $_POST['claseproducto'];
$grado = $_POST['gradoalcoholicoproducto'];
$materia = $_POST['materiaprimaproducto'];

// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT `Siglas` FROM `clase_producto` WHERE `Id` = $clase;";
$siglas = $conn->query($sql);
$row = $siglas->fetch_assoc();
$sigla = $row['Siglas'];
$siglab = $row['Siglas'].'-%';
//if (mysqli_num_rows($siglas) > 0) {$sigla = $siglas;}


$sql = "SELECT `Numero_autorizacion` FROM `licencia_licores` WHERE `Numero_autorizacion` LIKE '$siglab' ORDER BY Numero_autorizacion DESC LIMIT 1;";
$ultimalicencia = $conn->query($sql);
$row = $ultimalicencia->fetch_assoc();
$ultimoValor = preg_replace('/[^0-9]/', '', $row['Numero_autorizacion']);
$cantidaduv = strlen($ultimoValor);
$ultimoValor = (intval($ultimoValor)+1);
while (strlen($ultimoValor) < $cantidaduv) {
    $ultimoValor = '0'.$ultimoValor;
}
//if (mysqli_num_rows($ultimalicencia) > 0) {$ultimoValor = intval($ultimalicencia['Numero_autorizacion'])+1;};

$sql = "SELECT `Id_firmante` FROM `firmantes` ORDER by Id_firmante DESC LIMIT 1;";
$ultimofirmante = $conn->query($sql);
$row = $ultimofirmante->fetch_assoc();
$idfirmante = $row['Id_firmante'];
//if (mysqli_num_rows($ultimofirmante) > 0) {$idfirmante = $ultimofirmante['Id_firmante'];};


$sql = "SELECT `Id_firmante` FROM `segundo_firmante` ORDER by `Id_firmante` DESC LIMIT 1;";
$ultimofirmante2 = $conn->query($sql);
$row = $ultimofirmante2->fetch_assoc();
$idfirmante2 = $row['Id_firmante'];
//if (mysqli_num_rows($ultimofirmante2) > 0) {$idfirmante2 = $ultimofirmante2['Id_firmante'];};


$fechahoy = date('d-m-Y');

$ultimafecha = date('Y');
    $sql = "SELECT `Numero_registro` FROM `licencia_licores` WHERE `Fecha_autorizacion` LIKE '%$ultimafecha' ORDER BY Numero_registro DESC LIMIT 1;";    
    $ejecutada = $conn->query($sql);
    if ($ejecutada->num_rows > 0) {
        $fecha = $ejecutada-> fetch_assoc();
        $numregistro = intval($fecha["Numero_registro"]) + 1;
    }else {
        $numregistro = 1;
    }


if ($tipopersona == 0) {
    
$sql = "INSERT INTO `licencia_licores` ( `Fecha_autorizacion`, `Numero_autorizacion`, `Unidad`, `Razon_social`,
`Numero_rif_solicitante`, `Direccion`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`,
`Numero_rif_representante`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`, 
`Telefono_reprensentante`, `Direccion_representante_legal`, `Correo_representante`, `N_inscripcion`, `Tomo`, 
`Oficina_resgistro_mercantil`, `Numero_registro`) VALUES ( '$fechahoy', '$sigla-$ultimoValor', '$sector', '$nombre', 
'$rifempresa', '$domfiscal', '$nombrerepresentante','$nacionalidad', '$cedularepresentante', 
'$rif', '$idfirmante', '$idfirmante2', '$tipopersona', '$grado', '$materia', '$telefono', '$telefonorepresentante', '$direccionrepresentante',
 '$correorepresentante', '$inscripcion', '$tomo', '$registro','$numregistro');";

$ejecutada = $conn->query($sql);
}else {
    $sql = "INSERT INTO `licencia_licores` ( `Fecha_autorizacion`, `Numero_autorizacion`, `Unidad`, `Razon_social`,
`Numero_rif_solicitante`, `Direccion`, `Administrador_representante_legal`, `Cedula_representante`,
`Numero_rif_representante`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`, 
`Telefono_reprensentante`, `Direccion_representante_legal`, `Correo_representante`, `N_inscripcion`, `Tomo`, 
`Oficina_resgistro_mercantil`, `Numero_registro`) VALUES ( '$fechahoy', '$sigla-$ultimoValor', '$sector', '$nombre', 
'$rifempresa', '$domfiscal', '$nombrerepresentante', '$cedularepresentante', 
'$rif', '$idfirmante', '$idfirmante2', '$tipopersona', '$grado', '$materia', '$telefono', '$telefonorepresentante', '$direccionrepresentante',
 '$correorepresentante', '$inscripcion', '$tomo', '$registro','$numregistro');";

$ejecutada = $conn->query($sql);
}

echo "<script>
  window.open('../pdf/crear_autorizacion_licores_pdf.php?Variable="."$sigla-$ultimoValor"."', '_blank');
</script>";
header("Location:../menu/index.php");
//$ejecutada->fetch_assoc();
?>