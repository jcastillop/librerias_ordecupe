
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
	$cprecio= $reg[$i]["dec_preven_def_tit"];
	
		echo "$cname|$cid|$cprecio\n";

}
?>
