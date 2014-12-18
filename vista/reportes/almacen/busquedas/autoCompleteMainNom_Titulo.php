
<?php
require_once("../../../../conexiones/conexion.php");
require_once("../../../../conexiones/class_cliente_autocompletado.php");



 if (!$_GET["q"]) return;
$tra=new cliente();
$reg=$tra->get_nom_titulo_like(strtolower($_GET["q"]));
for ($i=0;$i<count($reg);$i++)
{
       

	$cid = $reg[$i]["int_cod_tit"];
	$cname = $reg[$i]["var_nom_tit"];
	
		echo "$cname|$cid\n";

}
?>
