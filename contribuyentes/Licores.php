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

        <form id="form-validation" action="insertar_licencia_licores.php" method="POST"  novalidate>
        <a class="links" href="../menu/index.php"></a>

        <center><h2>PLANILLA LICORES</h2></center>

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
            <div class="form-group" id="combo">
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
            
            <div class="form-group" >
                <span>Nacionalidad</span>
                <select type="text"  name="nacionalidad">
                    <option value="1">V</option>
                    <option value="0">E</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group" id="cedula" style="display: block;">
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

            <h3>BEBIDA ALCOHÓLICA</h3>

            <div class="form-group">
                
                <div id="Container">
                <span>Clase del producto</span>
                <select type="text"  name="claseproducto" id="comboproducto1" required>
                    <option value="1">Cerveza</option>
                    <option value="2">Bebidas y Especies Alcohólicas</option>
                    <option value="3">Sangria Fermentada</option>
                    <option value="4">Sangria Adición de Alcohol</option>
                    <option value="5">Vinos</option>
                </select>
                </div>
                <button id="añadir" style="display: none;" type="button" onclick="a=a+1,anadir(a)">AÑADIR</button>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Fuerza real o Grado lcohólico G.L, °GL</span>
                <input type="number" placeholder="Fuerza real o Grado lcohólico G.L, °GL" name="gradoalcoholicoproducto" required>
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
    if (typeof sangria == 'undefined') {
        var sangria = 1
    }
    if (typeof conalcohol == 'undefined') {
        var conalcohol=1;    
    }
    if(typeof vinos == 'undefined'){
        var vinos= 1;
    }
    
    function anadir(a) {
        //const c = $('#comboproducto'+a-1).val();
    var b = document.getElementById("comboproducto"+(a-1));
    console.log(b.value);
    if (b.value==3) {
        sangria=0;
    }if (b.value==4) {
        conalcohol=0;
    }if (b.value==5){
        vinos=0;
    };
      $.ajax({
        url: 'anadir.php',
        type: 'POST',
        data: {a:a,sangria:sangria,conalcohol:conalcohol,vinos:vinos},
        success: function(data) {
          $('#Container').append(data);
        },
        error:
 function() {
          alert('Error al obtener los detalles completos');
        }
      });
    }

const comboproducto = document.getElementById("comboproducto1");
const boton = document.getElementById("añadir");

comboproducto.addEventListener("change", function() {

    console.log(this.value);
  if (this.value >2) {
    boton.style.display = "block";
  } else {
    boton.style.display = "none";
    $('#Container').html('<span>Clase del producto</span><select type="text"  name="claseproducto" id="comboproducto1" required><option value="1">Cerveza</option><option value="2">Bebidas y Especies Alcohólicas</option><option value="3">Sangria Fermentada</option><option value="4">Sangria Adición de Alcohol</option><option value="5">Vinos</option>');
    }
});




const combo = document.getElementById("combo");
const cajaTexto = document.getElementById("cedula");
var trampa = false;
combo.addEventListener("change", function() {
  if (trampa) {
    cajaTexto.style.display = "block";
  } else {
    cajaTexto.style.display = "none";
  }
  trampa = !trampa;
});



</script>

    <main>
        <video muted autoplay loop>
            <source src="./video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

</body>
</html>