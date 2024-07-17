<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
require 'FPDF/fpdf.php';

$secuencial = $_GET['secuencial'];
$fecharesolu = $_GET['fecha'];
$sql = "SELECT l.Numero_rif_solicitante, l.Razon_social, lq.Licencia, l.Direccion, lq.Secuencial, lq.N_liquidacion, fl.Nombre_firmante FROM liquidacion_tabaco lq, licencia_tabaco l, firmante_liquidacion fl WHERE lq.Secuencial = '$secuencial' AND fl.Id_firmante = lq.Firmante AND lq.Fecha_liquidacion = '$fecharesolu' AND lq.Licencia = l.Numero_registro;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//Asignacion variables

$gerenciaregional = 'REGIÓN CENTRAL';
$rif = $row['Numero_rif_solicitante'];
$gcia = '10';
$ofiliq = '1';
$año = substr($fecharesolu, -2);
$aporoc = '1';
$tipoliq = '1';
$serie = '40';
$v = '1';
$resolucionnum = $row['Licencia'];
$razonsocial = $row['Razon_social'];
$fechaformateada = DateTime::createFromFormat('d-m-Y', $fecharesolu);
$fechaformateada->modify('+1 day');
$fechagarantia = '';
$direccion = $row['Direccion'];
$fechavencimiento = $fechaformateada->format('d-m-Y');
$sqld = "SELECT d.Marca, d.Unidad, d.Cantidad, d.Pvp_bs, d.Venta, d.Total_detalle FROM detalle_tabaco d, liquidacion_tabaco l WHERE d.Id_liquidacion = l.N_liquidacion AND Id_liquidacion = '" . $row['N_liquidacion'] . "';";
$resultd = $conn->query($sqld);
    $marca = array_fill(1, 12, ' ');
    $unidad = array_fill(1, 12, ' ');
    $cantidad = array_fill(1, 12, ' ');
    $pvp = array_fill(1, 12, ' ');
    $venta = array_fill(1, 12, ' ');
    $impuesto = array_fill(1, 12, ' ');
$e = 1;
while ($rowd = $resultd->fetch_assoc()) {
    $marca[$e] = $rowd['Marca'];
    $unidad[$e] = $rowd['Unidad'];
    $cantidad[$e] = $rowd['Cantidad'];
    $pvp[$e] = $rowd['Pvp_bs'];
    $venta[$e] = $rowd['Venta'];
    $impuesto[$e] = $rowd['Total_detalle'];
    $e = $e+1;
}

//echo "<script>console.log(JSON.parse('".json_encode($cantidad)."'))</script>";
$sqltd = "SELECT SUM(`Venta`) AS 'Venta', SUM(`Total_detalle`) AS 'Impuesto' FROM detalle_tabaco d, liquidacion_tabaco l WHERE d.Id_liquidacion = l.N_liquidacion AND Id_liquidacion = '" . $row['N_liquidacion'] . "';";
$resulttd = $conn->query($sqltd);
$rowtd = $resulttd->fetch_assoc();
$totaventa = $rowtd['Venta'];
$totalimpuesto = $rowtd['Impuesto'];
$codigo1 = '';
$codigo2 = '';
$codigo3 = '';
$codigo4 = '';
$montobs2 = '';
$montobs3 = '';
$montobs4 = '';
$totalporpagar = $totalimpuesto;
$efectivobs = '';
$bonobs = '';
$certificado = '';
$firma = $row['Nombre_firmante'];

//fin de metodo POST


