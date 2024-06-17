<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../formulario/stilos.css">
    <link rel="icon" href="img/icono.png">
    <title>formulario3</title>
</head>
<body>

<div class="container">

        <form id="form-validation" novalidate>

            <h3 style = "width: 1000px;" >BUSCAR CONTRIBUYENTES</h3>

            <div class="form-group">
                <span>Cedula</span>
                <input type="number" placeholder="Ingrese su Cedula" id="cedula" required>
                <small>Ingrese campos</small>
            </div>
        
            <div class="button">
                <input type="submit" value="Buscar">
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