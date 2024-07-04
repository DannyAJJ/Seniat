<?php
require 'FPDF/fpdf.php';
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$licencia = $_GET['Variable'];
$fechasql = $_GET['Variable1'];
$sql = "SELECT r.Constancia_renovacion, l.Fecha_autorizacion, u.Unidad, l.Razon_social, l.Numero_rif_solicitante, l.Direccion, l.Telefono_solicitante, r.Fecha_pago, b.Nombre_banco, r.Forma16, r.Monto_cancelado,r.Fecha_pago, r.Proxima_renovacion, f.Nombre_firmante, f.Segunda_linea, f.Tercera_linea, f.Cuarta_linea, sf.Texto_firmante FROM renovacion_licores r, licencia_licores l, unidades u, bancos b, firmantes f, Segundo_firmante sf WHERE r.Numero_autorizacion = '$licencia' AND r.Fecha_renovacion = '$fechasql' AND l.Numero_autorizacion = r.Numero_autorizacion AND l.Unidad = u.Id_unidad AND b.Id_banco = r.Banco AND r.Segundo_firmante = sf.Id_firmante AND f.Id_firmante = r.Primer_firmante;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$constancia= $row['Constancia_renovacion'];
$telefono = $row['Telefono_solicitante'];
$banco = $row['Nombre_banco'];
$fechal = $row['Fecha_autorizacion'];
$fechap = $row['Fecha_pago'];
$timbrefiscal = $row['Forma16'];
$montocancelado = $row['Monto_cancelado'];
$unidad = $row['Unidad'];
$razonsocial = $row['Razon_social'];
$rif = $row['Numero_rif_solicitante'];
$Direccion = $row['Direccion'];
$nombrefirmante = [
    0 => $row['Nombre_firmante'],
    1 => $row['Segunda_linea'],
    2 => $row['Tercera_linea'],
    3 => $row['Cuarta_linea'],
];
$segundafirma = $row['Texto_firmante'];



$pdf = new FPDF('P','mm',array(215.9,355.6));
$pdf->AddPage();
$pdf->SetFont('Arial','B','12');
$pdf->SetLeftMargin(15);

$pdf->Sety(40);
$pdf->MultiCell('185','8',mb_convert_encoding('CONSTANCIA DE RENOVACIÓN DE AUTORIZACIÓN PARA FÁBRICA DE ESPECIES ALCOHÓLICAS','ISO-8859-1','UTF-8'),1,'C',false);

$pdf->SetFont('Arial','','7');

$pdf->MultiCell('46.25','7',mb_convert_encoding('CONSTANCIA DE RENOVACIÓN Nº'."\n". $constancia ,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+46.25,$y-14);

$pdf->SetFont('Arial','','9');
$pdf->MultiCell('46.25','7',mb_convert_encoding('FECHA DE RENOVACIÓN'."\n".$fechasql,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-14);
$pdf->MultiCell('44.5','7',mb_convert_encoding('Nº DE AUTORIZACION'."\n".$licencia,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+137,$y-14);
$pdf->MultiCell('48','7',mb_convert_encoding('FECHA DE REGISTRO'."\n".$fechal,'ISO-8859-1','UTF-8'),1,'C',false);

$pdf->SetFont('Arial','','9');
$pdf->Ln();
$pdf->Cell('46.25','7',mb_convert_encoding('FECHA DE EXPEDICIÓN','ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('46.25','7',mb_convert_encoding($fechasql,'ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('REGIÓN: CENTRAL','ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('UNIDAD: '.$unidad,'ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('RAZÓN SOCIAL: '.$razonsocial,'ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('N DE RIF: '.$rif,'ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('185','10',mb_convert_encoding('DIRECCIÓN: '.$Direccion,'ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->MultiCell('92.5','7',mb_convert_encoding("TELÉFONO:\n".$telefono,'ISO-8859-1','UTF-8'),1,'L',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-14);
$pdf->MultiCell('92.5','7',mb_convert_encoding("FECHA DE PAGO:\n". $fechap,'ISO-8859-1','UTF-8'),1,'L',false);
$pdf->MultiCell('92.5','7',mb_convert_encoding("BANCO:\n".$banco,'ISO-8859-1','UTF-8'),1,'L',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-14);
$pdf->MultiCell('92.5','7',mb_convert_encoding("FORMA 16 O TIMBRES FISCALES\n".'N. '.$timbrefiscal,'ISO-8859-1','UTF-8'),1,'L',false);
$pdf->MultiCell('92.5','7',mb_convert_encoding("MONTO CANCELADO\n".$montocancelado.' Bs','ISO-8859-1','UTF-8'),1,'L',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-14);
$pdf->MultiCell('92.5','7',mb_convert_encoding("PRÓXIMA RENOVACÓN\n".'04/9/2024','ISO-8859-1','UTF-8'),1,'L',false);
$pdf->Cell('185','5',mb_convert_encoding('OBSERVACIONES:','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->MultiCell('185','7',mb_convert_encoding('lineas','ISO-8859-1','UTF-8'),1,'J',false);
$pdf->Cell('92.5','7',mb_convert_encoding('FIRMA AUTORIZADA:','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('92.5','7',mb_convert_encoding('RECIBE CONFORME','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n".$nombrefirmante[0]."\n".$nombrefirmante[1]."\n".$nombrefirmante[2]."\n".$nombrefirmante[3]."\n\n\n".$segundafirma,'ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-50);
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n"."     Nombre:\n     Firma:\n     Fecha:\n"."\n\n\n\n",'ISO-8859-1','UTF-8'),1,'L',false);

$pdf->Output();
?>