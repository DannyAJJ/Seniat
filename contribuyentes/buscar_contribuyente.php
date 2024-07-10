<link rel="stylesheet" href="estilosphp.css">

<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../login/index.html');
}
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
$habilitado = $_POST['habil'];
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$rif_contribullente = $_POST['rif'];
if ($_SESSION['unidad']==1) {
  $limitunidadl = '';
  $limitunidadt = '';
}else {
  $limitunidadl = 'AND licencia_licores.Unidad = '.$_SESSION['unidad'];
  $limitunidadt = 'AND licencia_tabaco.Unidad = '.$_SESSION['unidad'];
}
$sql = "SELECT licencia_licores.Numero_autorizacion,
licencia_licores.Fecha_autorizacion, 
unidades.Unidad,
licencia_licores.Razon_social, 
licencia_licores.Habilitado
FROM
licencia_licores,
unidades
WHERE `Numero_rif_solicitante` = \"$rif_contribullente\" $habilitado $limitunidadl AND unidades.Id_unidad = licencia_licores.Unidad ; ";
$result = $conn->query($sql);
echo "<div style = 'display: flex;flex-flow: row; with: 70%; justify-content: space-between'>
<button type='button' class='busc' onclick='renovaciones()'>RENOVACIONES</button>";
echo "<button onclick='habilitar()' class='busc' type='button'>INHABILITADOS </button></div>";

$i = 0; 
echo "<center><strong><h2>Licencias de Licores</h2></strong></center>";
if ($result->num_rows > 0) {
    echo "<table><tbody>";
    echo "<tr><td><b>Nº de Licencia</b></td><td><b>Razon Social</b></td><td><b>Unidad</b></td><td><b>Expira</b></td><td colspan ='5'><center><b>Opciones</b></center></td></tr>";

  // Mostrar los detalles completos de todas las demás columnas
  
  while($row = $result->fetch_assoc()) {

    $sql1 ="SELECT r.Proxima_renovacion FROM renovacion_licores r, licencia_licores l WHERE  '".$row['Numero_autorizacion']."' = r.Numero_autorizacion GROUP BY r.Id_renovacion ORDER BY r.Id_renovacion DESC LIMIT 1;";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
      $row1 = $result1->fetch_assoc();
      $fechas = $row1["Proxima_renovacion"];
    }else {
    $fecha = DateTime::createFromFormat('d-m-Y',$row["Fecha_autorizacion"]);
    $fecha->modify('+1 year');
    $fechas = $fecha->format('d-m-Y');
    }
    //echo "<script> console.log('".$row1['Proxima_renovacion']."'); </script>";
    
    echo "<tr>";
    echo "<td id= 'autorizacionlicor$i'>" . $row["Numero_autorizacion"]. "</td><td>" .$row["Razon_social"]. "</td><td>" . $row["Unidad"] . "</td>"."<td>" . $fechas. "</td>";

    if ($row["Habilitado"] == 1) {
    echo "<td><button onclick='verlicl($i)' class='enlace' type= 'button'>VER</button>";
    echo "<td><button onclick='liqprolic($i,1)' class='enlace' type= 'button'>LIQ. PROD.</button></td>
    <td><button onclick='liqprolic($i,0)' class='enlace' type= 'button'>LIQ. P.V.P</button></td>
    <td><button onclick='renovacion($i)' class='enlace' type= 'button'>RENOVACIÓN</button></td>";
    
    if ($_SESSION['nivel'] == 3) {
      echo "<td><button onclick='eliminarlicor($i,0)' class='enlace' type='button'>BORRAR</button></td></tr>";
    }
  }else {
    echo "<td colspan ='2'><button class='enlace' type= 'button'>VER</button>";
    if ($_SESSION['nivel'] == 3) {
    echo "<td colspan ='3'><button onclick = 'eliminarlicor($i,1)'  class='enlace' type='button'>RESTAURAR</button></td>";
    }
  }
    $i= $i+1;

  }
  
  echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}
echo "<div id='renova'></div>";


$sql = "SELECT licencia_tabaco.Numero_autorizacion,licencia_tabaco.Fecha_autorizacion, unidades.Unidad, licencia_tabaco.Razon_social, licencia_tabaco.Habilitado FROM licencia_tabaco, unidades WHERE `Numero_rif_solicitante` = \"$rif_contribullente\" $habilitado $limitunidadt  AND unidades.Id_unidad = licencia_tabaco.Unidad; ";
$result = $conn->query($sql);

