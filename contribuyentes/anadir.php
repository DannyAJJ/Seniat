<?php 
$a = $_POST['a'];
?>

<div class="form-group">
                <span>Clase del producto <?php echo $a; ?></span>
                <select type="text" name="Tipo de persona" name="clase.producto<?php echo $a; ?>" required>
                    <option value="">Seleccione</option>
                    <option value="Natural">Natural</option>
                    <option value="Juridica">Juridica</option>
                </select>
                <small>Ingrese campos</small>
            </div>

