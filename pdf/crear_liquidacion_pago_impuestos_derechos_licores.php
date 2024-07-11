<?php

require 'FPDF/fpdf.php';


//Metodo POST

$gerenciaregion = '';
$liquidacion = '';
$rif = '';
$dialquidacion = '';
$mesliquidacion = '';
$añoliquidacion = '';
$gcia = '';
$ofiliq = '';
$año = '';
$aporoc = '';
$tipoliq = '';
$serie = '';
$secuencial = '';
$v = '';
$numresolucion = '';
$nummanifiesto = '';
$fechamanifiesto = '';
$razonsocial = '';
$numregistro = '';
$fecharegistro = '';
$direccion = '';
$claseproduccion = '';
$litrovr = '';
$frogl = '';
$litroaa = '';
$vr = '';
$aa = '';
$impuestoproduccion = '';
$totalpagarproduccion = '';
$claseventapublico = '';
$cantidadenvases = '';
$capenvlistros = '';
$pvpenvases = '';
$litrosvr = '';
$pvpltoprom = '';
$total = '';
$sobrepvplt = '';
$impuestoventapublico = '';
$totalporpagarvent = '';
$codigo = '';
$montobs = '';
$totalimpuesto = '';
$menosreintegro = '';
$impuestoporpagar = '';
$validacionterminalbanco = '';

//fin del metodo POST



$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B','8');
//$pdf->SetBottomMargin(-5);
$pdf->SetAutoPageBreak(false);

//$pdf->Image('fondo.jpeg', 0, 0, 210, 297, '', '', '', '', false, false, 0);
$y = $pdf->GetY();//ESPACIADO
$pdf-> SetY($y+27);

$pdf->SetFont('Arial','B','9');

