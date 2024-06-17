<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilosss.css">
    <link rel="icon" href="img/icono.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>formulario3</title>
</head>
<body>

<div class="container">

        <a class="links" href="../menu/index.html"></a> 

        <center><h3>BUSCAR CONTRIBUYENTES</h3></center>

<div class="form-group">
    
    <label for="rif">Ingrese el Rif del Contribullente</label>
    <input type="text" placeholder="Rif" name="rif" id="rif" required>
    <small>Ingrese campos</small>
</div>

<div class="button">
    <button id="busc" onclick="anadir()">BUSCAR</button>
</div>
<div id="Container"></div>
</div>

<script>
const addForm = document.getElementById("form-validation");
addForm.addEventListener("submit", (e)=>{
if(addForm.checkValidity() ===false){
e.preventDefault();
e.stopPropagation();
addForm.classList.add('was-validate');
return false
}
})

function anadir() {

var rif = $('#rif').val();
$.ajax({
url: 'buscarcontribullente.php',
type: 'POST',
data: {
    rif: rif,
},
success: function(data) {
  $('#Container').html(data);
},
error:
function() {
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