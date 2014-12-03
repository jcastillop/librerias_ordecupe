<?php
require("conexion.php");
class utilitarios
{
	private $utilitarios;

	public function __construct()
	{
		$this->utilitarios=array();
	}

	public function get_almacen($cod_suc,$cod_emp,$cod_cab)
	{
		$sql="select cast(max(d.var_cod_pedi_det) AS UNSIGNED) as cantidad from T_pedido_detalle d where d.int_cod_suc=$cod_suc and d.int_cod_emp=$cod_emp and d.var_cod_pedi_cab='$cod_cab';";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->utilitarios[]=$reg;
		}
			return $this->utilitarios;
	}
}
?>