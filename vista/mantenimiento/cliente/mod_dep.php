<?php
require_once("../../../conexiones/class_departamento.php");
require_once("../../../conexiones/conexion.php");

	?>

          <select  name="departamento" style="width: 200px;" id="departamento" class="input username" onchange="from(document.form1.departamento.value,'mei','cliente_prov.php')">
          <option>--Seleccione--</option>
	<?php
			$tra=new departamento();
			$reg=$tra->get_combo_departamentos_update($cod_pais,$cod_dept);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_dept"];?>"><?php echo $reg[$i]["var_nom_dept"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
          
