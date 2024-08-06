<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT `Numero_registro` FROM `licencia_licores` WHERE `Numero_autorizacion` = '".$_POST['licencia']."' AND `Numero_registro` IS NOT NULL;";
$res = $conn->query($sql);
if ($res->num_rows == 0) {
    echo 0;
}else {
    echo 1;
}

?>