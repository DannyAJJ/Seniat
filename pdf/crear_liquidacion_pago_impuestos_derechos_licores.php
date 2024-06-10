<?php

require 'FPDF/fpdf.php';

$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B','8');
//$pdf->SetLeftMargin(15);

$pdf->Cell('196','7',mb_convert_encoding('PLANILLA DE LIQUIDACIÓN Y PAGO DE IMPUESTOS Y DERECHOS DE LICORES','ISO-8859-1','UTF-8'),0,1,'C',false);


$pdf->SetFont('Arial','','6');
$pdf->Cell('95','5',mb_convert_encoding('GERENCIA REGIONAL ___________________________________________________________','ISO-8859-1','UTF-8'),0,0,'L',false);
$pdf->Cell('58','5',mb_convert_encoding('Nº DE RIF','ISO-8859-1','UTF-8'),1,0,'L',false);
$X = $pdf->GetX();
$pdf->SetX($X+3.8);
$pdf->Cell('39.2','5',mb_convert_encoding('FECHA DE LIQUIDACIÓN','ISO-8859-1','UTF-8'),1,1,'C',false);


$pdf->Cell('95','5',mb_convert_encoding('LIQUIDACIÓN Nº  _______________________________________________________________','ISO-8859-1','UTF-8'),0,0,'L',false);
$pdf->Cell('58','5',mb_convert_encoding('VARIABLE','ISO-8859-1','UTF-8'),1,0,'L',false);
$X = $pdf->GetX();
$pdf->SetX($X+3.8);
$X = $pdf->GetX();
$pdf->Cell('13','2.5',mb_convert_encoding('Día','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13','2.5',mb_convert_encoding('Mes','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13.2','2.5',mb_convert_encoding('Año','ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->SetX($X);
$pdf->Cell('13','2.5',mb_convert_encoding('var','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13','2.5',mb_convert_encoding('var','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('13.2','2.5',mb_convert_encoding('var','ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->Output();
?>