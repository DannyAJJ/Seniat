<?php
if ($_SESSION['nivel']>0) {
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
                            <li><a href="../login/index.html" id="selected"></a></li>

                            <!-- style="width: 1000px;"> <img src="img/salir.png" alt="imagen clickeable" width="50" height="50"> -->

                                <!--Opcion 2-->
                            <li><a href="#">Liquidaciones</a>
                                <ul>
                                    <li><a href="#">BUSCAR</a></li>
                                </ul>
                            </li>

                                <!--Opcion 3-->
                            <li><a href="#">REPORTES</a>
                                <ul>
                                    <li><a href="#">BUSCAR</a></li>
                                </ul>
                            </li>

                                <!--Opcion 4-->
                            <li><a href="#">Contribuyentes</a>
                                <ul>
                                    <li><a href="../contribuyentes/Licores.php">Agregar licores</a></li>
                                    <li><a href="../contribuyentes/Tabacos.php">Agregar tabaco</a></li>
                                    <li><a href="../contribuyentes/ver_contribuyente.php">Ver</a></li>
                                </ul>
                            </li>

                            <!--Opcion 5-->
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
                            </li>

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

</body>
</html>