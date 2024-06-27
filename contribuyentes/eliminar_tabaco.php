<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$texto = $_POST['texto'];
$sql = "UPDATE `licencia_tabaco` SET `Habilitado`= 0 WHERE `Numero_autorizacion` = $texto;";
$conn->query($sql);
?>