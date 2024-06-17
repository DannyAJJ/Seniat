<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilosss.css">
    <link rel="icon" href="img/icono.png">
    <title>formulario3</title>

</head>
<body>

<div class="container" id="container1">

        <form id="form-validation" action="licoresinsertar.php"  novalidate>
        <a href="../menu/index.html"></a>

                           <center><h3>DATOS DEL SOLICITANTE</h3></center>
            <div class="form-group">
                <span>Tipo de persona</span>
                <select type="text" name="Tipo de persona" name="tipodepersona" required>
                    <option value="">Seleccione</option>
                    <option value="Natural">Natural</option>
                    <option value="Juridica">Juridica</option>
                </select>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Nombre y apellidos/Denominacion</span>
                <input type="text" placeholder="Ingrese Nombre y Aepllido/Denominacion" name="nombre" required>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Cedula de identidad</span>
                <select type="text"  name="cedulacombo" required>
                    <option value="">Seleccione</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
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
                <input type="text" placeholder="RIF" name="rif" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Domicilio fiscal</span>
                <input type="text" placeholder="Domicilio fiscal" name="domicilio fiscal" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Ciudad</span>
                <input type="text" placeholder="Ciudad" name="ciudad" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Estado</span>
                <input type="text" placeholder="Estado" name="estado" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="telefono" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correro Electronico</span>
                <input type="Email" placeholder="Ingrese Correo Electronico" name="correoelectronico" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>N° Inscripción</span>
                <input type="number" placeholder="N° Inscripción" name="inscripción" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>tomo</span>
                <input type="text" placeholder="Tomo" name="tomo" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>Fecha</span>
                <input type="date" name="Fecha" required>
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
                <input type="text" placeholder="Nombres" name="nombre.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Apellidos</span>
                <input type="text" placeholder="Apellidos" name="apellidos.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cedula de identidad</span>
                <input type="text" placeholder="Cedula" name="cedula.empresa" onkeyup="cedularif('cedula.empresa','rif.empresa')" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" name="rif.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Direccion" name="direccion.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correo Electronico</span>
                <input type="email" placeholder="Correo Electronico" name="correo.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="telefono.empresa" required>
                <small>Ingrese campos</small>
            </div>

            <h3>UBICACIÓN DEL ESTABLECIMIENTO</h3>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Direccion" name="direccion.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Ciudad</span>
                <input type="text" placeholder="Ciudad" name="ciudad.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Estado</span>
                <input type="text" placeholder="Estado" name="Estado.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="telefono.establecimiento" required>
                <small>Ingrese campos</small>
            </div>

            <h3>BEBIDA ALCOHÓLICA</h3>

            <div class="form-group">
                <span>Clase del producto</span>
                <input type="text" placeholder="Clase del producto" name="clase.producto" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Fuerza real o Grado lcohólico G.L, °GL</span>
                <input type="text" placeholder="Fuerza real o Grado lcohólico G.L, °GL" name="gradoalcoholico.producto" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Materia prima</span>
                <input type="text" placeholder="Materia prima" name="materiaprima.producto" required>
                <small>Ingrese campos</small>
            </div>
            
            <h3>------------------------------------------------------------------------</h3>
            <div class="form-group">
                <span>Sector/sector</span>
                <select type="text" name="sector" name="sector" required>
                    <option value="">Seleccione sector</option>
                    <option value="Maracay">Maracay</option>
                    <option value="Cojedes">Cojedes</option>
                    <option value="Bejuma">Bajuma</option>
                    <option value="La Victoria">La Victoria</option>
                </select>
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

</body>
</html>