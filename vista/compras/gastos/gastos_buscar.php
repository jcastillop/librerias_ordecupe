<?php
	require_once("../../../conexiones/class_compras_gastos.php");
	$tra=new compras_gastos();
	
	$reg=$tra->get_compra_detalle_suc_emp($_GET["cod"],$_GET["suc"],$_GET["emp"]);
	
	echo json_encode($reg);	
?>