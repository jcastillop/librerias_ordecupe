<?php

	require_once("../../../conexiones/class_compras_busqueda_excel.php");
	$tra=new ordcomp_cabecera();
	$reg=$tra->get_ordcomp_cabecera_por_cod_documento($_GET["id"]);
	echo json_encode($reg);	

?>		