<?php 
$cedula =$_POST['cedula'];
$nombre = $_POST['nombre'];
$nivel = $_POST['nivel'];
$unidad = $_POST['unidad'];
$correo =$_POST['correo'];
$contra = $_POST['contraseña'];
$user = $_POST['username'];



// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
echo "
<script>
    console.log('".$user."')
</script>
";

$sql = "INSERT INTO `usuarios` (`Cedula_funcionario`,`Nombre_funcionario`,`Nivel_usuario`,`Unidad`,`Correo_institucional`,`Contraseña`,`Username`) VALUES ('$cedula','$nombre','$nivel',$unidad,'$correo','$contra','$user')";
$siglas = $conn->query($sql);
header("Location:../menu/index.php");




?>

