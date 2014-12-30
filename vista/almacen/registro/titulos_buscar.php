<?php
	require_once("conexion.php");
		$response = array (
            "nombre" => "",
            "precio" => 0,
            "codigo" => 0
    	);
	$tra=new titulos();
	$reg=$tra->get_titulo_por_id($_GET["id"]);
	if($reg){


		$response["codigo"]=$reg[0]["int_cod_tit"];
		$response["nombre"]=$reg[0]["var_nom_tit"];
		

		switch ($_GET["tipo_venta"]) {
  			case 1:
    			$response["precio"]=$reg[0]["dec_preven_def_tit"];
    			break;
  			case 2:
    			$response["precio"]=$reg[0]["dec_preven_sug_tit"];	
    			break;
		}



	}else{

		$response["nombre"]="";
		$response["precio"]=0;
		$response["titulo_codigo"]=0;
	}
	echo json_encode($response);	

?>		