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

$sql = "SELECT l.Numero_rif_solicitante, lq.Numero_manfiesto, l.Razon_social, l.Numero_autorizacion , l.Direccion, lq.Secuencial, lq.N_liquidacion, fl.Nombre_firmante FROM liquidacion_licores lq, licencia_licores l, firmante_liquidacion fl WHERE lq.Secuencial = '$secuencial' AND fl.Id_firmante = lq.Firmante AND lq.Fecha_liquidacion = '$fecharesolu' AND lq.Licencia = l.Numero_autorizacion;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$gerenciaregion = 'REGIÓN CENTRAL';
$liquidacion = '';
$rif = $row['Numero_rif_solicitante'];
$dialquidacion = substr($fecharesolu, 0, 2);
$mesliquidacion = substr($fecharesolu, 3, 2);
$añoliquidacion = substr($fecharesolu, -4);
$gcia = '10';
$ofiliq = '1';
$año = substr($fecharesolu, -4);
$aporoc = '1';
$tipoliq = '1';
$serie = '46';
$v = '1';
$numresolucion = '';
$nummanifiesto = $row['Numero_manfiesto'];
$fechamanifiesto = substr($fecharesolu, 0, 2) . '        ' . substr($fecharesolu, 3, 2) . '          ' . substr($fecharesolu, -2);
$razonsocial = $row['Razon_social'];
$numregistro = $row['Numero_autorizacion'];
$fechaformateada = DateTime::createFromFormat('d-m-Y', $fecharesolu);
$fechaformateada->modify('+1 day');
$fecharegistro =  $fechaformateada->format('d-m-Y');
$direccion = $row['Direccion'];
$nlq = $row['N_liquidacion'];
//Metodo POST
if ($_GET['tipo'] == '0') {
    $sql = "SELECT c.Nombre_producto, d.Litrovr, d.Frgl, d.Litroaa, d.Aa, d.Total_detalle FROM detalle_produccion_licores d, liquidacion_licores lq, clase_producto c WHERE lq.N_liquidacion = d.Id_liquidacion AND c.Id = d.Clase AND lq.N_liquidacion = '" . $row['N_liquidacion'] . "';";
    $result = $conn->query($sql);
    $claseproduccion = array_fill(1, 5, ' ');
    $litrovr = array_fill(1, 5, ' ');
    $frogl = array_fill(1, 5, ' ');
    $litroaa = array_fill(1, 5, ' ');
    $vr = array_fill(1, 5, ' ');
    $aa = array_fill(1, 5, ' ');
    $impuestoproduccion = array_fill(1, 5, ' ');
    $e = 1;
    while ($row = $result->fetch_assoc()) {
        $claseproduccion[$e] = $row['Nombre_producto'];
        $litrovr[$e] = $row['Litrovr'];
        $frogl[$e] = $row['Frgl'];
        $litroaa[$e] = $row['Litroaa'];
        $vr[$e] = $row['Litroaa'];
        $aa[$e] = $row['Aa'];
        $impuestoproduccion[$e] = $row['Total_detalle'];
        $e = $e + 1;
    }
    $sql = "SELECT SUM(Total_detalle) as 'total' FROM detalle_produccion_licores WHERE Id_liquidacion = '" . $nlq . "';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalpagarproduccion = $row['total'];
    $claseventapublico = array_fill(1, 14, ' ');
    $cantidadenvases = array_fill(1, 14, ' ');
    $capenvlistros = array_fill(1, 14, ' ');
    $pvpenvases = array_fill(1, 14, ' ');
    $litrosvr = array_fill(1, 14, ' ');
    $pvpltoprom = array_fill(1, 14, ' ');
    $total = '';
    $sobrepvplt = array_fill(1, 14, ' ');
    $impuestoventapublico = array_fill(1, 14, ' ');
    $totalporpagarvent = '';
    $codigo = '';
    $montobs = $totalpagarproduccion;
    $totalimpuesto = $totalpagarproduccion;
    $menosreintegro = '';
    $impuestoporpagar = $totalpagarproduccion;
    $validacionterminalbanco = '';
} else {
    $sql = "SELECT Clase, Cantidad_envases, Cap_env_litros, Pvp_envases, Litrosvr, Porcentaje_sobre_pvp, Total_detalle FROM detalle_pvp_licores dt, liquidacion_licores lq WHERE lq.N_liquidacion = dt.Id_liquidacion AND dt.Id_liquidacion = " . $nlq . ";";
    $result = $conn->query($sql);
    $claseproduccion = array_fill(1, 5, ' ');
    $litrovr = array_fill(1, 5, ' ');
    $frogl = array_fill(1, 5, ' ');
    $litroaa = array_fill(1, 5, ' ');
    $vr = array_fill(1, 5, ' ');
    $aa = array_fill(1, 5, ' ');
    $impuestoproduccion = array_fill(1, 5, ' ');
    $totalpagarproduccion = '';
    
    $claseventapublico = array_fill(1, 14, ' ');
    $cantidadenvases = array_fill(1, 14, ' ');
    $capenvlistros = array_fill(1, 14, ' ');
    $pvpenvases = array_fill(1, 14, ' ');
    $litrosvr = array_fill(1, 14, ' ');
    $pvpltoprom = array_fill(1, 14, ' ');
    $sobrepvplt = array_fill(1, 14, ' ');
    $impuestoventapublico = array_fill(1, 14, ' ');
    
    $e = 1;
    while ($row = $result->fetch_assoc()) {
        $claseventapublico[$e] = $row['Clase'];
        $cantidadenvases[$e] = $row['Cantidad_envases'];
        $capenvlistros[$e] = $row['Cap_env_litros'];
        $pvpenvases[$e] = $row['Pvp_envases'];
        $litrosvr[$e] = $row['Litrosvr'];
        $pvpltoprom[$e] = $row['Porcentaje_sobre_pvp'];
        $impuestoventapublico[$e] =$row['Total_detalle'];
        $e = $e + 1;
    }
    $sql = "SELECT SUM(Total_detalle) as 'total' FROM detalle_pvp_licores WHERE Id_liquidacion = '" . $nlq . "';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalporpagarvent = 'e';
    $codigo = '';
    $montobs = $row['total'];
    $total = $montobs;
    $totalimpuesto = $montobs;
    $menosreintegro = '';
    $impuestoporpagar = $montobs;
    $validacionterminalbanco = '';
}

