
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosreno.css">
    <link rel="icon" href="img/icono.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>formulario3</title>

</head>
<body>

<div class="container3" id="container">

        <form id="form-validation" action="registrar.php" method="POST"  novalidate>
        <a class="links" href="../menu/index.php"></a>

        <center><h2>RENOVACIÓN DE LICORES</h2></center>

            
            <div class="form-group">
                <span>BANCO</span>
                <select name="bancos" id="bancos">
                    <option value="0">Seleccione</option>
                    <option value="1">SETA</option>
                    <option value="2">SIARTEC</option>
                </select>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>MONTO CANCELADO</span>
                <input type="text" placeholder="MONTOCANCELADO" name="MONTOCANCELADO" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>FORMA 16 O TIMBRE FISCAL</span>
                <input type="text" placeholder="TIMBREFISCAL" name="TIMBREFISCAL" required>
                <small>Ingrese campos</small>
            </div>


            <div class="button">
                <input type="submit" value="REGISTRAR">
            </div>
        </form>
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

    function cedularif(a,b) {
        var final = document.getElementsByName(a).value
        document.getElementsByName(b).value= final + "-"
    }
</script>

<script>
    a=1
    function anadir(a) {
      $.ajax({
        url: 'anadir.php',
        type: 'POST',
        data: {a:a},
        success: function(data) {
          $('#Container').append(data);
        },
        error:
 function() {
          alert('Error al obtener los detalles completos');
        }
      });
    }

function tipodepersona() {
    if (getElementsByName("tipodepersona") == 1 ) {

    }
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