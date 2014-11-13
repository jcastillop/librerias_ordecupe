<?php
	
	require_once("../../../conexiones/class_guia_pdf.php");
	$tra=new guia_cabecera();
	$reg=$tra->get_guia_cabecera_detalle_por_codcabecera($_GET["id"]);
	echo json_encode($reg);	
?>