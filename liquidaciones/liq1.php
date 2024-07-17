<?php
session_start();
if (!isset($_SESSION['nivel'])) {
  header('location: ../index.html');
} else {
  if (intval($_SESSION['nivel']) < 2) {
    header('location: ../menu/index.php');
  }
}
?>

<?php $tipoliq = $_GET['tipo'];
$licencia = $_GET['licencia'];
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
  <script src="../jquery-3.7.1.min.js"></script>
</head>

<body>

  <h1>Planilla de Liquidación y Pago de Impuestos y Derechos de Licores</h1>

  <table width="50%" align="center">
    <tr>
      <td>
        <font color="red" size="4"><strong>01</strong></font>
      </td>
      <td width="250">NOMBRE O RAZÓN SOCIAL</td>
      <td colspan="3"><?php echo 'nombre'; ?></td>
      <td></td>
      <td>SECUENCIAL</td>
      <td><?php echo 'secuencial'; ?></td>
    </tr>
    <tr>
      <td width="30">
        <font color="red" size="4"><strong>03 </strong></font>
      </td>
      <td width="200">N° DE RIF</td>
      <td width="200"><?php echo 'rif'; ?></td>

      <td>N DE REGISTRO</td>
      <td width="200"><?php echo 'licencia'; ?></td>
      <td>
        <center>
          <font color="red" size="4"><strong>09</strong></font>
        </center>
      </td>
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

    for ($i = 1; $i <= 5; $i++) {
      echo '<tr>
  <td><select name="clase' . $i . '" id ="clase' . $i . '">
  <option value="0">Seleccione</option>';
      foreach ($nuevo as $id => $clase) {
        echo '<option value="' . $id . '">' . $clase . '</option>';
      };
      echo '</select></td>
  <td><input type="number" placeholder="Litro V.R" id="lvr' . $i . '"></td>
  <td><input type="number" placeholder="F.R o G.L" id="fr' . $i . '"></td>
  <td><input type="number" placeholder="Litro A.A." id="laa' . $i . '"></td>
  <td><input type="number" placeholder="V.R" id="lvrr' . $i . '"></td>
  <td><input type="number" placeholder="A.A" id="aa' . $i . '"></td>
  <td>' . $codigos1[$i] . '</td>
  <td width="200" id="impuesto' . $i . '"></td>
  <td width="30">' . $codigos[$i] . '</td>
</tr>';
    }
    echo '
  <tr>
    <td colspan="6">TOTAL POR PAGAR (29=21+23+25+27+28)</td>
    <td>29</td>
    <td id = "totalimp"></td>
    <td>1</td>
  </tr>
