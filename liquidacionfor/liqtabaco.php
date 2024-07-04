<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
<title>Planilla de Liquidación</title>

</head>
<body>

<h1>Planilla de Liquidación y Pago de Impuestos y Derechos de tabaco</h1>

<table width="50%" align="center">
  <tr>
    <th>GERENCIA REGIONAL</th>
    <td colspan="5"><input type="text" placeholder="Gerencia regional"> </td>
  </tr>
  <tr>
    <th>LIQUIDACION N°</th>
    <td colspan="5"><input type="text" placeholder="Liquidacion"></td>
  </tr>
  <tr>
    <th>GCIA.</th>
    <th>OFI.LIQ</th>
    <th>AÑO</th>
    <th>N°PORC.</th>
    <th>TIPOLIQ</th>
    <th>SERIE</th>
  </tr>
  <tr>
    <td colspan="1"><input type="text" placeholder="GCIA"></td>
    <td colspan="1"><input type="text" placeholder="OFI.LIQ"></td>
    <td colspan="1"><input type="text" placeholder="AÑO"></td>
    <td colspan="1"><input type="text" placeholder="N°PORC"></td>
    <td colspan="1"><input type="text" placeholder="TIPOLIQ"></td>
    <td colspan="1"><input type="text" placeholder="SERIE"></td>
  </tr>
  <TR>
    <td colspan="1"><div align="center"><font color="red" size="4"><strong></strong></font></div> N° DE RIF</td>
    <td colspan="5"><input type="text" placeholder="N° RIF"></td>
  </TR>
  <tr>
    <td colspan="2"><div align="center"><font color="red" size="4"><strong>01</strong></font></div> APELLIDOS Y NOMBRES - NOMBRE O RAZON SOCIAL</td>
    <td colspan="4"><input type="text" placeholder="Apellidos y Nombres - Razon social"></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><font color="red" size="4"><strong>06</strong></font></div> DIRECCION:</td>
    <td colspan="4"><input type="text" placeholder="Direccion"></td>
  </tr>


  <tr>
    <td colspan="2">RESOLUCION N°</td>
    <td colspan="4"><input type="text" placeholder="Resolucion N°"></td>
  </tr>

  <tr>
    <td colspan="1">FECHA LIQUIDACION / RESOLUCION</td>
    <td colspan="2"><input type="text" placeholder="DIA"></td>
    <td colspan="2"><input type="text" placeholder="MES"></td>
    <td colspan="1"><input type="text" placeholder="AÑO"></td>
  </tr>

  <tr>
    <td><div align="center"><font color="red" size="4"><strong>08</strong></font></div> FECHA DE GARANTIA</td>
    <td colspan="2"><input type="text" placeholder="DIA"></td>
    <td colspan="2"><input type="text" placeholder="MES"></td>
    <td colspan="1"><input type="text" placeholder="AÑO"></td>
  </tr>

  <tr>
    <td colspan="1">FECHA DE VENCIMIENTO</td>
    <td colspan="2"><input type="text" placeholder="DIA"></td>
    <td colspan="2"><input type="text" placeholder="MES"></td>
    <td colspan="1"><input type="text" placeholder="AÑO"></td>
  </tr>

</table>

