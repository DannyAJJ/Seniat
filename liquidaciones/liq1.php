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

<?php $tipoliq = $_GET['tipo']; $licencia = $_GET['licencia'];
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

<h1>Planilla de Liquidación y Pago de Impuestos y Derechos de Licores</h1>

<table width="50%" align="center">
  <tr>
  <td><font color="red" size="4"><strong>01</strong></font></td>
    <td width="250">NOMBRE O RAZÓN SOCIAL</td>
    <td colspan="3"><?php echo 'nombre';?></td>
    <td></td>
    <td>SECUENCIAL</td>
    <td><?php echo 'secuencial';?></td>
  </tr>
  <tr> 
    <td width="30"><font color="red" size="4"><strong>03 </strong></font></td>
    <td width="200">N° DE RIF</td>
    <td width="200"><?php echo 'rif';?></td>
    
    <td>N DE REGISTRO</td>
    <td width="200"><?php echo 'licencia';?></td>
    <td><center><font color="red" size="4"><strong>09</strong></font></center></td>
    <td width="200">MANIFIESTO</td>
    <td><input type="text" placeholder="N°" name="manifiesto"></td>
    <td>FECHA MANIFIESTO</td>
    <td><input type="date" placeholder="fecha" name="fechamanifiesto"></td>
  </tr>
</table>
<?php if ($tipoliq == 1) {
  echo '<table width="50%" align="center">
  
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
    
  </tr>';

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
$sql = "SELECT r.Id_producto, p.Nombre_producto FROM relacion_productos_licores r, clase_producto p WHERE r.Id_licencia = \"$licencia\" AND r.Id_producto = p.Id;";
$productos = $conn->query($sql);
while ($row = $productos->fetch_assoc()) {
  $nuevo[$row['Id_producto']] =  $row['Nombre_producto'];
 };
 
  for($i=1;$i<=5;$i++){
  echo '<tr>
  <td><select name="clase'.$i.'">
  <option value="0">Seleccione</option>';
  foreach ($nuevo as $id => $clase) {
    echo '<option value="'.$id.'">'.$clase.'</option>';};
  echo '</select></td>
  <td><input type="text" placeholder="Litro V.R"></td>
  <td><input type="text" placeholder="F.R o G.L"></td>
  <td><input type="text" placeholder="Litro A.A."></td>
  <td><input type="text" placeholder="V.R"></td>
  <td><input type="text" placeholder="A.A"></td>
  <td>'.$codigos1[$i].'</td>
  <td width="200">'.'hola'.'</td>
  <td width="30">'.$codigos[$i].'</td>
</tr>';
  }
  echo '
  <tr>
    <td colspan="6">TOTAL POR PAGAR (29=21+23+25+27+28)</td>
    <td>29</td>
    <td>'.'hola'.'</td>
    <td>1</td>
  </tr>
</table>
';
}else {
  echo '<table width="50%" align="center">
  <tr>
    <th colspan="7">IMPUESTOS SOBRE PRECIO VENTA AL PÚBLICO</th>
    <th>cod</th>
    <th colspan="2"></th>

  </tr>
  <tr>
    <th width="100">CLASE</th>
    <th>CANTIDAD DE ENVASES</th>
    <th>CAP./ENV. LITROS</th>
    <th>P.V.P. ENVASES (Bs.)</th>
    <th>LITROS V.R.</th>
    <th>TOTAL</th>
    <th>% SOBRE P.V.P / LT.</th>
    <th width="50">Cod</th>
    <th colspan="2">IMPUESTOS O DERECHOS (Bs)</th>
  </tr>';
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
    $sql = "SELECT r.Id_producto, p.Nombre_producto FROM relacion_productos_licores r, clase_producto p WHERE r.Id_licencia = \"$licencia\" AND r.Id_producto = p.Id;";
$productos = $conn->query($sql);
while ($row = $productos->fetch_assoc()) {
  $nuevo[$row['Id_producto']] =  $row['Nombre_producto'];
 };

    for($i=1;$i<=13;$i++){
    echo '<tr>
      <td><select name="clase'.$i.'">
      <option value="0">Seleccione</option>';
      foreach ($nuevo as $id => $clase) {
        echo '<option value="'.$id.'">'.$clase.'</option>';};
      echo '</select></td>
      <td><input type="text" size="15" placeholder="Cantidad de Envases"></input></td>
      <td><input type="text" size="10" placeholder="Cap./ Env. Litros"></input></td>
      <td><input type="text" size="15" placeholder="P.V.P. Envases (Bs)"></input></td>
      <td><input type="text" size="5" placeholder="Litros V.R"></input></td>
      <td>Total</input></td>
      <td><input type="text" size="10" placeholder="% Sobre P.V.P/LT."></input></td>
      <td>'.$codigos1[$i].'</td>
      <td>Impuestos o derechos (Bs)</input></td>
      <td width="30">'.$codigos[$i].'</td>
    </tr>';
    }
  echo '
  <tr>
    <td colspan="7">TOTAL POR PAGAR (56=41+42+45+46+47+48+49+50+51+52+53+54+55)</td>
    <td>56</td>
    <td>Total por pagar</td>
    <td>4</td>
  </tr>

  
</table>';
} ?>



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
  $monto = [
    1 => 'codigo1',
    2 => 'codigo2',
    3 => 'codigo2',
    4 => 'codigo1',
    5 => 'codigo2',
    6 => 'codigo2',
  ];
  $codigo = [
    1 => 'codigo1',
    2 => 'codigo2',
    3 => 'codigo2'
  ];
  for ($i=1; $i <= 3 ; $i++) { 
  echo'<tr>
    <td width="80">'.$codigo[$i].'</td>
    <td  width="750">IMPUESTO A PAGAR</td>
    <td>91</td>
    <td>'.$monto[$i].'</td>
    <td width="30">9</td>
  </tr>';
  }
  ?>
  <tr>
    <td colspan="2" style="text-align: center;">TOTAL IMPUESTO</td>
    <td>67</td>
    <td><?php echo $monto[4]; ?></td>
    <td>3</td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: center;">MENOS: REINTEGRO</td>
    <td>68</td>
    <td><?php echo $monto[5]; ?></td>
    <td>2</td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: center;">IMPUESTO POR PAGAR (90=67-68)</td>
    <td>90</td>
    <td><?php echo $monto[6]; ?></td>
    <td>0</td>
  </tr>
  <tr>
    <td colspan="10" style="text-align: center;" class="busc"><button id="boton" onclick="alert('paragu')">ENVIAR</button></td>
  </tr>
  
</table>

</body>
</html>