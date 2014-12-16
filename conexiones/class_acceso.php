
<?php
require("conexion.php");
//******************************************************************
class acceso
{
	//private $usuario=array();
	private $cliente;
	
	public function __construct()
		{
			$this->acceso=array();
		}
	public function get_acceso($id)
	{
		$sql="
		
		select p.int_cod_emp,p.int_cod_usu,e.var_nom_emp ,case when count(p.int_cod_emp)<=1 then 0 else 1 end dato,count(p.int_cod_emp) c   from T_permisos p 
inner join T_empresa e on e.int_cod_emp=p.int_cod_emp 

where p.int_cod_usu=$id

				";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->acceso[]=$reg;
		}
			return $this->acceso;
	}
	
	
	
	public function accesos_permisos($id)
	{
		$sql="
		
select p.int_cod_emp,e.var_nom_emp from T_permisos p
inner join T_empresa e on e.int_cod_emp=p.int_cod_emp
 where p.int_cod_usu=$id

		
		
		";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->acceso[]=$reg;
		}
			return $this->acceso;

	}
}
?>