$pdf->Cell('196','7',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$y = $pdf->GetY();//ESPACIADO
$pdf-> SetY($y+3);

$pdf->SetFont('Arial','','6');

$pdf->Cell('95','5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'L',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf-> SetXY(23,53);
$pdf->SetFont('Arial','','8');
$pdf->Cell('30','4',mb_convert_encoding('liquidaciones','ISO-8859-1','UTF-8'),0,1,'L',false);
$pdf-> SetXY(30,48);
$pdf->Cell('30','4',mb_convert_encoding('Region Central','ISO-8859-1','UTF-8'),0,1,'L',false);
$pdf-> SetXY($x,$y);
$pdf->SetFont('Arial','','6');
$pdf->Cell('58','3',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'L',false);
$X = $pdf->GetX();
$pdf->SetX($X+3.8);
$pdf->Cell('39.2','3',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);


$pdf->Cell('95','7',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'L',false);
$pdf->Cell('58','7',mb_convert_encoding($rif,'ISO-8859-1','UTF-8'),0,0,'L',false);
$X = $pdf->GetX();
$pdf->SetX($X+3.8);
$X = $pdf->GetX();
$pdf->Cell('13','2.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('13','2.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('13.2','2.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);

$pdf->SetX($X);
$pdf->Cell('13','4.5',mb_convert_encoding($dialquidacion,'ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('13','4.5',mb_convert_encoding($mesliquidacion,'ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('13.2','4.5',mb_convert_encoding($añoliquidacion,'ISO-8859-1','UTF-8'),0,1,'C',false);

$y = $pdf->GetY();
$pdf->SetY($y+3);
$pdf->Cell('10','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('10','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('10','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('13','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('12','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('12','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('20','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('4','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('34','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+3);
$pdf->Cell('63','3.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->SetX($x-133);
$pdf->Cell('10','5.5',mb_convert_encoding('10','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('10','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('10','5.5',mb_convert_encoding($año,'ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('12','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('12','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('12','5.5',mb_convert_encoding('46','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('16','5.5',mb_convert_encoding($secuencial,'ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('5','5.5',mb_convert_encoding('1','ISO-8859-1','UTF-8'),0,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+9);
$pdf->Cell('34','5.5',mb_convert_encoding($numresolucion,'ISO-8859-1','UTF-8'),0,0,'C',false);
$x = $pdf->GetX();
$pdf->SetX($x+13);
$pdf->Cell('35','5.5',mb_convert_encoding(''. '18','ISO-8859-1','UTF-8'),0,0,'L',false);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell('28','2.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->SetXY($x-6,$y+4);
$pdf->Cell('28','3',mb_convert_encoding( $fechamanifiesto,'ISO-8859-1','UTF-8'),0,1,'C',false);


$y = $pdf->GetY();
$pdf->SetY($y+3);

$pdf->Cell('105','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'L',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('23','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('60','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'L',false);
$pdf->SetX($x-130);
$pdf->Cell('105','7',mb_convert_encoding($razonsocial,'ISO-8859-1','UTF-8'),0,0,'L',false);

$x = $pdf->GetX();
$pdf->SetX($x);
$pdf->Cell('23','5.5',mb_convert_encoding($numregistro,'ISO-8859-1','UTF-8'),0,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+10);
$pdf->Cell('60','5.5',mb_convert_encoding($fecharegistro,'ISO-8859-1','UTF-8'),0,1,'L',false);


$y = $pdf->GetY();
$pdf->SetY($y+3);
$pdf->MultiCell('196','5',mb_convert_encoding(''."\n ". $direccion,'ISO-8859-1','UTF-8'),0,'L',false);


$y = $pdf->GetY();
$pdf->SetY($y+3);
$pdf->Cell('130','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('6','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('60','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);

$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Cell('46','4',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->SetXY($x,$y+4);
$pdf->Cell('23','4',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('23','4',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
//$pdf->SetXY($x+23,$y);

$y = $pdf->GetY();
$pdf->SetXY(140,$y-1);
$pdf->Cell('6','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('60','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
//$e = 10;
//$o = 20;
for($i=1;$i<=5;$i++){ //for de clase, litro. fr o gl y litro 
    $pdf->Cell(27,4,$claseproduccion,0,0,'L');
    $pdf->Cell(27,4,$litrovr,0,0,'L');
    $pdf->Cell(24,4,$frogl,0,0,'L');
    $pdf->Cell(24,4,$litrovr * $frogl / 100,0,0,'L');
    $pdf->Cell(21,4,$$litrovr * $frogl / 100,0,0,'L');
    /*if ($i==2 || $i==3 || $i == 4) {
        $e = $e - 1;
        $o = $o + 1;
    }*/
    $pdf->Cell(23,4,'$aa',0,0,'L');
    $pdf->Cell(6,4,'',0,0,'L');
    $pdf->Cell(38,4,($litrovr * $frogl / 100) * $aa,0,0,'L');
    $pdf->Cell(5,4,'',0,1,'L');
    $y = $pdf->GetY();
    
}
$pdf->Cell(130,4,'',0,0,'C');
$pdf->Cell(6,4,'',0,0,'C');
$pdf->Cell(50,4,$totalpagarproduccion,0,0,'C');
$pdf->Cell(5,4,'',0,1,'C');

$y = $pdf->GetY();
$pdf-> SetY($y+3);
$pdf->Cell('130','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('6','4.5',mb_convert_encoding('','UTF-8'),0,0,'C',false);
$pdf->Cell('60','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetFont('Arial','','5');
$pdf->MultiCell(14.5,'4',mb_convert_encoding(" \n",'ISO-8859-1','UTF-8'),0,'C',false);
$pdf-> SetXY($x+14.5,$y);
$pdf->MultiCell(14.5,'4',mb_convert_encoding(" \n ",'ISO-8859-1','UTF-8'),0,'C',false);
$pdf-> SetXY($x+29,$y);
$pdf->MultiCell(14.5,'4',mb_convert_encoding(" \n ",'ISO-8859-1','UTF-8'),0,'C',false);
$pdf->SetFont('Arial','','6');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+64.5,$y-8);
$pdf->Cell(16.7,8,'',0,0,'C');
$pdf->SetFont('Arial','','5');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf-> SetXY($x,$y);
$pdf->MultiCell(14.5,'4',mb_convert_encoding(" \n ",'ISO-8859-1','UTF-8'),0,'C',false);
$pdf->SetFont('Arial','','6');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+95.65,$y-8);
$pdf->Cell(18.35,8,'',0,0,'C');
$pdf->SetFont('Arial','','5');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf-> SetXY($x,$y);
$pdf->MultiCell(16,'4',mb_convert_encoding(" \n ",'ISO-8859-1','UTF-8'),0,'C',false);
$pdf->SetFont('Arial','','6');
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+130,$y-4.5);
$pdf->Cell(6,8,'',0,0,'C');
$pdf->Cell('60','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);

//$e = 10;
//$o = 40;
for($i=1;$i<=14;$i++){ //for de clase, litro. fr o gl y litro
    

    $pdf->Cell(25,4,$claseven,0,0,'L');
    $pdf->Cell(17,4,$canti,0,0,'L');
    $pdf->Cell(14.5,4,$capenvli,0,0,'L');
    $pdf->Cell(19,4,$pvpenvases,0,0,'L');
    $pdf->Cell(13,4,$canti * $capenvli,0,0,'L');
    $pdf->Cell(17.5,4,'',0,0,'L');
    $pdf->Cell(15.3,4,$canti * $pvpenvases,0,0,'L');
    $pdf->Cell(13,4,$sobrepvplt,0,0,'L');
    $pdf->Cell(10,4,'',0,0,'L');
    $pdf->Cell(45.5,4,(($canti * $pvpenvases) * $sobrepvplt) / $pvpenvases,0,0,'L');
    //$total = ((($canti * $pvpenvases) * $sobrepvplt) / $pvpenvases) +$total;
    $pdf->Cell(5,4,'',0,1,'L');
    $y = $pdf->GetY();
}
$pdf->Cell(130,4,'',0,0,'C');
$pdf->Cell(6,4,'',0,0,'C');
$pdf->Cell(50,4,'',0,1,'C');
$pdf->Cell(330,4,$total,0,1,'C');

$y = $pdf->GetY();//ESPACIADO
$pdf-> SetY($y+1.5);

$pdf->Cell('196','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->Cell('27','4',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell(103,4,'',0,0,'C');
$pdf->Cell(6,4,'',0,0,'C');
$pdf->Cell(60,4,'',0,1,'C');

for($i=1;$i<=3;$i++){ //for de clase, litro. fr o gl y litro 
    $pdf->Cell(27,4,$codigo,0,0,'C');
    $pdf->Cell(103,4,'',0,0,'l');
    $pdf->Cell(6,4,'',0,0,'C');
    $pdf->Cell(55,4,$montobs,0,0,'C');
    $pdf->Cell(5,4,'',0,1,'C');
    $y = $pdf->GetY();
}

$pdf->Cell(130,4,'',0,0,'C');
$pdf->Cell(6,4,'',0,0,'C');
$pdf->Cell(55,4,$totalimpuesto,0,0,'C');
$pdf->Cell(5,4,'',0,1,'C');
$pdf->Cell(130,4,'',0,0,'C');
$pdf->Cell(6,4,'',0,0,'C');
$pdf->Cell(55,4,$menosreintegro,0,0,'C');
$pdf->Cell(5,4,'',0,1,'C');
$pdf->Cell(130,4,'',0,0,'C');
$pdf->Cell(6,4,'',0,0,'C');
$pdf->Cell(55,4,$totalporpagarvent,0,0,'C');
$pdf->Cell(5,4,'',0,1,'C');

$y = $pdf->GetY();//ESPACIADO
$pdf-> SetY($y-1);

$pdf->Cell('125','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('71','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),0,1,'C',false);
$pdf->Cell('125','10',mb_convert_encoding($validacionterminalbanco,'ISO-8859-1','UTF-8'),0,0,'C',false);
$pdf->Cell('71','10',mb_convert_encoding($firma,'ISO-8859-1','UTF-8'),0,1,'C',false);








$pdf->Output();
?>