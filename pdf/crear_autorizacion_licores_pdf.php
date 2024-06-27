<?php

require 'FPDF/fpdf.php';
/*


metodo post


*/

$N_registro='';
$Fecha_registro=$fechahoy;
$N_autorizacion=$sigla.' '.$ultimoValor;
$Fecha_autorizacion=$fechahoy;
$Razon_social=$nombre;
$N_rif=$rifempresa;
$Direccion=$direccion;
$Autorizacion_ejerce='INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS';
$Clasificacion_indole='';
$Representante_legal=$nombrerepresentante;
$Nacionalidad_representante='';
$Cedula_representante=$cedularepresentante;
$N_rif_representante=$rif;
$Observaciones='Por cuánto el contribuyente arriba indicado, ha cumplido con los requisitos exigidos por la ley de impuesto sobre alcohol y especies alcohólicas y su reglamento, se le concede la presente AUTORIZACIÓN DE FÁBRICA DE ESPECIES ALCOHÓLICAS de acuerdo a las especificaciones contenidas en el respectivo registro.'."\n\nNOTA: De conformidad con el artículo 10 dela de la ley del timbre Fiscal los contribuyentes deben renovar su Registro de Expendio de Alcohol y Especies Alcohólicas anualmente antes de la fecha en la que fue entregado el Registro, asi como cumplir con todos los tramites que modifiquen el mismo conforme a la ley de Impuesto Sobre Alcohol y Especies Alcohólicas y su Reglamento en caso contrario, serán sancionados de acuerdo a lo establecido en el artículo 108 del Código Organico Tributario Vigente. Resuelve conceder la correspondiente autorización.";
$Firmante='';
$Segundo_firmante='';

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
$pdf->MultiCell('48','7',mb_convert_encoding('FECHA DE AUTORIZACION'."\n".$N_autorizacion,'ISO-8859-1','UTF-8'),1,'C',false);

$pdf->Ln();
$pdf->Cell('92.5','10',mb_convert_encoding('REGIÓN: CENTRAL','ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('GERENCIA REGIONAL DE TRIBUTOS INTERNOS','ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('RAZÓN SOCIAL: '.$Razon_social,'ISO-8859-1','UTF-8'),1,0,'L',false);
$pdf->Cell('92.5','10',mb_convert_encoding('N DE RIF: '.$N_rif,'ISO-8859-1','UTF-8'),1,1,'L',false);
$pdf->Cell('185','10',mb_convert_encoding('DIRECCIÓN: '.$Direccion,'ISO-8859-1','UTF-8'),1,1,'C',false);
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
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n".$Firmante[0]."\n".$Firmante[1]."\n".$Firmante[2]."\n".$Firmante[3]."\n\n\n".'segundafirma','ISO-8859-1','UTF-8'),1,'C',false);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x+92.5,$y-50);
$pdf->MultiCell('92.5','5',mb_convert_encoding("\n\n\n"."     Nombre:\n     Firma:\n     Fecha:\n"."\n\n\n\n",'ISO-8859-1','UTF-8'),1,'L',false);

$pdf->Output();
?>