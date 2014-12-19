
	<?php

	require_once("../../../conexiones/class_compras_detalle.php");
	$tra=new ordcomp_detalle();
	
	$reg=$tra->get_ordcomp_detalle(1,1,'000001');

	$res= array(
			    "TotalRecords" => count($reg),
        "TotalDisplayRecords" => count($reg),
          "data"=>$reg);

/*
	echo "<pre>";
print_r ($reg);	
echo "</pre>";

*/
echo json_encode($res);
	?>
