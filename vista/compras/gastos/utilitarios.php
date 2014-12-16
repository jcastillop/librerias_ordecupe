<?php
require("../../../conexiones/conexion.php");
class utilitarios
{
	private $utilitarios;

	public function __construct(){
		$this->utilitarios=0;
	}

	public function get_cant_comp_gas($cod_suc,$cod_emp,$cod_cab)
	{
		$sql="select cast(max(g.var_cod_comp_gas) AS UNSIGNED) as cantidad from T_ordcomp_gas g where g.int_cod_suc=$cod_suc and g.int_cod_emp=$cod_emp and g.var_cod_comp_cab='$cod_cab';";
				$res=mysql_query($sql,Conectar::con());
				$reg=mysql_fetch_array($res);
				$utilitarios = $reg["cantidad"];
		return $utilitarios;
	}

}
?>