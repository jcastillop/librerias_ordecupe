<?php
//******************************************************************
class rol
{
	//private $usuario=array();
	private $rol;
	
	public function __construct()
		{
			$this->rol=array();
		}
	
	public function get_combo_rol()
	{
		$sql="select * from T_rol ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->rol[]=$reg;
		}
			return $this->rol;
	}
	
	public function get_combo_rol_update($id_rol)
	{
		$sql="select * from T_rol where not int_cod_rol='$id_rol'  ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->rol[]=$reg;
		}
			return $this->rol;
	}
	
		public function get_combo_rol_empresa_id($id)
	{
	echo 	$sql="
		select cod_empresa,e.var_nom_emp,''dato from (
select (int_cod_emp)cod_empresa from T_empresa where not int_cod_emp in (  select int_cod_emp from T_permisos 
where int_cod_usu=".$id.")

) as em inner join T_empresa e on e.int_cod_emp=em.cod_empresa

union all 

select p.int_cod_emp,e.var_nom_emp,(1)dato from T_permisos p 
INNER join T_empresa e on e.int_cod_emp=p.int_cod_emp
where p.int_cod_usu=".$id."
		
		";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->rol[]=$reg;
		}
			return $this->rol;
	}
	
	

	public function get_usuario_por_id($id)
	{
		$sql="select
		 u.int_cod_usu,
		 u.var_nick_usu,
		 u.int_cod_rol,
		 r.var_nom_rol,
		 u.var_nom_usu,
		 u.var_appat_usu,
		 u.var_apmat_usu,
		 u.int_est_usu,
		 u.var_cla_usu from T_usuario u
		 inner join T_rol r on r.int_cod_rol=u.int_cod_rol 
		 where u.int_cod_usu='$id'
		 ";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->rol[]=$reg;
		}
			return $this->rol;
	}
	
	public function get_combo_empresa()
	{
		$sql="select int_cod_emp,var_nom_emp from T_empresa
		 ";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->rol[]=$reg;
		}
			return $this->rol;
	}
	
	public function eliminar_permisos($id)
	{
		$sql="delete from T_permisos where int_cod_usu=$id";
		$res=mysql_query($sql,Conectar::con());
		
		
	
	}
	
	
	
}
?>
