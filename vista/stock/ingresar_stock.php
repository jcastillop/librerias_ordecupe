<?php
 @session_start();
  $user=$_SESSION['usuario'];
 $suc=$_POST["cb_suc"];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_stock.php");
require_once("../../conexiones/conexion.php");
//print_r($_POST);nick_usu
$tra=new stock();
$tra->generar_stock(1,
				$suc,
					$user);
?>