<table width="50%" align="center">


  <tr>
    <th width = "30" rowspan= "2"></th>
    <th rowspan="2">MARCA</th>
    <th colspan="2">EXPEDICION</th>
    <th rowspan="2">PVP Bs</th>
    <th rowspan="2" colspan="3">VENTA</th>
    <th rowspan="2" colspan="3">IMPUESTO O DERECHOS</th>
  </tr>
  <tr>
    <th>UNIDAD</th>
    <th>CANTIDAD</th>
    
  </tr>

  <?php

  $codigos = array(
    1 => 7,
    2 => 4,
    3 => 1,
    4 => 8,
    5 => 5,
    6 => 2,
    7 => 9,
    8 => 6,
    9 => 3,
    10 =>0,
    11 =>7,
    12 =>4
  );
  $codigos1 = array(
    1 => '01',
    2 => '02',
    3 => '03',
    4 => '04',
    5 => '05',
    6 => '06',
    7 => '07',
    8 => '08',
    9 => '09',
    10 =>10,
    11 =>11,
    12 =>12
  );
  $codigos2 = array(
    1 => 21,
    2 => 24,
    3 => 27,
    4 => 30,
    5 => 33,
    6 => 36,
    7 => 39,
    8 => 42,
    9 => 45,
    10 =>48,
    11 =>51,
    12 =>54
  );
  $codigos3 = array(
    1 => 9,
    2 => 6,
    3 => 3,
    4 => 0,
    5 => 7,
    6 => 4,
    7 => 1,
    8 => 8,
    9 => 5,
    10 =>2,
    11 =>9,
    12 =>6
  );
  $codigos4 = array(
    1 => 23,
    2 => 26,
    3 => 29,
    4 => 32,
    5 => 35,
    6 => 38,
    7 => 41,
    8 => 44,
    9 => 47,
    10 =>50,
    11 =>53,
    12 =>56
  );

for($i=1;$i<=12;$i++){
  echo '<tr>
  <td>'.$codigos1[$i].'</td>
  <td><input type="text" placeholder="Marca"></td>
  <td><input type="text" size="10" placeholder="Unidad"></td>
  <td><input type="text" size="10" placeholder="Cantidad"></td>
  <td><input type="text" size="10" placeholder="PVP Bs"></td>
  <td width="30">'.$codigos2[$i].'</td>
  <td><input type="text" placeholder="Venta"></td>
  <td width="30">'.$codigos3[$i].'</td>
  <td width="30">'.$codigos4[$i].'</td>
  <td><input type="text" placeholder="Impuesto a pagar ventas"></td>
  <td>'.$codigos[$i].'</td>
</tr>';
}
  ?>

  <tr>
    <td colspan="5">TOTAL VENTA</td>
    <td width="50">58</td>
    <td colspan="1"><input type="text" placeholder="Total venta"></td>
    <td>2</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  <TR>
    <td colspan="8">TOTAL IMPUESTO</td>
    <td>90</td>
    <td colspan="1"><input type="text" placeholder="Total impuesto"></td>
    <td width="10" colspan="1">0</td>
  </TR>
</table>

</table>

<table width="50%" align="center">
  <tr>
    <th colspan="5" >PLAN UNICO DE CUENTAS </th>
  </tr>
  <tr>
    <th>CODIGO N°</th>
    <th colspan="1">DESCRIPCION DEL CODIGO</th>
    <th colspan="3">MONTO EN Bs.</th>
  </tr>
  <tr>
    <td></td>
    <td width="800">TOTAL IMPUESTO (91=90)</td>
    <td width="20">91</td>
    <td width="275"><input type="text" size="20" placeholder="Monto en Bs"></td>
    <td width="30">9</td>
  </tr>
  <tr>
    <td width="250"></td>
    <td>MULTAS</td>
    <td width="20">91</td>
    <td><input type="text" placeholder="Monto en Bs"></td>
    <td>9</td>
  </tr>
  <tr>
    <td></td>
    <td>INTERESES DE MORA</td>
    <td width="20">91</td>
    <td><input type="text" placeholder="Monto en Bs"></td>
    <td>9</td>
  </tr>
  <tr>
    <td></td>
    <td>INGRESOS VARIOS</td>
    <td width="20">91</td>
    <td><input type="text" placeholder="Monto en Bs"></td>
    <td>9</td>
  </tr>
  <tr>
    <td colspan="2">TOTAL POR PAGAR</td>
    <td width="20">91</td>
    <td><input type="text" placeholder="Monto en Bs"></td>
    <td>9</td>
  </tr>
</table>

</body>
</html>