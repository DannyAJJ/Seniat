<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../index.html');
}else {
    if (intval($_SESSION['nivel'])<1) {
        header('location: ../menu/index.php');
    }
}
$id_solicitante = $_GET['licencia'];
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta SQL para seleccionar los datos del solicitante
$solicitante_query = "SELECT * FROM `licencia_licores` WHERE `Numero_autorizacion` = '$id_solicitante'";
$result_solicitante = $conn->query($solicitante_query);

// Verificar si hay resultados
if ($result_solicitante->num_rows > 0) {
    $solicitante_data = $result_solicitante->fetch_assoc();
} else {
    echo "No se encontraron resultados";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilosss.css">
    <link rel="icon" href="img/icono.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>formulario3</title>

</head>
<body>

<div class="container" id="container1">

        <form id="form-validation" action="../insertar_eliminar_contribuyentes/actualizar_licencia_licores.php?licenica=<?php echo $id_solicitante; ?>" method="POST"  novalidate>
        <a class="links" href="../menu/index.php"></a>

        <center><h2>PRIMERA IMPRESION DE LICENCIA <br><?php echo $id_solicitante; ?></h2></center>
            <div class="form-group">
                <span>Numero de Registro</span>
                <input type="text" placeholder="Numero de Registro" name="numeron_registro" value="<?php echo $solicitante_data['Numero_registro']; ?>" required>
                <small>Ingrese campos</small>
            </div>

                           <h3>DATOS DEL SOLICITANTE</h3>
            <div class="form-group" id="combo">
                <span>Tipo de Solicitante</span>
                <select type="text" name="tipodepersona" required>
                    <option value="1">Firma Juridica</option>
                    <option value="0">Firma Personal</option>
                </select>
            </div>
            
            <div class="form-group">
                <span>Razón social</span>
                <input type="text" placeholder="Ingrese Nombre y Apellido/Denominación" name="nombre" value="<?php echo $solicitante_data['Razon_social']; ?>" required>
                <small>Ingrese campos</small>
            </div>
            
            <div class="form-group"  id="cedula2"style="display: none;">
                <span>Nacionalidad</span>
                <select type="text"  name="nacionalidad">
                    <option value="1">VENEZOLANO</option>
                    <option value="0">EXTRANJERO</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group" id="cedula" style="display: none;">
                <span>Cedula</span>
                <input type="text" placeholder="Cedula" name="cedula" value="<?php echo $solicitante_data['Numero_cedula_solicitante']; ?>" onkeyup="cedularif('cedula','rif')">
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" name="rifempresa" value="<?php echo $solicitante_data['Numero_rif_solicitante']; ?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Domicilio fiscal</span>
                <input type="text" placeholder="Domicilio fiscal" name="domiciliofiscal" value="<?php echo $solicitante_data['Direccion']; ?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="telefono" value="<?php echo $solicitante_data['Telefono_solicitante'];?>">
            </div>

            <div class="form-group">
                <span>N° Inscripción</span>
                <input type="number" placeholder="N° Inscripción" name="inscripcion" value="<?php echo $solicitante_data['N_inscripcion'];?>" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>tomo</span>
                <input type="text" placeholder="Tomo" name="tomo" value="<?php echo $solicitante_data['Tomo'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Oficina de Registro</span>
                <input type="text" placeholder="Oficina de Registro" name="registro" value="<?php echo $solicitante_data['Oficina_resgistro_mercantil'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <h3>DATOS DEL REPRESENTANTE LEGAL O MANDATARIO DE LA EMPRESA</h3>

            <div class="form-group">
                <span>Nombres</span>
                <input type="text" placeholder="Nombres" name="nombrerepresentante" value="<?php echo $solicitante_data['Administrador_representante_legal'];?>" required>
                <small>Ingrese campos</small>
            </div>
            <div class="form-group">
                <span>Nacionalidad</span>
                <select type="text"  name="nacionalidadrepresentante">
                    <option value="1">VENEZOLANO</option>
                    <option value="2">EXTRANJERO</option>
                </select>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Cedula de identidad</span>
                <input type="text" placeholder="Cedula" name="cedularepresentante" value="<?php echo $solicitante_data['Cedula_representante'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>RIF</span>
                <input type="text" placeholder="RIF" name="rif" value="<?php echo $solicitante_data['Numero_rif_representante'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Direccion" name="direccionrepresentante" value="<?php echo $solicitante_data['Direccion_representante_legal'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Correo Electronico</span>
                <input type="email" placeholder="Correo Electronico" name="correorepresentante" value="<?php echo $solicitante_data['Correo_representante'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="telefonorepresentante" value="<?php echo $solicitante_data['Telefono_reprensentante'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <h3>BEBIDA ALCOHÓLICA</h3>

            <div class="form-group">
                
                <div id="Container">
                <span>Tipo de fabrica</span>
                <select type="text"  name="claseproducto" id="comboproducto1" required>
                    <option value="1">Cerveza</option>
                    <option value="2">Bebidas y Especies Alcohólicas</option>
                    <option value="3">Fabrica de vinos</option>
                </select>
                </div>
                <table>
                    <tr>
                        <td><input type="checkbox" id="check1" style="display: none;"></td>
                        <td><label for="check1" id="labelcheck1" style="display: none;color: rgb(255, 255, 255);padding-left: 10px;">Sangria adicion de alcohol</label></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="check2" style="display: none;"></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" id="check3" style="display: none;" ></td>
                        <td><label for="check1" id="labelcheck3" style="display: none; color: rgb(255, 255, 255);padding-left: 10px;">Vinos</label></td>
                    </tr>
                </table>
                <!--<button id="añadir" style="display: none;" type="button" onclick="a=a+1,anadir(a)">AÑADIR</button> -->
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Fuerza real o Grado lcohólico G.L, °GL</span>
                <input type="number" placeholder="Fuerza real o Grado lcohólico G.L, °GL" name="gradoalcoholicoproducto" value="<?php echo $solicitante_data['Grado_alcoholico'];?>" required>
                <small>Ingrese campos</small>
            </div>

            <div class="form-group">
                <span>Materia prima</span>
                <input type="text" placeholder="Materia prima" name="materiaprimaproducto" value="<?php echo $solicitante_data['Materia_prima'];?>" required>
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

        function cedularif(a,b) {
            var final = document.getElementsByName(a).value
            document.getElementsByName(b).value= final + "-"
        }
    </script>

    <script>
        a=1
        if (typeof sangria == 'undefined') {
            var sangria = 1
        }
        if (typeof conalcohol == 'undefined') {
            var conalcohol=1;    
        }
        if(typeof vinos == 'undefined'){
            var vinos= 1;
        }
        
        function anadir(a) {
            //const c = $('#comboproducto'+a-1).val();
            var b = document.getElementById("comboproducto"+(a-1));
            console.log(b.value);
            if (b.value==3) {
                sangria=0;
            }if (b.value==4) {
                conalcohol=0;
            }if (b.value==5){
                vinos=0;
            };
            $.ajax({
                url: 'anadir.php',
                type: 'POST',
                data: {a:a,sangria:sangria,conalcohol:conalcohol,vinos:vinos},
                success: function(data) {
                    $('#Container').append(data);
                },
                error:
                function() {
                    alert('Error al obtener los detalles completos');
                }
            });
        }

        const comboproducto = document.getElementById("comboproducto1");
        const check1 = document.getElementById("check1");
        const check2= document.getElementById("check2");
        const check3 = document.getElementById("check3");
        const label1 = document.getElementById("labelcheck1");
        const label2 = document.getElementById("labelcheck2");
        const label3 = document.getElementById("labelcheck3");

        comboproducto.addEventListener("change", function() {

            if (this.value >2) {
                check1.style.display = "block";
                check2.style.display = "block";
                check3.style.display = "block";
                label1.style.display = "block";
                label2.style.display = "block";
                label3.style.display = "block";
            } else {
                check1.checked = false;
                check2.checked = false;
                check3.checked = false;
                check1.style.display = "none";
                check2.style.display = "none";
                check3.style.display = "none";
                label1.style.display = "none";
                label2.style.display = "none";
                label3.style.display = "none";
                
            }
        });

        check1.addEventListener("change", function() {
            if (check1.checked) {
                check1.value=1;
            } else {
                check1.value=0;
            }
        });
        check2.addEventListener("change", function() {
            if (check2.checked) {
                check2.value=1;
            } else {
                check2.value=0;
            }
        });
        check3.addEventListener("change", function() {
            if (check3.checked) {
                check3.value=1;
            } else {
                check3.value=0;
            }
        });

        const combo = document.getElementById("combo");
        const cajaTexto = document.getElementById("cedula");
        const cajaTexto2 = document.getElementById("cedula2");
        var trampa = true;
        combo.addEventListener("change", function() {
            if (trampa) {
                cajaTexto.style.display = "block";
                cajaTexto2.style.display = "block";
            } else {
                cajaTexto.style.display = "none";
                cajaTexto2.style.display = "none";
            }
            trampa = !trampa;
        });



    </script>

    <main>
        <video muted autoplay loop>
            <source src="../video/videof.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </main>

</body>
</html>