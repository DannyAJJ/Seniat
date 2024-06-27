<?php

require 'FPDF/fpdf.php';


//Metodo POST
/*
$gerenciaregional = $_POST[''];
$rif = $_POST[''];
$gcia = $_POST[''];
$ofiliq = $_POST[''];
$año = $_POST[''];
$aporoc = $_POST[''];
$tipoliq = $_POST[''];
$serie = $_POST[''];
$secuencial = $_POST[''];
$v = $_POST[''];
$resolucionnum = $_POST[''];
$fecharesolu = $_POST[''];
$razonsocial = $_POST[''];
$fechagarantia = $_POST[''];
$direccion = $_POST[''];
$fechavencimiento = $_POST[''];
$marca = $_POST[''];
$unidad = $_POST[''];
$cantidad = $_POST[''];
$pvp = $_POST[''];
$venta = $_POST[''];
$impuesto = $_POST[''];
$totaventa= $_POST[''];
$totalimpuesto = $_POST[''];
$codigo1 = $_POST[''];
$codigo2 = $_POST[''];
$codigo3 = $_POST[''];
$codigo4 = $_POST[''];
$montobs1 = $_POST[''];
$montobs2 = $_POST[''];
$montobs3 = $_POST[''];
$montobs4 = $_POST[''];
$totalporpagar = $_POST[''];
$efectivobs = $_POST[''];
$bonobs = $_POST[''];
$certificado = $_POST[''];
$firma = $_POST[''];
$validacion = $_POST[''];
*/
//fin de metodo POST


$pdf = new FPDF('p','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

$pdf->SetAutoPageBreak(true,0);

$pdf->SetXY(+45.25,+30.5);//gerencia regional
$pdf->Cell(30,10,'$gerenciaregional',0,0,'l');

$pdf->SetXY(+147.25,+30.5);// rif
$pdf->Cell(30,10,'$rif',0,0);

$pdf->SetFont('Arial','',6);
$pdf->SetXY(+4,+45.5);//liquidacion
$pdf->Cell(5,10,'$gcia',0,0);
$pdf->SetXY(+8,+45.5);//liquidacion
$pdf->Cell(5,10,'$ofiliq',0,0);
$pdf->SetXY(+12,+45.5);//liquidacion
$pdf->Cell(5,10,'$año',0,0);
$pdf->SetXY(+16,+45.5);//liquidacion
$pdf->Cell(5,10,'$aporoc',0,0);
$pdf->SetXY(+20,+45.5);//liquidacion
$pdf->Cell(5,10,'$tipoliq',0,0);
$pdf->SetXY(+24,+45.5);//liquidacion
$pdf->Cell(5,10,'40',0,0);
$pdf->SetXY(+30,+45.5);//liquidacion
$pdf->Cell(15,10,'$secuencial',0,0);
$pdf->SetXY(+43,+45.5);//liquidacion
$pdf->Cell(5,10,'$v',0,0);

$pdf->SetFont('Arial','',9);

$pdf->SetXY(+110,+45.5);//resolucion
$pdf->Cell(30,10,'$resolucionnum',0,0);

$pdf->SetXY(+182,+45.5);//liquidacion
$pdf->Cell(30,10,'$fechagarantia',0,0);

$pdf->SetXY(+4,+56.5);//razon social
$pdf->Cell(30,10,'$razonsocial',0,0);

$pdf->SetXY(+163,+56.5);//fecha de garantia
$pdf->Cell(30,10,'$fechagarantia',0,0);

$pdf->SetXY(+4,+64.5);//direccion
$pdf->Cell(30,10,'$direccion',0,0);

$pdf->SetXY(+163,+64.5);//fecha de vencimiento
$pdf->Cell(30,10,'$fechavencimiento',0,0);
$y= 82.8;
for($i=1;$i<=12;$i++){ //for de marca, venta y impuesto
    $pdf->SetXY(+6,+ $y);
    $pdf->Cell(49,6.54,'$marca',0,0);
    $pdf->Cell(17,6.54,'$unidad',0,0,'C');
    $pdf->Cell(16,6.54,'$cantidad',0,0,'C');
    $pdf->Cell(18,6.54,'$pvp',0,0,'C');
    $x = $pdf-> GetX();
    $pdf->SetX($x+8);
    $pdf->Cell(34.5,6.54,'$pvp * $cantidad',0,0,'R');
    $x = $pdf-> GetX();
    $pdf->SetX($x+17);
    $pdf->Cell(35.5,6.54,'($pvp * $cantidad) * 0.7',0,1,'R');
    //$totalventa = $totalventa + $pvp * $cantidad
    //$totalimpuesto = $totalimpuesto  + (($pvp * $cantidad) * 0.7)
    $y = $pdf->GetY();
}
$pdf->SetXY(+114    ,+161.5);//total venta
$pdf->Cell(35,6,'$totaventa',0,0,'R');

$pdf->SetXY(+167,+167.5);//total impuesto
$pdf->Cell(40,6,'$totalimpuesto',0,0,'R');

$pdf->SetXY(+0.5,+184);//numero de codigo 1
$pdf->Cell(30,10,'$codigo1',0,0);

$pdf->SetXY(+176,+187.3);//Monto en bs 1
$pdf->Cell(25,4,'$totalimpuesto',0,0,'R'); 

$pdf->SetXY(+0.5,+190.5);//numero de codigo 2
$pdf->Cell(30,10,'$codigo2',0,0);

$pdf->SetXY(+176,+193.6);//Monto en bs 2
$pdf->Cell(25,4,'$montobs2',0,0,'R');

$pdf->SetXY(+0.5,+197.2);//numero de codigo 3
$pdf->Cell(30,10,'$codigo3',0,0);

$pdf->SetXY(+176,+200);//Monto en bs 3
$pdf->Cell(25,4,'$montobs3',0,0,'R');

$pdf->SetXY(+0.5,+203.5);//numero de codigo 4
$pdf->Cell(30,10,'$codigo4',0,0);

$pdf->SetXY(+176,+206.2);//Monto en bs 4
$pdf->Cell(25,4,'$montobs4',0,0,'R');

$pdf->SetXY(+174,+209);//Total por pagar plan unico de cuentas
$pdf->Cell(30,10,'$totalporpagar',0,0);

$pdf->SetXY(+14,+230);//efectivo bs forma de pago
$pdf->Cell(8,7,'$efectivobs',0,0);

$pdf->SetXY(+61,+230);//bonos bs
$pdf->Cell(8,7,'$bonobs',0,0);

$pdf->SetXY(110,+230);//certificado 
$pdf->Cell(8,7,'$certificado',0,0);

$pdf->SetXY(170,+235);//certificado 
$pdf->Cell(30,15,'$firma',0,0);

$pdf->SetXY(61,+250);//certificado 
$pdf->Cell(30,15,'$validacion',0,0);


$pdf->Output();

?>