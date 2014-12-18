
<?php
require_once("../../../conexiones/class_departamento.php");
require_once("../../../conexiones/conexion.php");
?>
<?php
$rpta="";

	
	$tra=new departamento();
			$reg=$tra->get_combo_departamentos($_POST["elegido"]);
			echo "<option>--Seleccione--</option>";
			for ($i=0;$i<count($reg);$i++)
			{
				$departamento=$reg[$i]['var_nom_dept'];
				$id_departamento=$reg[$i]['int_cod_dept']; 
				
					
				echo   "
	<option value='".$id_departamento."'>".$departamento."</option>		
	";	
		    }	
	


echo $rpta;	
?>