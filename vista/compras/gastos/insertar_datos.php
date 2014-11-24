<?php
	require_once("../../../conexiones/conexion.php");
	$_cod_com=$_POST['cod_com'];
	$_cod_suc=$_POST['cod_suc'];
	$_cod_emp=$_POST['cod_emp'];
	$_ped_usu='JCASTILLO';

	$array = json_decode($_POST['detalle']);

	$contador = 0; 

	for($i=0;$i<count($array);$i++){ 
		$cod_comp_det=$i+1;
		$desc = $array[$i]->descripcion;
		$monto = $array[$i]->monto;
		
		//falta codigo de barra del libro
		$query_call_spcompgas = "CALL proc_insertar_comp_gas('".$_cod_com."',".$_cod_suc.","
																.$_cod_emp.",'".$desc."',".$monto.",'".$_ped_usu."',@n_Flag, @c_msg)";
																
		
		mysql_query($query_call_spcompgas,Conectar::con());
	
		$array_flag = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
		$array_mensaje = mysql_fetch_array(mysql_query("Select @c_msg",Conectar::con()));
		$mensaje = $array_mensaje["@c_msg"];
		
	
		$contador=$contador+1; 
		
   		};


	
	echo "Numero de registros insertados: ".$contador;

		

		
		       
       
      
     



//metodo de busqueda de codigo titulos
//metodo de busqueda de codigo proveedor
//metodo busqueda codigo moneda
//metodo busqueda tipo cambio (segun fecha)
?>
