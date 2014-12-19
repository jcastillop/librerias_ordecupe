<?php
require("conexion.php");
class ordcomp_detalle
{
	//private $titulos=array();
	private $ordcomp_detalle;
	
	public function __construct()
		{
			$this->ordcomp_detalle=array();
		}


		public function get_ordcomp_detalle($cod_emp,$cod_suc,$cod_cab)
	{
			
		$sql="select * from T_ordcomp_det d 
	inner join T_titulos t on t.int_cod_tit=d.int_cod_tit 
	inner join T_proveedor p on p.int_cod_prov=d.int_cod_prov 
	inner join T_editoriales e on e.int_cod_edit=t.int_cod_edit 
		where d.int_est_comp_det=1 and d.int_cod_emp=$cod_emp and d.int_cod_suc=$cod_suc and d.var_cod_comp_cab='$cod_cab'";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->ordcomp_detalle[]=$reg;
		}
			return $this->ordcomp_detalle;
	}

}
?>		