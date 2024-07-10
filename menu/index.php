<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../login/index.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menudef1</title>
    <!--<link rel="stylesheet" href="css/estilos.css">-->
    <link rel="stylesheet" href="estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="img/icono.png">
    
    <script src="../jquery-3.7.1.min.js"></script>

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

</head>
<body>
    <header>
            <div class="header__superior">
                <div class="logo">
                    <img src="img/logo1.png" alt="">
                </div>

                <div class="logo1">
                    <img src="img/logo2.png" alt="">
                </div>
            </div>

            <div class="container__menu">

                <div class="menu">
                    <nav>
                        <ul>
                                <!--Opcion 1-->
                            <li><a id="selected" onclick="cerrar()"></a></li>

                                <!--Opcion 2-->
                            <li><a href="#">Liquidaciones</a>
                                <ul>
                                    <li><a href="../liquidaciones/ver_liquidacion.php">BUSCAR</a></li>
                                </ul>
                            </li>

                                <!--Opcion 3-->
                            <li><a href="#">REPORTES</a>
                                <ul>
                                    <li><a href="../reportes/reporte_licores.html">PRODUCCION LICORES</a></li>
                                    <li><a href="#">PVP LICORES</a></li>
                                    <li><a href="../reportes/reporte_tabaco.html">PVP TABACO</a></li>
                                </ul>
                            </li>

                                <!--Opcion 4-->
                            <li><a href="#">Contribuyentes</a>
                                <ul>
                                    <?php 
                                    if ($_SESSION['nivel']>1) {
                                        echo '
                                    <li><a href="../contribuyentes/Licores.php">Agregar licores</a></li>
                                    <li><a href="../contribuyentes/Tabacos.php">Agregar tabaco</a></li>
                                    ';
                                    }
                                    ?>
                                    <li><a href="../contribuyentes/ver_contribuyente.php">Ver</a></li>
                                </ul>
                            </li>
                            <?php
                            //echo $_SESSION["nivel"];
                            if ($_SESSION['nivel']==3) {
                                echo '<!--Opcion 5-->
                            <li><a href="#">Gestion de usuario</a>
                                <ul>
                                    <li><a href="../usuarios/agregar_usuario.php">Agregar</a></li>
                                    <li><a href="../usuarios/ver_usarios.php">Ver</a></li>
                                </ul>
                            </li>

                            <!--Opcion 6-->
                            <li><a href="../firmas/agregar_firma.php">Agregar Firmas</a>
                                <!--<ul>
                                    <li><a href="#">Diseño1</a></li>
                                    <li><a href="#">Diseño2</a></li>
                                    <li><a href="#">Diseño3</a></li>
                                </ul>-->
                            </li>';
                            }
                            ?>

                        </ul>

                    </nav>
                </div>   
            </div>

    </header>
    
    <!-- <section>
    </section> -->

    <main>
        <video muted autoplay loop>
            <source src="./video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

    <script>
        function cerrar() {
            $.ajax({
url: 'cerrar_sesion.php',
type: 'POST',
data: {},
success: function(data) {
    location.href = "../login/index.html";
},
error:
function() {
  alert('error al cerrar sesion');
}
});
        }
    </script>
</body>
</html>