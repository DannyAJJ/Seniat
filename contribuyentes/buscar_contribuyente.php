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
$_COOKIE['myCookie'] = "AND `Habilitado` = 1";
$habilitado = $_COOKIE['myCookie'];
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$rif_contribullente = $_POST['rif'];
$sql = "SELECT licencia_licores.Numero_autorizacion,licencia_licores.Fecha_autorizacion, unidades.Unidad, licencia_licores.Razon_social FROM licencia_licores, unidades WHERE `Numero_rif_solicitante` = \"$rif_contribullente\" AND `Habilitado` = 1 AND unidades.Id_unidad = licencia_licores.Unidad; ";
$result = $conn->query($sql);
echo "<button type='button' class='enlace' onclick='renovaciones()'>renovaciones</button>";
echo "<button onclick='habilitar()' class='enlace' type='button'>INHABILITADOS </button>";

$i = 0; 
echo "<center><strong><h2>Licencias de Licores</h2></strong></center>";
if ($result->num_rows > 0) {
    echo "<table><tbody>";
    echo "<tr><td><b>Nº de Licencia</b></td><td><b>Razon Social</b></td><td><b>Unidad</b></td><td><b>Expira</b></td><td colspan ='5'><center><b>Opciones</b></center></td></tr>";

  // Mostrar los detalles completos de todas las demás columnas
  
  while($row = $result->fetch_assoc()) {
    $fecha = DateTime::createFromFormat('d-m-Y',$row["Fecha_autorizacion"]);
    $fecha->modify('+1 year');
    $fechas = $fecha->format('d-m-Y');
    
    echo "<tr>";
    echo "<td id= 'autorizacionlicor$i'>" . $row["Numero_autorizacion"]. "</td><td>" .$row["Razon_social"]. "</td><td>" . $row["Unidad"] . "</td>"."<td>" . $fechas. "</td>";

    echo "<td><a class='enlace' href>VER</a>
          <td><a class='enlace' href=''>LIQ. PROD.</a></td>
          <td><a class='enlace' href=''>LIQ. P.V.P</a></td>
          <td><a class='enlace' href=''>RENOVACIÓN</a></td>";
    if ($_SESSION['nivel'] == 3) {
      echo "<td><button onclick='eliminartabaco($i)' class='enlace' type='button'>ELIMINAR</td></tr>";
    }
    $i= $i+1;

  }
  
  echo "</tbody></table>";
echo "<div id='renova'></div>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}


$sql = "SELECT licencia_tabaco.Numero_autorizacion,licencia_tabaco.Fecha_autorizacion, unidades.Unidad, licencia_tabaco.Razon_social FROM licencia_tabaco, unidades WHERE `Numero_rif_solicitante` = \"$rif_contribullente\" $habilitado  AND unidades.Id_unidad = licencia_tabaco.Unidad; ";
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

    echo "<td><a class='enlace' href>VER</a>
          <td><a class='enlace' href=''>LIQ. P.V.P</a></td>";
    if ($_SESSION['nivel'] == 3) {
      echo "<td><button onclick='eliminartabaco($i)' class='enlace' type='button'>ELIMINAR</a></td></tr>";
    }
    
    $i= $i+1;
    }
    echo "</tbody></table>";
} else {
  echo "<p>SIN RESULTADOS</p>";
}
?>
<script>
  function eliminartabaco(i) {
    var eltd = document.getElementById(`autorizaciontabaco${i}`);
    var texointerior = eltd.textContent;
    $.ajax({
url: 'eliminar_tabaco.php',
type: 'POST',
data: {texto : texointerior},
success: function() {
    anadir();
},
error: function() {
  alert('error de eliminacion');
}
});
}
  function renovaciones(){
    const rif = '<?php echo $rif_contribullente; ?>';
    $.ajax({
      url: 'busqueda_renovacion.php',
      type: 'POST',
      data: { rif: rif },
      //contentType: 'json',
      success: function(elecho){
        //var el = elecho.toString();
        $('#renova').html(elecho);
        //anadir();
      },
      error(){

      }
    })
  }

  function habilitar() {
    document.cookie="myCookie='AND `Habilitado` = 0'";
    
    anadir();
  }

      function enviarVariable() {
        var valor = $("#miCampo").val();
        $.ajax({
          type: "POST",
          url: "procesar_variable.php",
          data: { variable: valor },
          success: function(response) {
            $("#resultado").html(response);
          }
        });
      }
    </script>

</script>