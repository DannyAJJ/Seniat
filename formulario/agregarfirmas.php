<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilos.css">
    <link rel="icon" href="img/icono.png">
    <title>formulario3</title>
</head>
<body>

<div class="container">

        <form id="form-validation" novalidate>

            <h3 style = "width: 1000px;" >FIRMA DEL NUEVO DIRECTOR</h3>

            <div class="form-group">
                <span>Nombre y apellidos</span>
                <input type="text" placeholder="Ingrese Nombre y Aepllido" id="nombre" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cargo</span>
                <input type="text" placeholder="Ingrese Cargo" id="cargo" required>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Denominación del producto</span>
                <input type="text" placeholder="Denominación del producto" id="denominacion.producto" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Denominación del producto</span>
                <input type="text" placeholder="Denominación del producto" id="denominacion.producto" required>
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