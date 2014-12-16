
<?php
require_once("../../../conexiones/class_provincia.php");
require_once("../../../conexiones/conexion.php");
?>
<?php
$rpta="";

	
	$tra=new provincia();
			$reg=$tra->get_combo_provincia($_POST["elegido2"],$_POST["elegido3"]);
			for ($i=0;$i<count($reg);$i++)
			{
				$provincia=$reg[$i]['var_nom_provi'];
				$id_provincia=$reg[$i]['int_cod_provi']; 
				
				echo   "
	<option value='".$id_provincia."'>".$provincia."</option>		
	";	
		    }	
	


echo $rpta;	
?>
        