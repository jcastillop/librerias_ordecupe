<?php
//******************************************************************
class reportes
{
	//private $usuario=array();
	private $reporte;
	
	public function __construct()
	{
		$this->reporte=array();
	}
	public function get_reporte_ventas($tit, $fecini, $fecfin)
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
                     p.var_nom_tit like '$tit'and
                     date(y.date_fecenv_guia_cab) between '$fecini' and '$fecfin'
            group by t.int_cod_suc, t.int_cod_emp, t.int_cod_tit, p.var_nom_tit) x 
            order by x.int_cant_guia_det desc;";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
		return $this->reporte;
	}
	
	public function get_reporte_stock_min($cant, $fecini, $fecfin)
	{
		if($cant==""){
			$cant1="";
			}
			else
			{
			$cant1="s.int_cant_stk <'$cant' and";	
			}
		
		$sql="select 
				s.int_cod_tit,
				t.var_nom_tit,
				s.int_cant_stk,
				date(s.date_fecact_stk) as date_fecact_stk 
				from T_stock s
				INNER JOIN T_titulos t on t.int_cod_tit=s.int_cod_tit
				where  $cant1  date(s.date_fecact_stk) between'$fecini' and '$fecfin'
				order by s.int_cod_tit desc;";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
		return $this->reporte;
	}
	public function get_todo()
	{
				
		$sql="select 
				s.int_cod_tit,
				t.var_nom_tit,
				s.int_cant_stk,
				s.int_cod_suc,
				z.var_nom_suc,
				date(s.date_fecact_stk) as date_fecact_stk 
				from T_stock s
				INNER JOIN T_titulos t on t.int_cod_tit=s.int_cod_tit
				INNER JOIN T_sucursal z on z.int_cod_suc=s.int_cod_suc  where s.date_fecact_stk=month(now())
				order by s.int_cod_tit desc;";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
		return $this->reporte;
	}

	public function get_por_suc_cant($sucursal, $cantidad)
	{
	  
		if ($sucursal=='0')
		{
			
		echo $sucursald="";	
		}
		else
		{
			
		if ($cantidad=='0' )
		{
		$and="";	
		}
		else
		{
			$and="and";
		}
		echo $sucursald="z.var_nom_suc='".$sucursal. "'".$and;	
		}
		
		if ($cantidad==0)
		{
		$cantidadd="";	
		}
		else
		{
		$cantidadd="s.int_cant_stk < ".$cantidad;	
		}
		
		if ($cantidad=='0' && $sucursal=='0')
			{
		$where="";
		}
		else
		{
		$where=" where  ";
		}	
		 $sql="select 
				s.int_cod_tit,
				t.var_nom_tit,
				s.int_cant_stk,
				s.int_cod_suc,
				z.var_nom_suc,
				date(s.date_fecact_stk) as date_fecact_stk 
				from T_stock s
				INNER JOIN T_titulos t on t.int_cod_tit=s.int_cod_tit
				INNER JOIN T_sucursal z on z.int_cod_suc=s.int_cod_suc
				$where $sucursald  $cantidadd 
				order by s.int_cod_tit desc;";
				
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->reporte[]=$reg;
		}
		return $this->reporte;
	}
}
?>