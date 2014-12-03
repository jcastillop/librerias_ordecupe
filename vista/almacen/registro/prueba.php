<?php
/*Este metodo debe ser cambiado para guardar en las tablas guia detalle, producto detalle*/
require_once("conexion.php");
$cant=utilitarios::get_cant_det_ped(1,1,'000004');
echo $cant;
?>