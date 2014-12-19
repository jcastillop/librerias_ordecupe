<?php

	require_once("../../../conexiones/class_reportes.php");
	require_once("../../../conexiones/fechas.php");
	$tra=new reportes();
	
	$fecini=Fechas::mifechagmtactual(time(),-5);
	$fecfin=Fechas::mifechagmtactual(time(),-5);
	$reg=$tra->get_reporte_ventas('%%',$fecini, $fecfin);

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