$pdf = new FPDF('p', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

$pdf->SetAutoPageBreak(true, 0);

$pdf->SetXY(+45.25, +30.5); //gerencia regional
$pdf->Cell(30, 10, mb_convert_encoding($gerenciaregional, 'ISO-8859-1', 'UTF-8'), 0, 0, 'l');

$pdf->SetXY(+147.25, +30.5); // rif
$pdf->Cell(30, 10, $rif, 0, 0);

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(+3, +45.5); //liquidacion
$pdf->Cell(5, 10, $gcia, 0, 0);
$pdf->SetXY(+12, +45.5); //liquidacion
$pdf->Cell(5, 10, $ofiliq, 0, 0);
$pdf->SetXY(+20, +45.5); //liquidacion
$pdf->Cell(5, 10, $año, 0, 0);
$pdf->SetXY(+30, +45.5); //liquidacion
$pdf->Cell(5, 10, $aporoc, 0, 0);
$pdf->SetXY(+40, +45.5); //liquidacion
$pdf->Cell(5, 10, $tipoliq, 0, 0);
$pdf->SetXY(+47, +45.5); //liquidacion
$pdf->Cell(5, 10, '40', 0, 0);
$pdf->SetXY(+63, +45.5); //liquidacion
$pdf->Cell(15, 10, $secuencial, 0, 0);
$pdf->SetXY(+78, +45.5); //liquidacion
$pdf->Cell(5, 10, $v, 0, 0);

$pdf->SetFont('Arial', '', 9);

$pdf->SetXY(+110, +45.5); //resolucion
$pdf->Cell(30, 10, $resolucionnum, 0, 0);

$pdf->SetXY(+182, +45.5); //liquidacion
$pdf->Cell(30, 10, substr($fecharesolu, 0, 2) . '       ' . substr($fecharesolu, 3, 2) . '      ' . substr($fecharesolu, -2), 0, 0);

$pdf->SetXY(+4, +56.5); //razon social
$pdf->Cell(30, 10,mb_convert_encoding($razonsocial, 'ISO-8859-1', 'UTF-8') , 0, 0);

$pdf->SetXY(+163, +56.5); //fecha de garantia
$pdf->Cell(30, 10, $fechagarantia, 0, 0);

$pdf->SetXY(+4, +64.5); //direccion
$pdf->Cell(30, 10,mb_convert_encoding($direccion, 'ISO-8859-1', 'UTF-8') , 0, 0);

$pdf->SetXY(+163, +64.5); //fecha de vencimiento
$pdf->Cell(30, 10, $fechavencimiento, 0, 0);
$y = 85;
for ($i = 1; $i <= 12; $i++) { //for de marca, venta y impuesto
    $pdf->SetXY(+6, +$y);
    $pdf->Cell(49, 6.54,mb_convert_encoding( $marca[$i], 'ISO-8859-1', 'UTF-8'), 0, 0);
    $pdf->Cell(17, 6.54, $unidad[$i], 0, 0, 'C');
    $pdf->Cell(16, 6.54, $cantidad[$i], 0, 0, 'C');
    $pdf->Cell(18, 6.54, $pvp[$i], 0, 0, 'C');
    $x = $pdf->GetX();
    $pdf->SetX($x + 8);
    $pdf->Cell(34.5, 6.54, $venta[$i], 0, 0, 'R');
    $x = $pdf->GetX();
    $pdf->SetX($x + 17);
    $pdf->Cell(35.5, 6.54, $impuesto[$i], 0, 1, 'R');
    //$totalventa = $totalventa + $pvp * $cantidad
    //$totalimpuesto = $totalimpuesto  + (($pvp * $cantidad) * 0.7)
    $y = $pdf->GetY();
}
$pdf->SetXY(+114, +161.5); //total venta
$pdf->Cell(35, 6, $totaventa, 0, 0, 'R');

$pdf->SetXY(+167, +167.5); //total impuesto
$pdf->Cell(40, 6, $totalimpuesto, 0, 0, 'R');

$pdf->SetXY(+0.5, +184); //numero de codigo 1
$pdf->Cell(30, 10, $codigo1, 0, 0);

$pdf->SetXY(+176, +187.3); //Monto en bs 1
$pdf->Cell(25, 4, $totalimpuesto, 0, 0, 'R');

$pdf->SetXY(+0.5, +190.5); //numero de codigo 2
$pdf->Cell(30, 10, $codigo2, 0, 0);

$pdf->SetXY(+176, +193.6); //Monto en bs 2
$pdf->Cell(25, 4, $montobs2, 0, 0, 'R');

$pdf->SetXY(+0.5, +197.2); //numero de codigo 3
$pdf->Cell(30, 10, $codigo3, 0, 0);

$pdf->SetXY(+176, +200); //Monto en bs 3
$pdf->Cell(25, 4, $montobs3, 0, 0, 'R');

$pdf->SetXY(+0.5, +203.5); //numero de codigo 4
$pdf->Cell(30, 10, $codigo4, 0, 0);

$pdf->SetXY(+176, +206.2); //Monto en bs 4
$pdf->Cell(25, 4, $montobs4, 0, 0, 'R');

$pdf->SetXY(+174, +209); //Total por pagar plan unico de cuentas
$pdf->Cell(30, 10, $totalporpagar, 0, 0);

$pdf->SetXY(+14, +230); //efectivo bs forma de pago
$pdf->Cell(8, 7, $efectivobs, 0, 0);

$pdf->SetXY(+61, +230); //bonos bs
$pdf->Cell(8, 7, $bonobs, 0, 0);

$pdf->SetXY(110, +230); //certificado 
$pdf->Cell(8, 7, $certificado, 0, 0);

$pdf->SetXY(170, +235); //certificado 
$pdf->Cell(30, 15,mb_convert_encoding($firma, 'ISO-8859-1', 'UTF-8') , 0, 0);

$pdf->SetXY(61, +250); //certificado 
$pdf->Cell(30, 15, '', 0, 0);


$pdf->Output();