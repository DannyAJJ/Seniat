<?php 
$a = $_POST['a'];
$sangria = $_POST['sangria'];
$conalcohol = $_POST['conalcohol'];
$vinos = $_POST['vinos'];
?>

<?php
if ($a<4) {
echo'<div class="form-group">
                <span> Clase de producto con vino <?php echo $a; ?></span>
                <select type="text" name="Tipo de persona" id="comboproducto'.$a.'" name="clase.producto<?php echo $a; ?>" required>
                    <option value="">Seleccione</option>';

                    if ($sangria==1) {
                        echo'<option value="3">Sangria Fermentada</option>';
                    }

                    if ($conalcohol==1) {
                        echo'<option value="4">Sangria Adición de Alcohol</option>';
                    }
                    
                    if ($vinos==1) {
                        echo'<option value="5">Vinos</option>';
                    }
                echo'</select>
                <small>Ingrese campos</small>
            </div>';
}

?>