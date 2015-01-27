<?php
/*
$servidor="192.168.1.200";
$user_conexion='grupo1';
$clave='123456';
$bd_server_libreria='bd_libreria_test';
*/

$servidor="www.sbcc-peru.com";
$user_conexion='sbccperu_sbcc';
$clave='sbcc2014';
$bd_server_libreria='sbccperu_libreria';

class Conectar
{
public static function con()
{
$conexion=mysql_connect("www.sbcc-peru.com","sbccperu_sbcc","sbcc2014");
//$conexion=mysql_connect("192.168.1.200","grupo1","123456");
mysql_query("SET NAMES 'utf8'");
mysql_select_db("sbccperu_libreria");
//mysql_select_db("bd_libreria_test");
return $conexion;
}
}
// obtener fecha actual del sistema
function mifechagmtactual($fecha_timestamp,$gmt=0)
{
$timestamp=$fecha_timestamp; //puedes poner aqui la hora en formato "Unix timestamp" obtenida de una tabla
$diferenciahorasgmt = (date('Z', time()) / 3600 - $gmt) * 3600; //La diferencia de horas entre el GMT del servidor y el GMT que queremos, en mi caso mi servidor es GTM-4, y si quiero un GTM -5 la diferencia será de -1 hora
$timestamp_ajuste = $timestamp - $diferenciahorasgmt; //restamos a la hora actual la diferencia horaria en mi caso será -1 hora
$fecha_hora = date("Y-m-d", $timestamp_ajuste); //mostramos la fecha/hora
return $fecha_hora;
}

//obtener fecha y hora actual del sistema
function mifechagmt($fecha_timestamp,$gmt=0)
{
$timestamp=$fecha_timestamp; //puedes poner aqui la hora en formato "Unix timestamp" obtenida de una tabla
$diferenciahorasgmt = (date('Z', time()) / 3600 - $gmt) * 3600; //La diferencia de horas entre el GMT del servidor y el GMT que queremos, en mi caso mi servidor es GTM-4, y si quiero un GTM -5 la diferencia será de -1 hora
$timestamp_ajuste = $timestamp - $diferenciahorasgmt; //restamos a la hora actual la diferencia horaria en mi caso será -1 hora
$fecha_hora = date("Y-m-d H:i:s", $timestamp_ajuste); //mostramos la fecha/hora
return $fecha_hora;
}
?>