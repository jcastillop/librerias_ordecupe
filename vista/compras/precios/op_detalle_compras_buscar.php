	
	<?php
	require_once("../../../conexiones/conexion.php");
	require_once("../../../conexiones/class_compras_detalle.php");
	$tra=new ordcomp_detalle();

	if(isset($_GET['mayor']))
  	{$mayor=$_GET['mayor'];}else{$mayor=0;};

	if(isset($_GET['menor']))
  	{$menor=$_GET['menor'];}else{$menor=0;};

	if(isset($_GET['porcentaje']))
  	{$porcentaje=$_GET['porcentaje'];}else{$porcentaje=0;};

  	if(isset($_GET['vacios']))
  	{$vacios=$_GET['vacios'];}else{$vacios=0;};


	$reg=$tra->get_ordcomp_detalle($_GET["emp"],$_GET["suc"],$_GET["cab"]);
	
	if($vacios==1){
	
	for($i=0;$i<count($reg);$i++){
		if($reg[$i]["def_por_mayor"]===null){
			
			if($porcentaje==1){
				$reg[$i]["def_por_mayor"]=($reg[$i]["precio"])*(1+$mayor/100);
			}else{
				$reg[$i]["def_por_mayor"]=$mayor;
			
			}
			
		}
		
		if($reg[$i]["def_por_menor"]===null){
			if($porcentaje==1){
				$reg[$i]["def_por_menor"]=($reg[$i]["precio"])*(1+$menor/100);	
			}else{
				$reg[$i]["def_por_menor"]=$menor;
			}
			
		}
		
	}

}else{
	for($i=0;$i<count($reg);$i++){
		if($porcentaje==1){				
			$reg[$i]["def_por_mayor"]=($reg[$i]["precio"])*(1+$mayor/100);
			$reg[$i]["def_por_menor"]=($reg[$i]["precio"])*(1+$menor/100);
		}else{
			$reg[$i]["def_por_mayor"]=$mayor;
			$reg[$i]["def_por_menor"]=$menor;
		}	
	}
}




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
