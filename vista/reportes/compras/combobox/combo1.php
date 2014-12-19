
<?php
require_once("../../../../conexiones/class_sucursal.php");
require_once("../../../../conexiones/conexion.php");
?>
<?php
$rpta="";

	
	$tra=new sucursal();
			$reg=$tra->get_sucursal_por_id_empresa($_POST["elegido"]);
			
			
			echo "	<option value='0'>TODOS</option>	";
			for ($i=0;$i<count($reg);$i++)
			{
				$cod_suc=$reg[$i]['int_cod_suc'];
				$nombre=$reg[$i]['var_nom_suc']; 
				
				echo   "
	<option value='".$cod_suc."'>".$nombre."</option>		
	";	
		    }	
	


echo $rpta;	
?>
