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

<div class="container" id="container1">

        <form id="form-validation" action="licoresinsertar.php"  novalidate>
        <a class="links" href="../menu/index.php"></a>

        <center><h2>RENOVACION</h2></center>

        <div class="form-group">
                <span>Telefono</span>
                <input type="text" placeholder="Telefono" name="Telefono" required>
                <small>Ingrese campos</small>
            </div>         

            <div class="form-group">
                <span>BANCO</span>
                <select type="text" name="banco" name="banco" required>
                    <option value="">Seleccione</option>
                    <option value="1">seta</option>
                    <option value="2">siartec</option>
                </select>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>fecha de pago</span>
                <input type="text" placeholder="fecha de pago" name="fecha" required>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Timbre fiscal</span>
                <input type="text" placeholder="Timbre fiscal" name="timbrefiscal" required>
                <small>Ingrese campos</small>
            </div>         


            <div class="form-group">
                <span>Monto cancelado</span>
                <input type="text" placeholder="Monto cancelado" name="montocancelado" required>
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
</script>

    <main>
        <video muted autoplay loop>
            <source src="../video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

</body>
</html>