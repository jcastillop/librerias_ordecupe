<?php
  require("../../../conexiones/conexion.php");
  //UpdateData.php
  $id = $_REQUEST['id'] ;
  $value = $_REQUEST['value'] ;
  $column = $_REQUEST['columnName'] ;
  $columnPosition = $_REQUEST['columnPosition'] ;
  $columnId = $_REQUEST['columnId'] ;
  $rowId = $_REQUEST['rowId'] ;

  /* Update a record using information about id, columnName (property
     of the object or column in the table) and value that should be
     set */ 
switch ($columnPosition) {
  case 5:
    $query_actualizar_precio_titulos="update T_titulos set dec_preven_sug_tit=".$value." where int_cod_tit=".$id;
    break;
  case 6:
    $query_actualizar_precio_titulos="update T_titulos set dec_preven_def_tit=".$value." where int_cod_tit=".$id;
    break;
}

  mysql_query($query_actualizar_precio_titulos,Conectar::con()); 

  echo $value;

?>