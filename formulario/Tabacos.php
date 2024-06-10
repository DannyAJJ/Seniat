<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilos.css">
    <link rel="icon" href="img/icono.png">
    <title>formulario3</title>
</head>
<body>

<div class="container" id="container1">

        <form id="form-validation" novalidate>
        <a href="../menu/index.html" style="width: 1000px;"> <img src="../menu/img/home.png" alt="imagen clickeable" width="50" height="50"></a>

            <h3 style="width: 1000px;">DATOS DEL SOLICITANTE</h3>

            <select style="-webkit-appearance: ini; appearance: initial; background-image: url('flecha.png'); background-size: 20px 20px; background-position: 95% 50%; background-repeat: no-repeat;">
  <option value="">Seleccione una opción</option>
  <option value="opcion1">Opción 1</option>
  <option value="opcion2">Opción 2</option>
            </select>

            <div class="form-group">
                <span>Tipo de persona</span>
                <select type="text" name="Tipo de persona" id="tipodepersona" required>
                    <option value="">Seleccione</option>
                    <option value="Natural">Natural</option>
                    <option value="Juridica">Juridica</option>
                </select>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Nombre y apellidos/Denominacion</span>
                <input type="text" placeholder="Ingrese Nombre y Aepllido/Denominacion" id="nombre" required>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Cedula de identidad</span>
                <select type="text" name="Cedula" id="cedulacombo" required>
                    <option value="">Seleccione</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cedula</span>
                <input type="text" placeholder="Cedula" id="cedula" onkeyup="cedularif('cedula','rif')" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" id="rif" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Domicilio fiscal</span>
                <input type="text" placeholder="Domicilio fiscal" id="domicilio fiscal" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Ciudad</span>
                <input type="text" placeholder="Ciudad" id="ciudad" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Estado</span>
                <input type="text" placeholder="Estado" id="estado" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" id="telefono" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correro Electronico</span>
                <input type="Email" placeholder="Ingrese Correo Electronico" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>N° Inscripción</span>
                <input type="number" placeholder="N° Inscripción" id="inscripción" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>tomo</span>
                <input type="text" placeholder="Tomo" id="tomo" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>Fecha</span>
                <input type="date" id="Fecha" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Oficina de Registro</span>
                <input type="text" placeholder="Oficina de Registro" id="registro" required>
                <small>Ingrese campos</small>
            </div>

            <h3>DATOS DEL REPRESENTANTE LEGAL O MANDATARIO DE LA EMPRESA</h3>

            <div class="form-group">
                <span>Nombres</span>
                <input type="text" placeholder="Nombres" id="nombre.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Apellidos</span>
                <input type="text" placeholder="Apellidos" id="apellidos.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cedula de identidad</span>
                <input type="text" placeholder="Cedula" id="cedula.empresa" onkeyup="cedularif('cedula.empresa','rif.empresa')" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" id="rif.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Direccion" id="direccion.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correo Electronico</span>
                <input type="email" placeholder="Correo Electronico" id="correo.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" id="telefono.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <h3>UBICACIÓN DEL ESTABLECIMIENTO</h3>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Direccion" id="direccion.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Ciudad</span>
                <input type="text" placeholder="Ciudad" id="ciudad.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Estado</span>
                <input type="text" placeholder="Estado" id="Estado.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" id="telefono.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <h3>PRODUCTO</h3>

            <div class="form-group">
                <span>Clase del producto</span>
                <input type="text" placeholder="Clase del producto" id="clase.producto" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Denominación del producto</span>
                <input type="text" placeholder="Denominación del producto" id="denominacion.producto" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Materia prima</span>
                <input type="text" placeholder="Materia prima" id="materiaprima.producto" required>
                <small>Ingrese campos</small>
            </div>
            
            <h3>------------------------------------------------------------------------</h3>
            <div class="form-group">
                <span>Sector/sector</span>
                <select type="text" name="sector" id="sector" required>
                    <option value="">Seleccione sector</option>
                    <option value="Maracay">Maracay</option>
                    <option value="Cojedes">Cojedes</option>
                    <option value="Bejuma">Bajuma</option>
                    <option value="La Victoria">La Victoria</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="button">
                <input type="submit" value="Registrarse">
            </div>
        </form>
</div>
<div class="container" style="width: 0px; padding: 0px;"></div>

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
        var final = document.getElementById(a).value
        document.getElementById(b).value= final + "-"
    }
</script>

</body>
</html>