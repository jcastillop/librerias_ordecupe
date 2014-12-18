<?php
require("conexion.php");
//******************************************************************
class reportes
{
	//private $usuario=array();
	private $reporte;
	
	public function __construct()
	{
		$this->reporte=array();
	}
	public function get_reporte_ventas()
	{
		$sql="select * from(
              select t.int_cod_suc, t.int_cod_emp, t.int_cod_tit, p.var_nom_tit, sum(t.int_cant_guia_det) int_cant_guia_det
                from T_guia_cabecera y, T_guia_detalle t, T_titulos p  
               where y.int_cod_suc=t.int_cod_suc and
                     y.int_cod_emp=t.int_cod_emp and
                     y.var_cod_guia_cab=t.var_cod_guia_cab and
                     t.int_cod_tit=p.int_cod_tit and
                     t.int_cod_emp=1 and
                     t.int_cod_suc=1 and
                     date(y.date_fecenv_guia_cab) between '2014-11-01' and '2014-12-12'
            group by t.int_cod_suc, t.int_cod_emp, t.int_cod_tit, p.var_nom_tit) x 
            order by x.int_cant_guia_det desc";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
		return $this->reporte;
	}
	
	public function get_reporte_stock_min($cant)
	{
		$sql="select 
				s.int_cod_tit,
				t.var_nom_tit,
				s.int_cant_stk
				from T_stock s
				INNER JOIN T_titulos t on t.int_cod_tit=s.int_cod_tit
				where s.int_cant_stk <'$cant'
				order by s.int_cod_tit desc";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
		return $this->reporte;
	}
}
?>