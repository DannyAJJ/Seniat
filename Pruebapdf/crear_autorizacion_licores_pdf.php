<?php

require 'FPDF/fpdf.php';

$pdf = new FPDF('P','mm',array(215.9,355.6));
$pdf->AddPage();
$pdf->SetFont('Arial','B','12');
$pdf->SetLeftMargin(15);

$pdf->Sety(40);
$pdf->MultiCell('185','8',mb_convert_encoding('CONSTANCIA DE AUTORIZACIÓN PARA FÁBRICA DE ESPECIES ALCOHÓLICAS Y BEBIDAS ALCOHÓLICAS','ISO-8859-1','UTF-8'),1,'C',false);

$pdf->SetFont('Arial','','9');

$pdf->MultiCell('46.25','7',mb_convert_encoding('N DE REGISTRO'."\n".'350','ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+46.25,$y-14);
$pdf->MultiCell('46.25','7',mb_convert_encoding('FECHA DE REGISTRO'."\n".'27/5/2024','ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-14);
$pdf->MultiCell('44.5','7',mb_convert_encoding('N DE AUTORIZACION'."\n".'FC 00005','ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+137,$y-14);
$pdf->MultiCell('48','7',mb_convert_encoding('FECHA DE AUTORIZACION'."\n".'27/5/2024','ISO-8859-1','UTF-8'),1,'C',false);

$pdf->Ln();
$pdf->Cell('92.5','10',mb_convert_encoding('REGIÓN: CENTRAL','ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('GERENCIA REGIONAL DE TRIBUTOS INTERNOS','ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('RAZÓN SOCIAL: '.'EMPRESA','ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('N DE RIF: '.'UN RIF','ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('185','10',mb_convert_encoding('DIRECCIÓN: '.'EMPRESA','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->Cell('185','10',mb_convert_encoding('AUTORIZACIÓN QUE EJERCE: '.'EMPRESA','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->Cell('185','10',mb_convert_encoding('CLASIFICACIÓN E INDOLE QUE EJERCE: '.'EMPRESA','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->Cell('185','10',mb_convert_encoding('ADMINISTRADOR O REPRESENTANTE LEGAL: '.'EMPRESA','ISO-8859-1','UTF-8'),1,1,'C',false);

$pdf->MultiCell('46.25','7',mb_convert_encoding('NACIONALIDAD'."\n".'RESPUESTA','ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+46.25,$y-14);
$pdf->MultiCell('69.38','7',mb_convert_encoding('CEDULA DE IDENTIDAD:'."\n".'V28249780','ISO-8859-1','UTF-8'),1,'C',false);
$pdf->SetXY($x+115.63,$y-14);
$pdf->MultiCell('69.37','7',mb_convert_encoding('NUMERO DE RIF:'."\n".'J-28249780-4','ISO-8859-1','UTF-8'),1,'C',false);
$pdf->Cell('185','5',mb_convert_encoding('OBSERVACIONES:','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->MultiCell('185','7',mb_convert_encoding('lineas','ISO-8859-1','UTF-8'),1,'J',false);
$pdf->Cell('92.5','7',mb_convert_encoding('FIRMA AUTORIZADA:','ISO-8859-1','UTF-8'),1,0,'C',false);
$pdf->Cell('92.5','7',mb_convert_encoding('RECIBE CONFORME','ISO-8859-1','UTF-8'),1,1,'C',false);
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n"."Nombre\nCargo\nprovidencia\nGaceta"."\n\n\n".'segundafirma','ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-50);
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n"."     Nombre:\n     Firma:\n     Fecha:\n"."\n\n\n\n",'ISO-8859-1','UTF-8'),1,'L',false);

$pdf->Output();
?>