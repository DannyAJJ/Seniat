<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
<title>Planilla de Liquidación</title>

</head>
<body>

<h1>Planilla de Liquidación y Pago de Impuestos y Derechos de Licores</h1>

<table width="50%" align="center">
  <tr>
    <th width="400">GERENCIA REGIONAL</th>
    <td colspan="5"><input type="text" placeholder="Gerencia general"></td>
  </tr>
  <tr>
    <th>LIQUIDACIÓN N°</th>
    <td colspan="5"><input type="text" placeholder="Liquidacion"></td>
  </tr>

  <tr> 
    <td colspan="1"><div align="center"><font color="red" size="4"><strong>03</strong></font></div> N° DE RIF</td>
    <td colspan="5"><input type="text" placeholder="N° de rif"></td>
  </tr>

  <tr>
    <td colspan="1">FECHA DE LIQUIDACIÓN</td>
    <td><input type="text" placeholder="Dia"></td>
    <td><input type="text" placeholder="Mes"></td>
    <td><input type="text" placeholder="Año"></td>
  </tr>
  <tr>
    <th colspan="1">GCIA.</th>
    <th colspan="1">OFI.LIQ</th>
    <th colspan="1">AÑO</th>
    <th colspan="1">N°PORC.</th>
    <th colspan="1">TIPOLIQ</th>
    <th colspan="1">SERIE</th>
  </tr>
  <tr>
    <td colspan="1"><input type="text" placeholder="GCIA"></td>
    <td colspan="1"><input type="text" placeholder="OFI.LIQ"></td>
    <td colspan="1"><input type="text" placeholder="AÑO"></td>
    <td colspan="1"><input type="text" placeholder="N° PORC"></td>
    <td colspan="1"><input type="text" placeholder="TIPO LIQ"></td>
    <td colspan="1"><input type="text" placeholder="SERIE"></td>
  </tr>
  <tr>
    <td colspan="1">RESOLUCION N°</td>
    <td colspan="5"><input type="text" placeholder="Num de resolucion"></td>
  </tr>

  <tr>
    <td colspan="1"><div align="center"><font color="red" size="4"><strong>09</strong></font></div> MANIFIESTO</td>
    <td colspan="1"><input type="text" placeholder="N°"></td>
    <td colspan="1">FECHA</td>
    <td colspan="1"><input type="text" placeholder="Dia"></td>
    <td colspan="1"><input type="text" placeholder="Mes"></td>
    <td colspan="1"><input type="text" placeholder="Año"></td>
  </tr>
    <td colspan="1"><div align="center"><font color="red" size="4"><strong>01</strong></font></div> APELLIDOS Y NOMBRES - NOMBRE O RAZÓN SOCIAL</td>
    <td colspan="5"><input type="text" placeholder="Apellidos y nombres- Razon social"></td>
  </tr>

  <tr>
    <td colspan="1"><div align="center"><font color="red" size="4"><strong>06</strong></font></div> DIRECCIÓN:</td>
    <td colspan="5"><input type="text" placeholder="Direccion"></td>
  </tr>

  <tr>

    <td><div align="center"><font color="red" size="4"><strong>08</strong></font></div> N° DE REGISTRO</td>
    <td colspan="5"><input type="text" placeholder="Num de registro"></td>

  </tr>

  <tr>
    <td colspan="1">FECHA</td>
    <td colspan="1"><input type="text" placeholder="Dia"></td>
    <td colspan="1"><input type="text" placeholder="Mes"></td>
    <td colspan="1"><input type="text" placeholder="Año"></td>
  </tr>
</table>

<table width="50%" align="center">
  
  </tr>
  <tr>
    <th colspan="6">IMPUESTOS SOBRE PRODUCCIÓN</th>


    <th colspan="1">COD</th>

    <TH colspan="2"></TH>
  </tr>
  <tr>
    <th rowspan="2">CLASE</th>
    <th rowspan="2">LITRO V.R.</th>
    <th rowspan="2">F.R. o G.L.</th>
    <th rowspan="2">LITRO A.A.</th>
    <th colspan="2">IMP.S/LITROS(Bs)</th>
    <th rowspan="2">COD</th>
    <th rowspan="2" colspan="3">IMPUESTO O DERECHOS (Bs.)</th>
  </tr>
  <tr>
    <td>V.R.</td>
    <td>A.A.</td>
    
  </tr>

  <?php

