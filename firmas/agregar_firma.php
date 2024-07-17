<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../index.html');
}else {
    if (intval($_SESSION['nivel'])<3) {
        header('location: ../menu/index.php');
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilosf.css">
    <link rel="icon" href="img/icono.png">
    <title>formulario3</title>
</head>
<body>

<div class="container">

        <form id="form-validation" action="insertarfirma.php" method="POST" novalidate>
        <a href="../menu/index.php"></a>

            <center><h3>AGREGAR NUEVA FIRMA</h3></center>

            <div class="form-group">
                <span>Nombre y apellidos</span>
                <input type="text" placeholder="Ingrese Nombre y Aepllido" name="nombre" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cargo</span>
                <input type="text" placeholder="Ingrese Cargo" name="cargo" required>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Providencia</span>
                <input type="text" placeholder="Ingrese Providencia" name="providencia" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>gaceta</span>
                <input type="text" placeholder="Ingrese Gaceta" name="gaceta" required>
                <small>Ingrese campos</small>
            </div>

            <div class="button">
                <input type="submit" value="AGREGAR">
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

    <main>
        <video muted autoplay loop>
            <source src="../video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

</body>
</html>