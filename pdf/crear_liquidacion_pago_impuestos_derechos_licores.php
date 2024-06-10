<?php

require 'FPDF/fpdf.php';

$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B','8');
//$pdf->SetLeftMargin(15);

$pdf->Cell('196','7',mb_convert_encoding('PLANILLA DE LIQUIDACIÓN Y PAGO DE IMPUESTOS Y DERECHOS DE LICORES','ISO-8859-1','UTF-8'),0,1,'C',false);


$pdf->SetFont('Arial','','6');
$pdf->Cell('95','5',mb_convert_encoding('GERENCIA REGIONAL ___________________________________________________________','ISO-8859-1','UTF-8'),0,0,'L',false);
$pdf->Cell('58','3',mb_convert_encoding('Nº DE RIF','ISO-8859-1','UTF-8'),1,0,'L',false);
$X = $pdf->GetX();
$pdf->SetX($X+3.8);
$pdf->Cell('39.2','3',mb_convert_encoding('FECHA DE LIQUIDACIÓN','ISO-8859-1','UTF-8'),1,1,'C',false);


$pdf->Cell('95','7',mb_convert_encoding('LIQUIDACIÓN Nº  _______________________________________________________________','ISO-8859-1','UTF-8'),0,0,'L',false);
$pdf->Cell('58','7',mb_convert_encoding('VARIABLE','ISO-8859-1','UTF-8'),1,0,'L',false);
$X = $pdf->GetX();
$pdf->SetX($X+3.8);
$X = $pdf->GetX();
$pdf->Cell('13','2.5',mb_convert_encoding('Día','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13','2.5',mb_convert_encoding('Mes','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13.2','2.5',mb_convert_encoding('Año','ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->SetX($X);
$pdf->Cell('13','4.5',mb_convert_encoding('var','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13','4.5',mb_convert_encoding('var','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13.2','4.5',mb_convert_encoding('var','ISO-8859-1','UTF-8'),1,1,'C',false);

$y = $pdf->GetY();
$pdf->SetY($y+3);
$pdf->Cell('10','3.5',mb_convert_encoding('GCIA.','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('10','3.5',mb_convert_encoding('QFI.LIQ','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('10','3.5',mb_convert_encoding('AÑO','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13','3.5',mb_convert_encoding('NºAPORC.','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('12','3.5',mb_convert_encoding('TIPOLIQ','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('12','3.5',mb_convert_encoding('SERIE','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('20','3.5',mb_convert_encoding('Nº SECUENCIAL','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('4','3.5',mb_convert_encoding('V','ISO-8859-1','UTF-8'),1,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('34','3.5',mb_convert_encoding('RESOLUCIÓN Nº','ISO-8859-1','UTF-8'),1,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('63','3.5',mb_convert_encoding('MANIFIESTO','ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->Cell('10','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('10','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('10','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('12','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('12','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('20','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('4','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('34','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('35','5.5',mb_convert_encoding('Nº','ISO-8859-1','UTF-8'),1,0,'L',false);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell('28','2.5',mb_convert_encoding('FECHA','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->SetXY($x,$y+2.5);
$pdf->Cell('28','3',mb_convert_encoding('  /           /  ','ISO-8859-1','UTF-8'),1,1,'C',false);


$y = $pdf->GetY();
$pdf->SetY($y+3);

$pdf->Cell('105','4.5',mb_convert_encoding('APELLIDOS Y NOMBRES - NOMBRE O RAZÓN SOCIAL','ISO-8859-1','UTF-8'),1,0,'L',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('23','4.5',mb_convert_encoding('Nº DE REGISTRO','ISO-8859-1','UTF-8'),1,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('60','4.5',mb_convert_encoding('FECHA','ISO-8859-1','UTF-8'),1,1,'L',false);

$pdf->Cell('105','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'L',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('23','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);

$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell('60','5.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,1,'L',false);


$y = $pdf->GetY();
$pdf->SetY($y+3);
//$pdf->Cell('196','10',mb_convert_encoding('DIRECCIÓN:'.'','ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->MultiCell('196','5',mb_convert_encoding('DIRECCIÓN:'."\n ",'ISO-8859-1','UTF-8'),1,'L',false);


$y = $pdf->GetY();
$pdf->SetY($y+3);
$pdf->Cell('130','4.5',mb_convert_encoding('IMPUESTOS SOBRE PRODUCCIÓN','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('6','4.5',mb_convert_encoding('COD','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('60','4.5',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('CLASE','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('LITRO V.R.','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('F.R. O G.L.','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('21','8',mb_convert_encoding('LITRO A.A.','ISO-8859-1','UTF-8'),1,0,'C',false);

$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->Cell('46','4',mb_convert_encoding('IMP.S/LITROS(Bs.)','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->SetXY($x,$y+4);
$pdf->Cell('23','4',mb_convert_encoding('V.R.','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('23','4',mb_convert_encoding('A.A.','ISO-8859-1','UTF-8'),1,0,'C',false);
//$pdf->SetXY($x+23,$y);

$y = $pdf->GetY();
$pdf->SetXY(140,$y-4);
$pdf->Cell('6','8',mb_convert_encoding('','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('60','8',mb_convert_encoding('IMPUESTOS O DERECHOS (Bs.)','ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->Output();
?>