echo "<center><strong><h2>Licencias de Tabaco</h2></strong></center>";
if ($result->num_rows > 0) {
    echo "<table><tbody>";
    echo "<tr><td><b>Nº de Licencia</b></td><td><b>Razon Social</b></td><td><b>Unidad</b></td><td><b>Expira</b></td><td colspan ='5'><center><b>Opciones</b></center></td></tr>";

  // Mostrar los detalles completos de todas las demás columnas
  while($row = $result->fetch_assoc()) {
    $fecha = DateTime::createFromFormat('d-m-Y',$row["Fecha_autorizacion"]);
    $fecha->modify('+1 year');
    $fechas = $fecha->format('d-m-Y');
    
    echo "<tr>";
    echo "<td id= 'autorizaciontabaco$i'>" . $row["Numero_autorizacion"]. "</td><td>" .$row["Razon_social"]. "</td><td>" . $row["Unidad"] . "</td>"."<td>" . $fechas. "</td>";

    echo "<td><button onclick='verlict($i)' type= 'button' class='enlace' >VER</a>";
    if ($row['Habilitado'] == 1) {
      echo "<td><button onclick='verpvp($i)' class='enlace' type= 'button' >LIQ. P.V.P</button></td>";
      if ($_SESSION['nivel'] == 3) {
        echo "<td><button onclick='eliminartabaco($i,0)' class='enlace' type='button'>BORRAR</button></td></tr>";
      }
    }else{
      if ($_SESSION['nivel'] == 3) {
      echo "<td colspan = '2'><button onclick='eliminartabaco($i,1)' class='enlace' type='button'>RESTAURAR</button></td></tr>";}
      }
    
    $i= $i+1;
    }
    echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}
?>
<script>
   function liqprolic(i,e){
    var eltd = document.getElementById(`autorizacionlicor${i}`);
    var vari = eltd.textContent;
    location.href = '../liquidacionfor/liq1.php?tipo='+ e +'&licencia='+vari
  }
  function renovacion(i){
    var eltd = document.getElementById(`autorizacionlicor${i}`);
    var vari = eltd.textContent;
    location.href = '../renovacioneslicores/renovacion1.php?licencia='+vari
  }
  function verlict(i){
    var eltd = document.getElementById(`autorizaciontabaco${i}`);
    var vari = eltd.textContent;
    location.href = '../pdf/crear_autorizacion_tabaco_pdf.php?Variable='+vari
  }
  function verpvp(i){
    var eltd = document.getElementById(`autorizaciontabaco${i}`);
    var vari = eltd.textContent;
    location.href = '../liquidacionfor/liqtabaco.php?Variable='+vari
  }
  function verlicl(i) {
    var eltd = document.getElementById(`autorizacionlicor${i}`);
    var vari = eltd.textContent;
    location.href = '../pdf/crear_autorizacion_licores_pdf.php?Variable='+vari
  }
  function eliminarlicor(i,n) {
    var eltd = document.getElementById(`autorizacionlicor${i}`);
    var texointerior = eltd.textContent;
    $.ajax({
url: 'eliminar_licor.php',
type: 'POST',
data: {Texto : texointerior,
  Numero: n
},
success: function(dato) {
  console.log(dato);
    if (n = 1) {
      t = true;
    }else{
      t = false;
    }
    anadir(true);
},
error: function() {
  alert('error de eliminacion');
}
});
}
  function eliminartabaco(i,n) {
    var eltd = document.getElementById(`autorizaciontabaco${i}`);
    var texointerior = eltd.textContent;
    $.ajax({
url: 'eliminar_tabaco.php',
type: 'POST',
data: {Texto : texointerior,
  Numero: n},
success: function() {
    if (n = 1) {
      t = true;
    }else{
      t = false;
    }
    anadir(true);
},
error: function() {
  alert('error de eliminacion');
}
});
}

 var renovacion;
  function renovaciones(){
    const rif = '<?php echo $rif_contribullente; ?>';
    if (!renovacion) {
      
      //console.log(renovacion)
      $.ajax({
      url: 'busqueda_renovacion.php',
      type: 'POST',
      data: { rif: rif },
      //contentType: 'json',
      success: function(elecho){$('#renova').html(elecho);},
      error(){alert('epa');}
      })
    }else {$('#renova').html("");}
    renovacion = !renovacion;
        //console.log(renovacion)
    
  }

      var t;
      function habilitar() {
        //console.log(t);
        
      t = !t;
       if (!t) {
        anadir(true);
       }else{
        anadir(false)
       }
      }
    </script>

</script>
