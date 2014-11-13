<?php
 @session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../../conexiones/class_serie.php");
require_once("../../../conexiones/conexion.php");
//print_r($_POST);nick_usu
$tra=new serie(); 
$tra->add_serie($_POST['cb_suc'],
				$_POST['cb_emp'],
				$_POST['txt_ser'],
				$user,
				$fecha_actual);
?>
