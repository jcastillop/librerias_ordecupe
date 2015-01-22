<?php

 	@session_start();
  	$session_empresa=$_SESSION['id_empresa'];
	
	require_once("../../../conexiones/class_guia_pdf.php");
	$tra=new guia_cabecera();
	$reg=$tra->get_guia_cabecera_detalle_por_codcabecera($_GET["id"],$_GET["serie"],$_GET["sucursal"],$session_empresa);
	
	echo json_encode($reg);	
?>