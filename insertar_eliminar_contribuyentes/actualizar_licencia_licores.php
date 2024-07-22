<?php 
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
$conn = new mysqli($servername, $username, $password, $dbname);

$id_licencia = $_GET['licenica'];
$sql = "UPDATE
	`licencia_licores`
SET 
	`Numero_registro`='".$_POST['numeron_registro']."',
    `Razon_social`='".$_POST['nombre']."',
    `Numero_cedula_solicitante`='".$_POST['cedula']."',
    `Numero_rif_solicitante`='".$_POST['rifempresa']."',
    `Direccion`='".$_POST['domiciliofiscal']."',
    `Administrador_representante_legal`='".$_POST['nombrerepresentante']."',
    `Nacionalidad`='".$_POST['nacionalidadrepresentante']."',
    `Cedula_representante`='".$_POST['cedularepresentante']."',
    `Numero_rif_representante`='".$_POST['rif']."',
    `Firmante`='1',
    `Segunda_firma`='1',
    `Persona_juridica`='".$_POST['tipodepersona']."',
    `Materia_prima`='".$_POST['materiaprimaproducto']."',
    `Telefono_solicitante`='".$_POST['telefono']."',
    `Telefono_reprensentante`='".$_POST['telefonorepresentante']."',
    `Direccion_representante_legal`='".$_POST['direccionrepresentante']."',
    `Correo_representante`='".$_POST['correorepresentante']."',
    `N_inscripcion`='".$_POST['inscripcion']."',
    `Tomo`='".$_POST['tomo']."',
    `Oficina_resgistro_mercantil`='".$_POST['registro']."',
    `Grado_alcoholico`='".$_POST['gradoalcoholicoproducto']."' 
WHERE 
    `Numero_autorizacion` = '$id_licencia';";
$resultadolic = $conn->query($sql);
$sql = "SELECT
    Id_licencia
FROM
    relacion_productos_licores
WHERE
    Id_licencia = '$id_licencia'
    ";
$haber = $conn->query($sql);
if ($haber->num_rows == 0) {
    
$sql = "INSERT INTO
`relacion_productos_licores`
    (
        `Id_producto`,
        `Id_licencia`
    )
VALUES 
(
    '".$_POST['claseproducto']."',
    '$id_licencia'
);";

$resultadodetalle = $conn->query($sql);
}

header('location: ../pdf/crear_autorizacion_licores_pdf.php?Variable='.$id_licencia);
?>