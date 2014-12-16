<?php
require("conexion.php");
class compras_gastos{

	private $gastos;
	
	public function __construct(){
		
		$this->gastos=array();
	}

	public function get_compra_detalle_suc_emp($cod_cab,$cod_suc,$cod_emp)
	{
		
		$sql="select c.var_desc_comp_cab, date(c.date_fec_rec_comp_cab) as date_fec_rec_comp_cab,	g.var_cod_comp_gas,
				g.var_des_comp_gas,g.dec_val_comp_gas
				from T_ordcomp_cab c
				inner join T_ordcomp_gas g on c.var_cod_comp_cab=g.var_cod_comp_cab
				where c.var_cod_comp_cab='$cod_cab' and c.int_cod_suc=$cod_suc and c.int_cod_emp=$cod_suc and c.int_est_comp_cab=1 and g.int_est_comp_gas=1 
			";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->gastos[]=$reg;
		}
			return $this->gastos;
	}

		public function get_compra_suma_detalle_suc_emp($cod_cab,$cod_suc,$cod_emp)
	{
		
		$sql="select date(c.date_fec_rec_comp_cab) as date_fec_rec_comp_cab,sum(d.dec_val_comp_det) as total, c.var_desc_comp_cab from T_ordcomp_det d inner join T_ordcomp_cab c on c.var_cod_comp_cab=d.var_cod_comp_cab where d.var_cod_comp_cab='$cod_cab' and d.int_cod_suc=$cod_suc and d.int_cod_emp=$cod_emp";	
		/*
		$res=mysql_query($sql,Conectar::con());
		
		$reg=mysql_fetch_array($res);

		return $reg['total'];
		*/	
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->gastos[]=$reg;
		}
			return $this->gastos;
	}

}
?>