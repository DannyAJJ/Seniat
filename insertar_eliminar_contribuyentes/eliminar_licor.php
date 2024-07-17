<?php
$texto = $_POST['Texto'];
$n = $_POST['Numero'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "UPDATE `licencia_licores` SET `Habilitado`= $n WHERE `Numero_autorizacion` = '$texto';";
$conn->query($sql);
json_encode($texto);
?>