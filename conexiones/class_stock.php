<?php
//******************************************************************
class stock
{
	//private $titulos=array();
	private $stock;
	
	public function __construct()
		{
			$this->stock=array();
		}
	public function get_stock()
	{
		$sql="select 
				s.int_cod_suc,
				s.int_cod_emp,
				s.int_cod_tit,
				t.var_nom_tit,
				s.int_cant_stk,
				date(s.date_fecact_stk) as date_fecact_stk
				from T_stock s
				inner join T_titulos t on t.int_cod_tit=s.int_cod_tit
				inner join T_sucursal z on z.int_cod_suc=s.int_cod_suc
				order by s.int_cod_tit desc
		
		";		
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->stock[]=$reg;
		}
			return $this->stock;
	}
	
	public function generar_stock($cod_emp,$cod_suc,$usuario){
		 $sql="CALL proc_generar_stock(".$cod_emp.",".$cod_suc.",'".$usuario."',@n_Flag, @c_msg); ";
		$res=mysql_query($sql,Conectar::con());
		$array_flag = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
        $array_msg = mysql_fetch_array(mysql_query("Select @c_msg",Conectar::con()));
        $codigo_flag = $array_flag["@n_Flag"];
        $codigo_msg = $array_msg["@c_msg"];
        /*
        echo "<script type='text/javascript'>
		        alert('".$codigo_msg."');
		      </script>";
		      */
	}

		public function actualizar_stock($cod_emp,$usuario)
	{
		$sql="select * from T_sucursal where int_est_Suc <>0 and int_cod_emp=".$cod_emp.";";		
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			
			$sql_stock="CALL proc_generar_stock(".$cod_emp.",".$reg["int_cod_suc"].",'".$usuario."',@n_Flag, @c_msg); ";
			mysql_query($sql_stock,Conectar::con());

		}
			
	}
		
	
}
?>
