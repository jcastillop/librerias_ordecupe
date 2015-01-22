	
	<?php

	require_once("../../../../conexiones/class_historico_compras_pdf.php");
	$tra=new historico_compras();
	
	$reg=$tra->get_conta_compras($_GET["emp"],$_GET["mes"],$_GET["anho"]);

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
