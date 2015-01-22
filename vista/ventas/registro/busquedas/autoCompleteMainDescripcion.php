
<?php
require_once("../../../../conexiones/conexion.php");
require_once("../../../../conexiones/class_cliente_autocompletado.php");



 if (!$_GET["q"]) return;
$tra=new cliente();
$reg=$tra->get_cod_titulo_like(strtolower($_GET["q"]));
for ($i=0;$i<count($reg);$i++)
{
       

	$cid = $reg[$i]["var_cod_bar_tit"];
	$cname = $reg[$i]["var_nom_tit"];
	$menor_precio= $reg[$i]["dec_preven_def_tit"];
	$ctit = $reg[$i]["int_cod_tit"];
	$mayor_precio= $reg[$i]["dec_preven_sug_tit"];
	echo "$cname|$cid|$menor_precio|$ctit|$mayor_precio\n";

}
?>
