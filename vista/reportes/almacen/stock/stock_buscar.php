	
	<?php
	require_once("../../../../conexiones/conexion.php");
	require_once("../../../../conexiones/class_stock.php");
	require_once("../../../../conexiones/class_reportes.php");
	//actualizarndo stock
	 @session_start();
  	$user=$_SESSION['usuario'];


  	$eject=new stock();
	$eject->actualizar_stock(1,$user);
	//generando consulta

	$tra=new reportes();
	
	$reg=$tra->get_stock_tit_edit_aut_maxfecha();

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
