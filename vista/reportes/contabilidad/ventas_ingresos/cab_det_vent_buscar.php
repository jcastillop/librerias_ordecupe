	
	<?php

	require_once("../../../../conexiones/class_historico_ventas_pdf.php");
	$tra=new factura_cabecera();
	
	$reg=$tra->get_conta_ventas_factura_cabecera_detalle($_GET["emp"],$_GET["mes"],$_GET["anho"]);

	$res= array(
		"draw" => 1,
			    "recordsTotal" => count($reg),
        "recordsFiltered" => count($reg),
          "data"=>$reg);

/*
	echo "<pre>";
print_r ($reg);	
echo "</pre>";

*/
echo json_encode($res);
	?>
