<?php
require("conexion.php");
class ordcomp_cabecera
{
	//private $titulos=array();
	private $ordcomp_cabecera;
	
	public function __construct()
		{
			$this->ordcomp_cabecera=array();
		}


		public function get_ordcomp_cabecera_por_cod_documento($cod_doc)
	{
			
		$sql="select * from T_ordcomp_cab c where c.var_nomdoc_comp_cab='$cod_doc' and c.int_est_comp_cab=1";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->ordcomp_cabecera[]=$reg;
		}
			return $this->ordcomp_cabecera;
	}

}
?>		