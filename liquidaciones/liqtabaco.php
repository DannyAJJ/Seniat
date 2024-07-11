<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../index.html');
}else {
    if (intval($_SESSION['nivel'])<2) {
        header('location: ../menu/index.php');
    }
}
?>

<?php $licencia = $_GET['Variable'];
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
?>
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
    <td width="170">Nombre / Razon social</td>
    <td ><?php echo"guanabana destructora de mundos compañia anonima"?></td>
    <td width="170">Numero de resolucion</td>
    <td width="150"><?php echo"N°resolucion"?></td>
    <td width="100">RIF</td>
    <td width="150"><?php echo"J-29750553-4"?></td>
  </tr>
</table>

<table width="50%" align="center">


  <tr>
    <th width = "30" rowspan= "2"></th>
    <th rowspan="2">MARCA</th>
    <th colspan="2">EXPENDIO</th>
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
  $sql = "SELECT r.Id_producto, p.Nombre_producto FROM relacion_productos_tabaco r, clase_producto p WHERE r.Id_licencia = $licencia AND r.Id_producto = p.Id;";
  $productos = $conn->query($sql);
  while ($row = $productos->fetch_assoc()) {
    $nuevo[$row['Id_producto']] =  $row['Nombre_producto'];
   };
for($i=1;$i<=12;$i++){
  echo '<tr>
  <td>'.$codigos1[$i].'</td>
  <td><select name="marca'.$i.'">
  <option value="0">Seleccione</option>';
  foreach ($nuevo as $id => $clase) {
    echo '<option value="'.$id.'">'.$clase.'</option>';};
  echo '</select></td>
  <td><input type="text" size="10" placeholder="Unidad"></td>
  <td><input type="text" size="10" placeholder="Cantidad"></td>
  <td><input type="text" size="10" placeholder="PVP Bs"></td>
  <td width="20">'.$codigos2[$i].'</td>
  <td>Venta</td>
  <td width="30">'.$codigos3[$i].'</td>
  <td width="30">'.$codigos4[$i].'</td>
  <td>Impuesto a pagar ventas</td>
  <td>'.$codigos[$i].'</td>
</tr>';
}
  ?>

<tr>
    <td colspan="5">TOTAL VENTA</td>
    <td width="50">58</td>
    <td colspan="1"><?php echo"Total venta"?></td>
    <td>2</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  <TR>
    <td colspan="8">TOTAL IMPUESTO</td>
    <td>90</td>
    <td colspan="1"><?php echo"Total impuesto"?></td>
    <td width="10" colspan="1">0</td>
  </TR>
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
    <td><?php echo"Monto en Bs1"?></td>
    <td width="30">9</td>
  </tr>
  <tr>
    <td width="250"></td>
    <td>MULTAS</td>
    <td width="20">91</td>
    <td><input type="text" placeholder="monto en bs"></td>
    <td>9</td>
  </tr>
  <tr>
    <td></td>
    <td>INTERESES DE MORA</td>
    <td width="20">91</td>
    <td><input type="text" placeholder="monto en bs"></td>
    <td>9</td>
  </tr>
  <tr>
    <td></td>
    <td>INGRESOS VARIOS</td>
    <td width="20">91</td>
    <td><input type="text" placeholder="monto en bs"></td>
    <td>9</td>
  </tr>
  <tr>
    <td colspan="2">TOTAL POR PAGAR</td>
    <td width="20">91</td>
    <?php echo"<td>total por pagar</td>"?>
    <td>9</td>
  </tr>
  <tr>
    <td colspan="10" style="text-align: center;" class="busc"><button id="boton" onclick="alert('paragu')">ENVIAR</button></td>
  </tr>
</table>

</body>
</html>