</table>
';
  } else {
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

    for ($i = 1; $i <= 13; $i++) {
      echo '<tr>
      <td><select name="clase' . $i . '" id ="clase' . $i . '">
      <option value="0">Seleccione</option>';
      foreach ($nuevo as $id => $clase) {
        echo '<option value="' . $id . '">' . $clase . '</option>';
      };
      echo '</select></td>
      <td><input type="text" size="15" placeholder="Cantidad de Envases"></input></td>
      <td><input type="text" size="10" placeholder="Cap./ Env. Litros"></input></td>
      <td><input type="text" size="15" placeholder="P.V.P. Envases (Bs)"></input></td>
      <td><input type="text" size="5" placeholder="Litros V.R"></input></td>
      <td>Total</input></td>
      <td><input type="text" size="10" placeholder="% Sobre P.V.P/LT."></input></td>
      <td>' . $codigos1[$i] . '</td>
      <td>Impuestos o derechos (Bs)</input></td>
      <td width="30">' . $codigos[$i] . '</td>
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

    for ($i = 1; $i <= 3; $i++) {
      echo '<tr>
    <td width="80" id = "codigop' . $i . '"></td>
    <td  width="750">IMPUESTO A PAGAR</td>
    <td>91</td>
    <td id="sumcodigo' . $i . '"></td>
    <td width="30">9</td>
  </tr>';
    }
    ?>
    <tr>
      <td colspan="2" style="text-align: center;">TOTAL IMPUESTO</td>
      <td>67</td>
      <td id="montopararestar"></td>
      <td>3</td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center;">MENOS: REINTEGRO</td>
      <td>68</td>
      <td></td>
      <td>2</td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center;">IMPUESTO POR PAGAR (90=67-68)</td>
      <td>90</td>
      <td id="montofinalfinal"></td>
      <td>0</td>
    </tr>
    <tr>
      <td colspan="10" style="text-align: center;" class="busc"><button id="boton" onclick="enviar()">ENVIAR</button></td>
    </tr>

  </table>

</body>

</html>

<Script>
  if (typeof codigos == 'undefined') {
    var codigos = [];
    var sumcodigo = [0, 0, 0];
    var cont0 = 0,
      cont1 = 0,
      cont2 = 0;
    var matriz = [
      [],
      [],
      []
    ];
  }
  var tipo = "<?php echo $tipoliq ?>";
  if (tipo == "0") {
    var e = 13;
  } else {
    var e = 5;
  };

  function limpiarTd(td, busca, cont) {
    if (td.innerText == busca) {
      if (cont > 1) {
        cont = cont - 1;
        return cont;
      }
      if (cont == 1) {
        cont = 0;
        td.innerText = '';

        return cont;
      }
    } else {
      return cont;
    }

  }

  function limpiar(i) {
    const impuesto = document.getElementById('impuesto' + i);
    const lvrr = document.getElementById('lvrr' + i);
    const aa = document.getElementById('aa' + i);
    const fr = document.getElementById('fr' + i);
    const laa = document.getElementById('laa' + i);
    const lvr = document.getElementById('lvr' + i);
    const td1 = document.getElementById('codigop1');
    const td2 = document.getElementById('codigop2');
    const td3 = document.getElementById('codigop3');

    lvrr.value = "";
    aa.value = "";
    fr.value = "";
    laa.value = "";
    lvr.value = "";
    impuesto.innerText = "";
    for (var element of codigos) {
      cont0 = limpiarTd(td1, element, cont0);
      if (cont0 == 0) {
        matriz[0][i] = '';
        console.log(matriz);
        element = "";
        break;
      }
      cont1 = limpiarTd(td2, element, cont1);
      if (cont1 == 0) {
        matriz[1][i] = '';
        element = "";
        break;
      }
      cont3 = limpiarTd(td3, element, cont2);
      if (cont2 == 0) {
        matriz[2][i] = '';
        element = "";
        break;
      }
    }
  };

  function totalcodigo() {
    sumcodigo[0] = 0;
    sumcodigo[1] = 0;
    sumcodigo[2] = 0;
    let monto = 0;
    let suma = 0;
    matriz.forEach((row, rowIndex) => {
      //console.log(matriz);
      row.forEach((element, columnIndex) => {
        try {
          //console.log("id : impuesto"+element+ " monto : "+ document.getElementById('impuesto' + element).innerText);
          monto = parseFloat(document.getElementById('impuesto' + element).innerText).toFixed(2) || 0;
          suma = parseFloat(sumcodigo[rowIndex]).toFixed(2) || 0;
          sumcodigo[rowIndex] = parseFloat(suma) + parseFloat(monto) || parseFloat(suma);
          //sumcodigo[rowIndex] = parseFloat(sumcodigo[rowIndex] + parseFloat(document.getElementById('impuesto' + element).innerText)).toFixed(2) ;
        } catch (error) {
          console.log(error)
        };
      });
    });

    //console.log("sumado :" + sumcodigo);
  };

  function totales(e) {
    const total = document.getElementById('totalimp');
    const total2 = document.getElementById('montopararestar');
    const total3 = document.getElementById('montofinalfinal');
    var imp = 0;
    for (let index = 1; index <= e; index++) {
      const impuesto = document.getElementById('impuesto' + index);
      imp = imp + parseFloat(impuesto.innerText) || imp;
    }
    total.innerText = imp.toFixed(2);
    total2.innerText = imp.toFixed(2);
    total3.innerText = imp.toFixed(2);
    totalcodigo();

    document.getElementById('sumcodigo1').innerText = imp.toFixed(2);

    document.getElementById('sumcodigo2').innerText = parseFloat(sumcodigo[1]).toFixed(2);

    document.getElementById('sumcodigo3').innerText = parseFloat(sumcodigo[2]).toFixed(2);
  }

  function calculof(ix, e) {
    const impuesto = document.getElementById('impuesto' + ix);
    const lvrr = document.getElementById('lvrr' + ix);
    const aa = document.getElementById('aa' + ix);
    var aan = parseFloat(aa.value) || 0;
    var lvrrn = parseFloat(lvrr.value) || 0;
    //console.log(aan*lvrrn);
    impuesto.innerText = (aan * lvrrn).toFixed(2) || "";
    totales(e);
  };

  function escuchar(iy, e) {
    const fr = document.getElementById('fr' + iy);
    const laa = document.getElementById('laa' + iy);
    const lvr = document.getElementById('lvr' + iy);
    const lvrr = document.getElementById('lvrr' + iy);
    var frn = parseFloat(fr.value) || 0;
    var lvrn = parseFloat(lvr.value) || 0;
    laa.value = (lvrn * frn / 100).toFixed(2) || "";
    lvrr.value = laa.value;
    calculof(iy, e);
  }
  for (let i = 1; i <= e; i++) {
    document.getElementById('lvr' + i).addEventListener('input', function() {
      escuchar(i, e)
    });
    document.getElementById('fr' + i).addEventListener('input', function() {
      escuchar(i, e)
    });
    $('#clase' + i).change(function() {
      iditem = $(this).val();
      if (iditem == 0) {
        $('#aa' + i).val("");
        limpiar(i);
        totales(e);
      } else {
        $.ajax({
          url: 'buscaralicuota.php',
          method: 'POST',
          data: {
            iditem: iditem,
            tipo: tipo
          },
          dataType: 'json',
          success: function(datos) {

            if ($('#codigop1').html() == "") {
              codigos[0] = datos['codigo'];
              $('#codigop1').html(datos['codigo']);
            } else if ($('#codigop2').html() == "" && datos['codigo'] != $('#codigop1').html()) {
              codigos[1] = datos['codigo'];
              $('#codigop2').html(datos['codigo']);
            } else if ($('#codigop3').html() == "" && $('#codigop2').html() != datos['codigo'] && datos['codigo'] != $('#codigop1').html()) {
              codigos[2] = datos['codigo'];
              $('#codigop3').html(datos['codigo']);
            }
            switch (datos['codigo']) {
              case codigos[0]:
                cont0 = cont0 + 1;
                matriz[0].push(i);
                break;
              case codigos[1]:
                cont1 = cont1 + 1;
                matriz[1].push(i);
                break;
              case codigos[2]:
                cont2 = cont2 + 1;
                matriz[2].push(i);
                break;
            }
            $('#aa' + i).val(datos['alicuota'])

            calculof(i, e);
          },
          error: function() {
            alert('Error ajax de selector');
          }
        });
      }

    })
  };

  function enviar() {
    
    let jey = {
        "cabecera":{
          "licencia": "<?php echo $licencia ?>",
          "liquidacion":"<?php echo $tipoliq ?>"
        },
        "detalles": []
      } ;
    
    for (let detalles = 1; detalles <= e; detalles++) {
      jey.detalles.push({
    "idmarca": document.getElementById('clase' + detalles).value,
    "litrovr": document.getElementById('lvr' + detalles).value,
    "fr": document.getElementById('fr' + detalles).value,
    "laa": document.getElementById('laa' + detalles).value,
    "aa": document.getElementById('aa' + detalles).value
  });
    };
    
    //console.log(jey);
    $.ajax({
      url: 'insertarliqlicor.php',
      type: 'POST',
      data: {
        datos : JSON.stringify(jey)
      },
      success: function(data) {
        console.log(data)
      },
      error: function() {
        alert('Error al obtener los detalles completos');
      }
    });
  };
</Script>