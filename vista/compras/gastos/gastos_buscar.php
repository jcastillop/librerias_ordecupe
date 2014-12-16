<?php
	require_once("../../../conexiones/class_compras_gastos.php");
	$tra=new compras_gastos();
	
	$reg=$tra->get_compra_detalle_suc_emp($_GET["cod"],$_GET["suc"],$_GET["emp"]);
	$tra=new compras_gastos();
	$total=$tra->get_compra_suma_detalle_suc_emp($_GET["cod"],$_GET["suc"],$_GET["emp"]);
	
	array_unshift($reg,$total);
	//array_push($reg, $total);
	echo json_encode($reg);	

/*
	echo "<PRE>";
	print_r($reg);
	echo "</PRE>";
*/
?>