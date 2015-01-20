<?php
  require("../../../conexiones/conexion.php");
if(isset($_POST['a_codigo'])){$a_codigo=json_decode($_POST['a_codigo']);}else{$a_codigo='';};
if(isset($_POST['a_precio_def_may'])){$p_may=json_decode($_POST['a_precio_def_may']);}else{$p_may='';};
if(isset($_POST['a_precio_def_men'])){$p_men=json_decode($_POST['a_precio_def_men']);}else{$p_men='';};


	for($i=0;$i<count($a_codigo);$i++){
		
		$query=
		"update T_titulos 
		set dec_preven_sug_tit=".$p_may[$i].",dec_preven_def_tit=".$p_men[$i]." 
		where int_cod_tit=".$a_codigo[$i];
		mysql_query($query,Conectar::con()); 
	}

echo "Registros actualizados";
?>  