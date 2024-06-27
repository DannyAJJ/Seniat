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

        <center><h2>PLANILLA TABACOS</h2></center>

        <div class="form-group">
                <span>Sector/sector</span>
                <select type="text"  name="sector" required>
                    <option value="">Seleccione sector</option>
                    <option value="1">Valencia</option>
                    <option value="2">Cojedes</option>
                    <option value="3">Bajuma</option>
                    <option value="4">La Victoria</option>
                    <option value="5">Maracay</option>
                </select>
                <small>Ingrese campos</small>
            </div>

                           <h3>DATOS DEL SOLICITANTE</h3>
            <div class="form-group">
                <span>Tipo de persona</span>
                <select type="text" name="tipodepersona" required>
                    <option value="0">Natural</option>
                    <option value="1">Juridica</option>
                </select>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Nombre y apellidos/Denominacion</span>
                <input type="text" placeholder="Ingrese Nombre y Aepllido/Denominacion" name="nombre" required>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Nacionalidad</span>
                <select type="text"  name="nacionalidad">
                    <option value="1">V</option>
                    <option value="0">E</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cedula</span>
                <input type="text" placeholder="Cedula" name="cedula" onkeyup="cedularif('cedula','rif')" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" name="rifempresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Domicilio fiscal</span>
                <input type="text" placeholder="Domicilio fiscal" name="domiciliofiscal" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="telefono" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>N° Inscripción</span>
                <input type="number" placeholder="N° Inscripción" name="inscripcion" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>tomo</span>
                <input type="text" placeholder="Tomo" name="tomo" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Oficina de Registro</span>
                <input type="text" placeholder="Oficina de Registro" name="registro" required>
                <small>Ingrese campos</small>
            </div>

            <h3>DATOS DEL REPRESENTANTE LEGAL O MANDATARIO DE LA EMPRESA</h3>

            <div class="form-group">
                <span>Nombres</span>
                <input type="text" placeholder="Nombres" name="nombrerepresentante" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Apellidos</span>
                <input type="text" placeholder="Apellidos" name="apellidorepresentante" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Nacionalidad</span>
                <select type="text"  name="nacionalidadrepresentante" required>
                    <option value="">Seleccione</option>
                    <option value="1">V</option>
                    <option value="2">E</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cedula de identidad</span>
                <input type="text" placeholder="Cedula" name="cedularepresentante" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" name="rif" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Direccion" name="direccionrepresentante" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correo Electronico</span>
                <input type="email" placeholder="Correo Electronico" name="correorepresentante" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="telefonorepresentante" required>
                <small>Ingrese campos</small>
            </div>

            <h3>TABACO</h3>

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