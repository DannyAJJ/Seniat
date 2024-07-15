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
    <link rel="stylesheet" href="stilosu.css">
    <link rel="icon" href="img/icono.png">
    <title>formulario3</title>
</head>
<body>

<div class="container">

        <form id="form-validation" novalidate>
        <a href="../menu/index.php"></a> 

            <center><h3>BUSCAR USUARIO</h3></center>

            <div class="form-group">
                <span>Cedula</span>
                <input type="number" placeholder="Ingrese su Cedula" id="cedula" required>
                <small>Ingrese campos</small>
            </div>
        
            <div class="button">
                <input type="submit" value="BUSCAR">
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