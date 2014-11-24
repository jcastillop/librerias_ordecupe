<?php
require("conexion.php");
class compras_gastos{

	private $gastos;
	
	public function __construct(){
		
		$this->gastos=array();
	}

	public function get_compra_detalle_suc_emp($cod_cab,$cod_suc,$cod_emp)
	{
		
		$sql="select  
			c.var_desc_comp_cab,
			date(c.date_fec_rec_comp_cab) as date_fec_rec_comp_cab,
			g.var_cod_comp_gas,
			g.var_des_comp_gas,g.dec_val_comp_gas,(select sum(d.dec_val_comp_det) from T_ordcomp_det d where d.var_cod_comp_cab='$cod_cab' and d.int_cod_suc=$cod_suc and d.int_cod_emp=$cod_suc) as total  
			from T_ordcomp_cab c
			inner join T_ordcomp_gas g on c.var_cod_comp_cab=g.var_cod_comp_cab
			where c.var_cod_comp_cab='$cod_cab' and c.int_cod_suc=$cod_suc and c.int_cod_emp=$cod_suc
			";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->gastos[]=$reg;
		}
			return $this->gastos;
	}

}
?>