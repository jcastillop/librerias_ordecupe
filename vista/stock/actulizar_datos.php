<?php
/*Este metodo debe ser cambiado para guardar en las tablas guia detalle, producto detalle*/
require("../../conexiones/conexion.php");

/*
$descuento_produto = 1.2;
*/

$_cod_emp=$_POST['cod_emp'];
$_cod_suc=$_POST['cod_suc'];
$_ped_usu=$_POST['ped_usu'];    
;

$_cod_usu=$_POST['cod_usu'];

$fecha_hora_actual =Fechas::mifechagmt(time(),-5);

$array = json_decode($_POST['pedido_detalle']);
$response = array ("codigo" => "", "mensaje" => "", "tipo" => 0);


if($_codigo_guia_cabecera!=''){
  //Procedimiento almacenado para editar cabecera de guia y pedido
    
    $response["codigo"]=$_codigo_guia_cabecera;
    $response["tipo"]=1;


    //creando query del PA editar pedido cabecera

    $query_call_spcab_edit_ped = "CALL proc_modificar_pedi_cab('".$_codigo_pedido_cabecera."',".$_cod_emp.",".$_cod_suc.","
                                                                     .$_cod_cli.",1,'".$_fec_pedido."','"
                                                                     .$_ped_usu."',@n_Flag, @c_msg)";





  mysql_query($query_call_spcab_edit_ped,Conectar::con());
  $array_flag_editar_pedido_cabecera = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
  $array_mensaje_editar_pedido_cabecera = mysql_fetch_array(mysql_query("Select @c_msg",Conectar::con()));
  $flag_edicion_pedido_cabecera = $array_flag_editar_pedido_cabecera["@n_Flag"];
  $mensaje_edicion_pedido_cabecera = $array_mensaje_editar_pedido_cabecera["@c_msg"]; 
  
 
};
   
    echo json_encode($response);

?> 