$codigos = array(
  1 => 9,
  2 => 7,
  3 => 5,
  4 => 3,
  5 => 2
);
$codigos1 = array(
  1 => 21,
  2 => 23,
  3 => 25,
  4 => 27,
  5 => 28
);


  for($i=1;$i<=5;$i++){
  echo '<tr>
  <td><input type="text" size="15" placeholder="Clase"></td>
  <td><input type="text" placeholder="Litro V.R"></td>
  <td><input type="text" placeholder="F.R o G.L"></td>
  <td><input type="text" placeholder="Litro A.A."></td>
  <td><input type="text" placeholder="V.R"></td>
  <td><input type="text" placeholder="A.A"></td>
  <td>'.$codigos1[$i].'</td>
  <td><input type="text" placeholder="Impuesto o Derecho"></td>
  <td width="30">'.$codigos[$i].'</td>
</tr>';
  }
  ?>

  
  <tr>
    <td colspan="6">TOTAL POR PAGAR (29=21+23+25+27+28)</td>
    <td>29</td>
    <td><input type="text" placeholder="Impuesto o Derecho Total"></td>
    <td>1</td>
  </tr>
</table>

<table width="50%" align="center">
  <tr>
    <th colspan="8">IMPUESTOS SOBRE PRECIO VENTA AL PÚBLICO</th>
    <th>cod</th>
    <th colspan="2"></th>

  </tr>
  <tr>
    <th width="100">CLASE</th>
    <th>CANTIDAD DE ENVASES</th>
    <th>CAP./ENV. LITROS</th>
    <th>P.V.P. ENVASES (Bs.)</th>
    <th>LITROS V.R.</th>
    <th>P.V.P./LT O PROM. (Bs.)</th>
    <th>TOTAL</th>
    <th>% SOBRE P.V.P / LT.</th>
    <th width="50">Cod</th>
    <th colspan="2">IMPUESTOS O DERECHOS (Bs)</th>
  </tr>
  <?php
    $codigos = array(
      1 => 9,
      2 => 8,
      3 => 5,
      4 => 4,
      5 => 3,
      6 => 2,
      7 => 1,
      8 => 0,
      9 => 9,
      10 => 8,
      11 => 7,
      12 => 6,
      13 => 5,
    );
    $codigos1 = array(
      1 => 41,
      2 => 42,
      3 => 45,
      4 => 46,
      5 => 47,
      6 => 48,
      7 => 49,
      8 => 50,
      9 => 51,
      10 => 52,
      11 => 53,
      12 => 54,
      13 => 55,
    );

    for($i=1;$i<=13;$i++){
    echo '<tr>
      <td><input type="text" size="15" placeholder="Clase"></input></td>
      <td><input type="text" size="15" placeholder="Cantidad de Envases"></input></td>
      <td><input type="text" size="10" placeholder="Cap./ Env. Litros"></input></td>
      <td><input type="text" size="15" placeholder="P.V.P. Envases (Bs)"></input></td>
      <td><input type="text" size="5" placeholder="Litros V.R"></input></td>
      <td><input type="text" size="15" placeholder="P.V.P/lto prom. (Bs)"></input></td>
      <td><input type="text" size="7" placeholder="Total"></input></td>
      <td><input type="text" size="10" placeholder="% Sobre P.V.P/LT."></input></td>
      <td>'.$codigos1[$i].'</td>
      <td><input type="text" placeholder="Impuestos o derechos (Bs)"></input></td>
      <td width="30">'.$codigos[$i].'</td>
    </tr>';
    }
    ?>
  
  <tr>
    <td colspan="8">TOTAL POR PAGAR (56=41+42+45+46+47+48+49+50+51+52+53+54+55)</td>
    <td>56</td>
    <td><input type="text" placeholder="Total por pagar"></td>
    <td>4</td>
  </tr>

  
</table>

<table width="50%" align="center">
  <tr>
    <th colspan="5">DETERMINACIÓN DEL IMPUESTO</th>
  </tr>
  <tr>
    <th>CODIGO</th>
    <th>TIPO</th>
    <th width="49">Cod</th>
    <th colspan="2">MONTO EN Bs.</th>
  </tr>

  <?php
  for ($i=1; $i <= 3 ; $i++) { 
  echo'<tr>
    <td width="80"><input type="text" size="20" placeholder="Codigo '.$i.'"></td>
    <td  width="750">IMPUESTO A PAGAR</td>
    <td>91</td>
    <td><input type="text" size="15" placeholder="Monto en Bs"></td>
    <td width="30">9</td>
  </tr>';
  }
  ?>
  <tr>
    <td colspan="2" style="text-align: center;">TOTAL IMPUESTO</td>
    <td>67</td>
    <td><input type="text" size="15" placeholder="Monto en Bs"></td>
    <td>3</td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: center;">MENOS: REINTEGRO</td>
    <td>68</td>
    <td><input type="text" size="15" placeholder="Monto en Bs"></td>
    <td>2</td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: center;">IMPUESTO POR PAGAR (90=67-68)</td>
    <td>90</td>
    <td><input type="text" size="15" placeholder="Total de impuesto"></td>
    <td>0</td>
  </tr>
  
</table>

</body>
</html>