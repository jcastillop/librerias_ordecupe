<?php
	require_once("conexion.php");
	$term=$_GET["term"];
	$titu=new titulos();
	$results=$titu->get_titulo_like($term);
	echo json_encode($results);	

?>		