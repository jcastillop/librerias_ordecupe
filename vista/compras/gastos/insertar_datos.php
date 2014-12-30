<?php
	
	require_once("utilitarios.php");
	$_cod_com=$_POST['cod_com'];
	$_cod_suc=$_POST['cod_suc'];
	$_cod_emp=$_POST['cod_emp'];
	$_fac_com=$_POST['fac_com'];
	
	if(isset($_POST['tipo_accion'])){$_tipo_accion=$_POST['tipo_accion'];}else{$_tipo_accion='';};
	$_ped_usu='JCASTILLO';

	$array = json_decode($_POST['detalle']);
	//permitira contar el numero de registros editados/insertados
	$contador = 0; 
	//si el tipo de accion es 1 procedera a editar
	if($_tipo_accion>1){
	$cant=utilitarios::get_cant_comp_gas($_cod_suc,$_cod_emp,$_cod_com);



		for($i=0;$i<count($array);$i++){ 
			//nuevo codigo de detalle considerando el maximo registro adicionado 
			$cod_comp_det=$cant+$i+1;
			//descripcion del gasto
			$desc = $array[$i]->descripcion;
			//monto del gasto
			$monto = $array[$i]->monto;
		
			//llamado del procedimiento almacenado para editar el detalle
			$query_call_spcompgas = "CALL proc_modificar_comp_gas('".$_cod_com."',".$_cod_suc.","
																.$_cod_emp.",'".$desc."',".$monto.",'".$_ped_usu."',@n_Flag, @c_msg)";
																
			
			mysql_query($query_call_spcompgas,Conectar::con());
	
			$array_flag = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
			$array_mensaje = mysql_fetch_array(mysql_query("Select @c_msg",Conectar::con()));
			$mensaje = $array_mensaje["@c_msg"];
		
	
			$contador=$contador+1; 
		
   		};



		echo "Numero de registros editados:".$contador;
	/*

   		*/
//si el tipo de accion es diferente a 1  procedera a insertar nuevos registros
	}else{
	
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
};



	$query_insertar_fob_cabecera="update T_ordcomp_cab set dec_fob_comp_cab=".$_fac_com." where int_cod_emp=".$_cod_emp." and int_cod_suc=".$_cod_suc." and var_cod_comp_cab='".$_cod_com."'";
   	mysql_query($query_insertar_fob_cabecera,Conectar::con());

		
		       
       
      
     



//metodo de busqueda de codigo titulos
//metodo de busqueda de codigo proveedor
//metodo busqueda codigo moneda
//metodo busqueda tipo cambio (segun fecha)
?>
