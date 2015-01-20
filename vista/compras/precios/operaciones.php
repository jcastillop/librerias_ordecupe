<?php

if(isset($_POST['a_precio_sug_may'])){$a_precio_sug_may=json_decode($_POST['a_precio_sug_may']);}else{$a_precio_sug_may='';};
if(isset($_POST['a_precio_sug_men'])){$a_precio_sug_men=json_decode($_POST['a_precio_sug_men']);}else{$a_precio_sug_men='';};
if(isset($_POST['a_precio_def_may'])){$a_precio_def_may=json_decode($_POST['a_precio_def_may']);}else{$a_precio_def_may='';};
if(isset($_POST['a_precio_def_men'])){$a_precio_def_men=json_decode($_POST['a_precio_def_men']);}else{$a_precio_def_men='';};
if(isset($_POST['p_mayor'])){$p_mayor=$_POST['p_mayor'];}else{$p_mayor='';};
if(isset($_POST['p_menor'])){$p_menor=$_POST['p_menor'];}else{$p_menor='';};
if(isset($_POST['boolean_porcentaje'])){$boolean_porcentaje=$_POST['boolean_porcentaje'];}else{$boolean_porcentaje='';};
if(isset($_POST['boolean_vacios'])){$boolean_vacios=$_POST['boolean_vacios'];}else{$boolean_vacios='';};

$respuesta="";
/*
if($a_precio_def_men[1]->monto===null){
	$respuesta="vacia wey";

}else{
	$respuesta="llena";
};
echo $respuesta.$p_mayor;
*/
if($boolean_vacios==1){
	
	for($i=0;$i<count($a_precio_sug_may);$i++){
		if($a_precio_def_may[$i]->monto===null){
			if($boolean_porcentaje==1){
				$a_precio_def_may[$i]->monto=($a_precio_sug_may[$i]->monto)*(1+$p_mayor/100);
			}else{
				$a_precio_def_may[$i]->monto=$p_mayor;
			}
			
		}
		if($a_precio_def_men[$i]->monto===null){
			if($boolean_porcentaje==1){
				$a_precio_def_men[$i]->monto=($a_precio_sug_men[$i]->monto)*(1+$p_menor/100);	
			}else{
				$a_precio_def_men[$i]->monto=$p_menor;
			}
			
		}
	}

}else{
	for($i=0;$i<count($a_precio_sug_may);$i++){
		if($boolean_porcentaje==1){				
			$a_precio_def_may[$i]->monto=($a_precio_sug_may[$i]->monto)*(1+$p_mayor/100);
			$a_precio_def_men[$i]->monto=($a_precio_sug_men[$i]->monto)*(1+$p_menor/100);
		}else{
			$a_precio_def_may[$i]->monto=$p_mayor;
			$a_precio_def_men[$i]->monto=$p_menor;
		}	
	}
}

echo json_encode(array('mayor'=>$a_precio_def_may,'menor'=>$a_precio_def_men));

?>  