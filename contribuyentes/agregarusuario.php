<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilosss.css">
    <link rel="icon" href="img/icono.png">
    <title>formulario3</title>
</head>
<body>

<div class="container">

        <form id="form-validation" novalidate>
        <a href="../menu/index.html"></a> 
        <br>
            <h3>NUEVO USUARIO</h3>

            <div class="form-group">
                <span>Cargo</span>
                <input type="text" placeholder="Ingrese Cargo" id="cargo" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correo Institucional</span>
                <input type="text" placeholder="Correo Institucional" id="correo" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cedula</span>
                <input type="number" placeholder="Ingrese su Cedula" id="cedula" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Nombre y apellidos</span>
                <input type="text" placeholder="Ingrese Nombre y Aepllido" id="nombre" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Contraseña</span>
                <input type="password" placeholder="Ingrese la contraseña" id="contraseña" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Unidad</span>
                <input type="text" placeholder="Ingrese Unidad" id="unidad" required>
                <small>Ingrese campos</small>
            </div>
        
            <div class="button">
                <input type="submit" value="Registrarse">
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
</script>

</body>
</html>