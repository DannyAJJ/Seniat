<?php

require 'FPDF/fpdf.php';
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
$licencia = $_GET['Variable'];
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT `Numero_registro`, `Fecha_autorizacion`, `Region`, `Unidad`, `Razon_social`, `Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`, `Numero_rif_representante`, `Firmante`, `Segunda_firma` FROM licencia_licores WHERE licencia_licores.Numero_autorizacion = \"$licencia\" ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$N_registro= $row['Numero_registro'];
$Fecha_registro=$row['Fecha_autorizacion'];
$N_autorizacion= $licencia;
$Fecha_autorizacion=$row['Fecha_autorizacion'];
$Razon_social=$row['Razon_social'];
$N_rif=$row['Numero_rif_solicitante'];
$Direccion=$row['Direccion'];
$Autorizacion_ejerce=$row['Autorizacion_ejerce'];
$sqlcl = "SELECT DISTINCT cl.Clasificacion_indole FROM clase_producto cl, relacion_productos_licores rl WHERE rl.Id_producto = cl.Id AND rl.Id_licencia = \"$licencia\";";
$resultcl = $conn->query($sqlcl);
$rowcl = $resultcl->fetch_assoc();
$Clasificacion_indole=$rowcl['Clasificacion_indole'];
$Representante_legal=$row['Administrador_representante_legal'];
if ($row['Nacionalidad']== 1) {
    $Nacionalidad_representante='Venezonalo';
}else {
    $Nacionalidad_representante= 'Extranjero';
}
$Cedula_representante=$row['Cedula_representante'];
$N_rif_representante=$row['Numero_rif_representante'];
$Observaciones='Por cuánto el contribuyente arriba indicado, ha cumplido con los requisitos exigidos por la ley de impuesto sobre alcohol y especies alcohólicas y su reglamento, se le concede la presente AUTORIZACIÓN DE FÁBRICA DE ESPECIES ALCOHÓLICAS de acuerdo a las especificaciones contenidas en el respectivo registro.'."\n\nNOTA: De conformidad con el artículo 10 de la de la Ley del Timbre Fiscal los contribuyentes deben renovar su Registro de Expendio de Alcohol y Especies Alcohólicas anualmente antes de la fecha en la que fue entregado el Registro, asi como cumplir con todos los tramites que modifiquen el mismo conforme a la ley de Impuesto Sobre Alcohol y Especies Alcohólicas y su Reglamento en caso contrario, serán sancionados de acuerdo a lo establecido en el artículo 108 del Código Organico Tributario Vigente. Resuelve conceder la correspondiente autorización.";
$sqlfir1 = "SELECT `Nombre_firmante`, `Segunda_linea`, `Tercera_linea`, `Cuarta_linea` FROM `firmantes` ORDER by Id_firmante DESC LIMIT 1;";
$resultfir1 = $conn->query($sqlfir1);
$rowfir1 = $resultfir1->fetch_assoc();
$Firmante= array(
    'nombre' => $rowfir1['Nombre_firmante'],
    'l1' => $rowfir1['Segunda_linea'],
    'l2' => $rowfir1['Tercera_linea'],
    'l3' => $rowfir1['Cuarta_linea'],
);
$sqlfir2 = "SELECT `Texto_firmante` FROM `segundo_firmante` ORDER BY Id_firmante DESC LIMIT 1;";
$resultfir2 = $conn->query($sqlfir2);
$rowfir2 = $resultfir2->fetch_assoc();
$Segundo_firmante=$rowfir2['Texto_firmante'];

/*


creacion pdf


*/
$pdf = new FPDF('P','mm',array(215.9,355.6));
$pdf->AddPage();
$pdf->SetFont('Arial','B','12');
$pdf->SetLeftMargin(15);

$pdf->Sety(40);
    $pdf->MultiCell('185','8',mb_convert_encoding('CONSTANCIA DE AUTORIZACIÓN PARA FÁBRICA DE ESPECIES ALCOHÓLICAS Y BEBIDAS ALCOHÓLICAS','ISO-8859-1','UTF-8'),1,'C',false);


$pdf->SetFont('Arial','','9');

$pdf->MultiCell('46.25','7',mb_convert_encoding('N DE REGISTRO'."\n".$N_registro,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+46.25,$y-14);
$pdf->MultiCell('46.25','7',mb_convert_encoding('FECHA DE REGISTRO'."\n".$Fecha_registro,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-14);
$pdf->MultiCell('44.5','7',mb_convert_encoding('N DE AUTORIZACION'."\n".$N_autorizacion,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+137,$y-14);
$pdf->MultiCell('48','7',mb_convert_encoding('FECHA DE AUTORIZACION'."\n".$Fecha_registro,'ISO-8859-1','UTF-8'),1,'C',false);

$pdf->Ln();
$pdf->Cell('92.5','10',mb_convert_encoding('REGIÓN: CENTRAL','ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('GERENCIA REGIONAL DE TRIBUTOS INTERNOS','ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('138.75','10',mb_convert_encoding('RAZÓN SOCIAL: '.$Razon_social,'ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('46.25','10',mb_convert_encoding('N DE RIF: '.$N_rif,'ISO-8859-1','UTF-8'),1,1,'L',false);
if (strlen($Direccion)>200) {
    $pdf->SetFont('Arial','','7');
}

$pdf->MultiCell('185','7',mb_convert_encoding('DIRECCIÓN: '.$Direccion,'ISO-8859-1','UTF-8'),1,'C',false);
//$pdf->Cell('185','10',mb_convert_encoding('DIRECCIÓN: '.$Direccion,'ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->SetFont('Arial','','9');
$pdf->Cell('185','10',mb_convert_encoding('AUTORIZACIÓN QUE EJERCE: '.$Autorizacion_ejerce,'ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->Cell('185','10',mb_convert_encoding('CLASIFICACIÓN E INDOLE QUE EJERCE: '.$Clasificacion_indole,'ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->Cell('185','10',mb_convert_encoding('ADMINISTRADOR O REPRESENTANTE LEGAL: '.$Representante_legal,'ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->MultiCell('46.25','7',mb_convert_encoding('NACIONALIDAD'."\n".$Nacionalidad_representante,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+46.25,$y-14);
$pdf->MultiCell('69.38','7',mb_convert_encoding('CEDULA DE IDENTIDAD:'."\n".$Cedula_representante,'ISO-8859-1','UTF-8'),1,'C',false);
$pdf->SetXY($x+115.63,$y-14);
$pdf->MultiCell('69.37','7',mb_convert_encoding('NUMERO DE RIF:'."\n".$N_rif_representante,'ISO-8859-1','UTF-8'),1,'C',false);
$pdf->Cell('185','5',mb_convert_encoding('OBSERVACIONES:','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->MultiCell('185','7',mb_convert_encoding($Observaciones,'ISO-8859-1','UTF-8'),1,'J',false);
$pdf->Cell('92.5','7',mb_convert_encoding('FIRMA AUTORIZADA:','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('92.5','7',mb_convert_encoding('RECIBE CONFORME','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n".$Firmante['nombre']."\n".$Firmante['l1']."\n".$Firmante['l2']."\n".$Firmante['l3']."\n\n\n".$Segundo_firmante,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-50);
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n"."     Nombre:\n     Firma:\n     Fecha:\n"."\n\n\n\n",'ISO-8859-1','UTF-8'),1,'L',false);

$pdf->Output();
?>