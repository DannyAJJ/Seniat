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

        <form id="form-validation" action="insertarusuario.php" method="POST" novalidate>
        <a href="../menu/index.php"></a>
        
            <center><h3>NUEVO USUARIO</h3></center>
            
            <div class="form-group">
                <span>Cedula</span>
                <input type="number" placeholder="Ingrese su Cedula" name="cedula" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>Nombre y apellidos</span>
                <input type="text" placeholder="Ingrese Nombre y Aepllido" name="nombre" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Nivel de usuario</span>
                <select type="text"  name="nivel" required>
                    <option value="">Seleccione</option>
                    <option value="1">Nivel 1</option>
                    <option value="2">Nivel 2</option>
                    <option value="3">Nivel 3</option>
                </select>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group">
                <span>Unidad</span>
                <select type="text"  name="unidad" required>
                    <option value="">Seleccione</option>
                    <option value="1">Valencia</option>
                    <option value="2">Cojedes</option>
                    <option value="3">Bejuma</option>
                    <option value="4">La victoria</option>
                    <option value="5">Maracay</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correo Institucional</span>
                <input type="text" placeholder="Correo Institucional" name="correo" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Contraseña</span>
                <input type="password" placeholder="Ingrese la contraseña" name="contraseña" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Nombre de usuario</span>
                <input type="text" placeholder="Nombre de usuario" name="username" required>
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
</script>

    <main>
        <video muted autoplay loop>
            <source src="../video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

</body>
</html>