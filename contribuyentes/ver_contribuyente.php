<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../login/index.html');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilosss.css">
    <link rel="icon" href="img/icono.png">
    <script src="../jquery-3.7.1.min.js"></script>
    <title>formulario3</title>
</head>
<body>

<div class="container2">

        <a class="links" href="../menu/index.php"></a> 

        <center><h3>BUSCAR CONTRIBUYENTES</h3></center>

<div class="form-group">
    <label for="rif">Ingrese el Rif del Contribuyente</label>
    <input type="text" placeholder="RIF" name="rif" id="rif" required>
    <small>Ingrese campos</small>
</div>

<div class="button">
    <button id="busc" class="busc" onclick="anadir(true)">BUSCAR</button>
</div>
<div id="Container"></div>
</div>

<script>
const button = document.getElementById('busc');

document.addEventListener('keydown', function(event) {
    
  if (event.key == 'Enter') {
    button.click();
}
});


function anadir(h) {
if (h) {var habil = 'AND `Habilitado` = 1';}else{ var habil = '';}
var rif = $('#rif').val();
$.ajax({
url: 'buscar_contribuyente.php',
type: 'POST',
data: {
    habil : habil,
    rif: rif,
},
success: function(data) {
  $('#Container').html(data);
},
error: function() {
  alert('Error al obtener los detalles completos');
}
});
}

</script>

    <main>
        <video muted autoplay loop>
            <source src="./video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

</body>
</html>