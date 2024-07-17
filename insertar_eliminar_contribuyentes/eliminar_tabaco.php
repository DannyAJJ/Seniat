<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$texto = $_POST['Texto'];
$n = $_POST['Numero'];
$sql = "UPDATE licencia_tabaco SET Habilitado = $n WHERE Numero_autorizacion = $texto ;";
$conn->query($sql);
?>