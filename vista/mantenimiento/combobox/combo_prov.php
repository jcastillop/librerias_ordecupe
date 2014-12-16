
<?php
require_once("../../../conexiones/conexion.php");
require_once("../../../conexiones/class_proveedor.php");

?>
<?php
$rptas="";

	
	$tra=new cliente();
			$reg=$tra->get_combo_prov();
			for ($i=0;$i<count($reg);$i++)
			{
				$rsocial=$reg[$i]['rsocial'];
				$id_emp=$reg[$i]['id_prov']; 
				
				echo   "
	<option value='".$id_emp."'>".$rsocial."</option>		
	";	
		    }	
	


echo $rptas;	
?>