//fin del metodo POST



$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '8');
//$pdf->SetBottomMargin(-5);
$pdf->SetAutoPageBreak(false);

//$pdf->Image('fondo.jpeg', 0, 0, 210, 297, '', '', '', '', false, false, 0);
$y = $pdf->GetY(); //ESPACIADO
$pdf->SetY($y + 27);

$pdf->SetFont('Arial', 'B', '9');

$pdf->Cell('196', '7', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);
$y = $pdf->GetY(); //ESPACIADO
$pdf->SetY($y + 3);

$pdf->SetFont('Arial', '', '6');

$pdf->Cell('95', '5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'L', false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY(23, 53);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell('30', '4', mb_convert_encoding('liquidaciones', 'ISO-8859-1', 'UTF-8'), 0, 1, 'L', false);
$pdf->SetXY(30, 48);
$pdf->Cell('30', '4', mb_convert_encoding('Region Central', 'ISO-8859-1', 'UTF-8'), 0, 1, 'L', false);
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial', '', '6');
$pdf->Cell('58', '3', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'L', false);
$X = $pdf->GetX();
$pdf->SetX($X + 3.8);
$pdf->Cell('39.2', '3', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);


$pdf->Cell('95', '7', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'L', false);
$pdf->Cell('58', '7', mb_convert_encoding($rif, 'ISO-8859-1', 'UTF-8'), 0, 0, 'L', false);
$X = $pdf->GetX();
$pdf->SetX($X + 3.8);
$X = $pdf->GetX();
$pdf->Cell('13', '2.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('13', '2.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('13.2', '2.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);

$pdf->SetX($X);
$pdf->Cell('13', '4.5', mb_convert_encoding($dialquidacion, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('13', '4.5', mb_convert_encoding($mesliquidacion, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('13.2', '4.5', mb_convert_encoding($añoliquidacion, 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);

$y = $pdf->GetY();
$pdf->SetY($y + 3);
$pdf->Cell('10', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('10', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('10', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('13', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('12', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('12', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('20', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('4', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);

$x = $pdf->GetX();
$pdf->SetX($x + 4);
$pdf->Cell('34', '3.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);

$x = $pdf->GetX();
$pdf->SetX($x+3);
$pdf->Cell('63','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->SetX($x-133);
$pdf->Cell('10','5.5',mb_convert_encoding('10','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('10','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('10','5.5',mb_convert_encoding($año,'ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('11.5','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('12','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('12','5.5',mb_convert_encoding('46','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('16','5.5',mb_convert_encoding($secuencial,'ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('5','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x + 9);
$pdf->Cell('34', '5.5', mb_convert_encoding($numresolucion, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$x = $pdf->GetX();
$pdf->SetX($x + 13);
$pdf->Cell('35', '5.5', mb_convert_encoding('' . '18', 'ISO-8859-1', 'UTF-8'), 0, 0, 'L', false);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell('28','2.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->SetXY($x-4,$y+2.5);
$pdf->Cell('28','3',mb_convert_encoding( $fechamanifiesto,'ISO-8859-1','UTF-8'),0,1,'C',false);


$y = $pdf->GetY();
$pdf->SetY($y + 3);

$pdf->Cell('105', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'L', false);

$x = $pdf->GetX();
$pdf->SetX($x + 4);
$pdf->Cell('23', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);

$x = $pdf->GetX();
$pdf->SetX($x + 4);
$pdf->Cell('60', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'L', false);
$pdf->SetX($x - 130);
$pdf->Cell('105', '7', mb_convert_encoding($razonsocial, 'ISO-8859-1', 'UTF-8'), 0, 0, 'L', false);

$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x,$y+2);
$pdf->Cell('23','5.5',mb_convert_encoding($numregistro,'ISO-8859-1','UTF-8'),0,0,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+15,$y);
$pdf->Cell('60','5.5',mb_convert_encoding($fecharegistro,'ISO-8859-1','UTF-8'),0,1,'L',false);


$y = $pdf->GetY();
$pdf->SetY($y+1);
$pdf->MultiCell('196','5',mb_convert_encoding(''."\n ". $direccion,'ISO-8859-1','UTF-8'),0,'L',false);


$y = $pdf->GetY();
$pdf->SetY($y + 3);
$pdf->Cell('130', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('6', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('60', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);
$pdf->Cell('21', '8', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('21', '8', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('21', '8', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('21', '8', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);

$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Cell('46', '4', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);
$pdf->SetXY($x, $y + 4);
$pdf->Cell('23', '4', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('23', '4', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
//$pdf->SetXY($x+23,$y);

$y = $pdf->GetY();
$pdf->SetXY(140,$y-4);
$pdf->Cell('6','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('60','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
//$e = 10;
//$o = 20;
for ($i = 1; $i <= 5; $i++) { //for de clase, litro. fr o gl y litro 
    $pdf->Cell(27, 4, mb_convert_encoding($claseproduccion[$i], 'ISO-8859-1', 'UTF-8') , 0, 0, 'L');
    $pdf->Cell(27, 4, $litrovr[$i], 0, 0, 'L');
    $pdf->Cell(24, 4, $frogl[$i], 0, 0, 'L');
    $pdf->Cell(24, 4, $litroaa[$i], 0, 0, 'L');
    $pdf->Cell(21, 4, $litroaa[$i], 0, 0, 'L');
    /*if ($i==2 || $i==3 || $i == 4) {
        $e = $e - 1;
        $o = $o + 1;
    }*/
    $pdf->Cell(23, 4, $aa[$i], 0, 0, 'L');
    $pdf->Cell(6, 4, '', 0, 0, 'L');
    $pdf->Cell(38, 4, $impuestoproduccion[$i], 0, 0, 'L');
    $pdf->Cell(5, 4, '', 0, 1, 'L');
    $y = $pdf->GetY();
}
$pdf->Cell(130,4,'',0,0,'C');
$pdf->Cell(22,4,'',0,0,'C');
$pdf->Cell(38,4,$totalpagarproduccion,0,0,'L');
$pdf->Cell(5,4,'',0,1,'C');

$y = $pdf->GetY();
$pdf->SetY($y + 3);
$pdf->Cell('130', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('6', '4.5', mb_convert_encoding('', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('60', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);
$pdf->Cell('21', '8', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetFont('Arial', '', '5');
$pdf->MultiCell(14.5, '4', mb_convert_encoding(" \n", 'ISO-8859-1', 'UTF-8'), 0, 'C', false);
$pdf->SetXY($x + 14.5, $y);
$pdf->MultiCell(14.5, '4', mb_convert_encoding(" \n ", 'ISO-8859-1', 'UTF-8'), 0, 'C', false);
$pdf->SetXY($x + 29, $y);
$pdf->MultiCell(14.5, '4', mb_convert_encoding(" \n ", 'ISO-8859-1', 'UTF-8'), 0, 'C', false);
$pdf->SetFont('Arial', '', '6');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x + 64.5, $y - 8);
$pdf->Cell(16.7, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', '', '5');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x, $y);
$pdf->MultiCell(14.5, '4', mb_convert_encoding(" \n ", 'ISO-8859-1', 'UTF-8'), 0, 'C', false);
$pdf->SetFont('Arial', '', '6');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x + 95.65, $y - 8);
$pdf->Cell(18.35, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', '', '5');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x, $y);
$pdf->MultiCell(16, '4', mb_convert_encoding(" \n ", 'ISO-8859-1', 'UTF-8'), 0, 'C', false);
$pdf->SetFont('Arial', '', '6');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x + 130, $y - 4.5);
$pdf->Cell(6, 8, '', 0, 0, 'C');
$pdf->Cell('60', '8', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);

//$e = 10;
//$o = 40;
for ($i = 1; $i <= 14; $i++) { //for de clase, litro. fr o gl y litro


    $pdf->Cell(25, 4, mb_convert_encoding($claseventapublico[$i], 'ISO-8859-1', 'UTF-8'),0, 0, 'L');
    $pdf->Cell(17, 4, $cantidadenvases[$i], 0, 0, 'L');
    $pdf->Cell(14.5, 4, $capenvlistros[$i], 0, 0, 'L');
    $pdf->Cell(19, 4, $pvpenvases[$i], 0, 0, 'L');
    $pdf->Cell(13, 4, $litrosvr[$i], 0, 0, 'L');
    $pdf->Cell(17.5, 4, '', 0, 0, 'L');
    $pdf->Cell(15.3, 4, '', 0, 0, 'L');
    $pdf->Cell(13, 4, $sobrepvplt[$i], 0, 0, 'L');
    $pdf->Cell(10, 4, '', 0, 0, 'L');
    $pdf->Cell(45.5, 4, $impuestoventapublico[$i], 0, 0, 'L');
    //$total = ((($canti * $pvpenvases) * $sobrepvplt) / $pvpenvases) +$total;
    $pdf->Cell(5, 4, '', 0, 1, 'L');
    $y = $pdf->GetY();
}

$x = $pdf->GetX();
$pdf->SetXY($x-10,$y-3);
$pdf->Cell(130, 4, '', 0, 0, 'C');
$pdf->Cell(55, 4, $total, 0, 1, 'C');
$pdf->Cell(330, 4,'', 0, 1, 'C');

$y = $pdf->GetY(); //ESPACIADO
$pdf->SetY($y + 1.5);

$pdf->Cell('196', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);
$pdf->Cell('27', '4', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell(103, 4, '', 0, 0, 'C');
$pdf->Cell(6, 4, '', 0, 0, 'C');
$pdf->Cell(55, 4, '', 0, 1, 'C');

for ($i = 1; $i <= 3; $i++) { //for de clase, litro. fr o gl y litro 
    $pdf->Cell(27, 4, $codigo, 0, 0, 'C');
    $pdf->Cell(103, 4, '', 0, 0, 'l');
    $pdf->Cell(6, 4, '', 0, 0, 'C');
    $pdf->Cell(55, 4, '', 0, 0, 'C');
    $pdf->Cell(5, 4, '', 0, 1, 'C');
    $y = $pdf->GetY();
}

$pdf->Cell(130, 4, '', 0, 0, 'C');
$pdf->Cell(6, 4, '', 0, 0, 'C');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x,$y-1.5);
$pdf->Cell(55, 4, $totalimpuesto, 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 1, 'C');
$pdf->Cell(130, 4, '', 0, 0, 'C');
$pdf->Cell(6, 4, '', 0, 0, 'C');
$pdf->Cell(55, 4, $menosreintegro, 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 1, 'C');
$pdf->Cell(130, 4, '', 0, 0, 'C');
$pdf->Cell(6, 4, '', 0, 0, 'C');
$pdf->Cell(55, 4, $totalporpagarvent, 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 1, 'C');

$y = $pdf->GetY(); //ESPACIADO
$pdf->SetY($y+5);

$pdf->Cell('125', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('71', '4.5', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);
$pdf->Cell('125', '10', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C', false);
$pdf->Cell('71', '10', mb_convert_encoding('$firma', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C', false);








$pdf->Output();
