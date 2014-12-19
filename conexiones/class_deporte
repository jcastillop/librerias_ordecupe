<?php
//******************************************************************
class reporte
{
	//private $titulos=array();
	private $reporte;
	
	public function __construct()
		{
			$this->reporte=array();
		}
	public function get_reporte()
	{
		$sql="
		
		
select s.int_cod_emp_c,e.var_nom_emp,s.int_cod_suc_c,s.var_nom_suc,s.var_cod_comp_cab,s.var_cod_comp_det,s.int_cod_tit,count(s.int_cod_tit)cant,t.var_nom_tit,fecha from (
select (d.int_cod_emp)int_cod_emp_c,(d.int_cod_suc)int_cod_suc_c,d.var_cod_comp_cab,d.var_cod_comp_det,d.int_cod_tit,date(c.date_fec_rec_comp_cab)fecha from T_ordcomp_det d
left join  T_ordcomp_cab c on c.int_cod_emp=d.int_cod_emp and c.int_cod_suc=d.int_cod_suc and c.var_cod_comp_cab=d.var_cod_comp_cab

) as s


inner join T_titulos t on t.int_cod_tit=s.int_cod_tit
inner JOIN T_empresa e on e.int_cod_emp=s.int_cod_emp_c
inner join T_sucursal s on s.int_cod_suc=s.int_cod_suc_c

 GROUP BY int_cod_tit ORDER BY cant desc 

		
		";		
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
			return $this->reporte;
	}
		
		
		
public function get_reporte_detallado($fec1,$fec2,$empresa,$sucursal)
	{
		$sql="
		
		
select s.int_cod_emp_c,e.var_nom_emp,s.int_cod_suc_c,s.var_nom_suc,s.var_cod_comp_cab,s.var_cod_comp_det,s.int_cod_tit,count(s.int_cod_tit)cant,t.var_nom_tit,fecha from (
select (d.int_cod_emp)int_cod_emp_c,(d.int_cod_suc)int_cod_suc_c,d.var_cod_comp_cab,d.var_cod_comp_det,d.int_cod_tit,date(c.date_fec_rec_comp_cab)fecha from T_ordcomp_det d
left join  T_ordcomp_cab c on c.int_cod_emp=d.int_cod_emp and c.int_cod_suc=d.int_cod_suc and c.var_cod_comp_cab=d.var_cod_comp_cab
where d.int_cod_emp='$empresa' and d.int_cod_suc='$sucursal' and date(c.date_fecadd_comp_cab) between STR_TO_DATE('$fec1','%d-%m-%Y') and STR_TO_DATE('$fec2','%d-%m-%Y')
) as s


inner join T_titulos t on t.int_cod_tit=s.int_cod_tit
inner JOIN T_empresa e on e.int_cod_emp=s.int_cod_emp_c
inner join T_sucursal s on s.int_cod_suc=s.int_cod_suc_c

 GROUP BY int_cod_tit ORDER BY cant desc 

		
		";		
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
			return $this->reporte;
	}
				
	
	
}
?>
