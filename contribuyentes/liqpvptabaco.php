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

        <form id="form-validation" action="insertar_licencia_tabaco.php" method="POST"  novalidate>
        <a class="links" href="../menu/index.php"></a>

        <center><h2>PLANILLA DE LIQUIDACION TABACOS</h2></center>
    
            <div class="form-group">
                <span>Gerencia general</span>
                <input type="text" placeholder="Gerencia general" name="gerenciageneral" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" name="rifempresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>GCIA</span>
                <input type="text" placeholder="GECIA" name="gecia" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Of lic</span>
                <input type="number" placeholder="OF lic" name="oflic" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Año</span>
                <input type="number" placeholder="Año" name="año" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>N° Porc</span>
                <input type="text" placeholder="N° Porc" name="porc" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Tipo Liq</span>
                <input type="text" placeholder="Tipo Liq" name="tipoliq" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>V</span>
                <input type="text" placeholder="V" name="V" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>N° de Resolucion</span>
                <input type="text" placeholder="N° de Resolucion" name="numresolucion" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Razon social</span>
                <input type="text" placeholder="Razon social" name="razonsocial" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Direccion" name="direccion" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <label for="opcion1">Tabaco</label>
                <input type="checkbox" id="opcion1" name="tabaco" value="tabaco" required>
                <small>Ingrese campos</small>

                <label for="opcion2">Chimo</label>
                <input type="checkbox" id="opcion2" name="chimo" value="chimo" required>
                <small>Ingrese campos</small>

                <label for="opcion3">Picadura</label>
                <input type="checkbox" id="opcion3" name="picadura" value="picadura" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Unidad</span>
                <input type="number" placeholder="Unidad" name="unidad" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cantidad</span>
                <input type="number" placeholder="Cantidad" name="cantidad" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>PVP</span>
                <input type="number" placeholder="PVP" name="pvp" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Venta</span>
                <input type="number" placeholder="Venta" name="cantidad" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Clase del producto 1</span>
                <select type="text"  name="claseproducto" required>
                    <option value="0">Seleccione</option>
                    <option value="1">Natural</option>
                    <option value="2">Juridica</option>
                </select>
                <div id="Container"></div>
                <button type="button" onclick="a=a+1,anadir(a)">anadir</button>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Materia prima</span>
                <input type="text" placeholder="Materia prima" name="materiaprimaproducto" required>
                <small>Ingrese campos</small>
            </div>
            


            <div class="button">
                <input type="submit" value="IMPRIMIR">
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
            <source src="../video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

</body>
</html>