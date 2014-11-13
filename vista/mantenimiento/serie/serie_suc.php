<?php
  require_once("../../../conexiones/class_sucursal.php");
  require_once("../../../conexiones/conexion.php");
?>
<select  name="cb_suc" style="width: 200px;" id="cb_suc" class="input username">
  <option>--Seleccione--</option>
  <?php
    $tra=new sucursal();
    $reg=$tra->get_combo_sucursales($_GET['id']);
    for ($i=0;$i<count($reg);$i++)
    {
  ?>
	<option value="<?php echo $reg[$i]["int_cod_suc"];?>"><?php echo $reg[$i]["var_nom_suc"];?></option>		
  <?php
    }
  ?>
</select>
          
