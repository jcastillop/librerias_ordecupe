
<?php
require_once("../../../../conexiones/conexion.php");
require_once("../../../../conexiones/class_cliente_autocompletado.php");



 if (!$_GET["q"]) return;
$tra=new cliente();
$reg=$tra->get_cod_comp_titulo_like(strtolower($_GET["q"]));
for ($i=0;$i<count($reg);$i++)
{
       

	$cid = $reg[$i]["var_cod_bar_tit"];
	$cedic = $reg[$i]["var_edic_tit"];
	$cname = $reg[$i]["var_nom_tit"];
	$cautor = $reg[$i]["var_autor_tit"];
	$cisbn = $reg[$i]["var_isbn_tit"];
	$cn_pag = $reg[$i]["int_numpag_tit"];
	$cedit = $reg[$i]["var_nom_edit"];
	$cgen = $reg[$i]["var_nom_gen"];
	$cpais = $reg[$i]["var_nom_pais"]; 
	$cdesc = $reg[$i]["var_des_tit"];
	
		echo "$cname|$cid|$cedic|$cautor|$cisbn|$cn_pag|$cedit|$cgen|$cpais|$cdesc\n";

}
?>
