   
<?php

//******************************************************************
class cliente
{
	//private $usuario=array();
	private $cliente;
	
	public function __construct()
		{
			$this->cliente=array();
		}

		public function get_cliente_like($q)
	{
		$sql="select 
				c.int_cod_cli,
				c.var_rsoc_cli,
				case when c.int_est_cli=1 then 'Activo' else 'Inactivo' end int_est_cli,
				case when c.int_tipper_cli=1 then 'Natural' ELSE 'Juridico' END int_tipper_cli,
				c.var_ruc_cli,
				c.var_dir_cli,
				c.var_refdom_cli,
				c.int_cod_pais,
				p.var_nom_pais,
				c.int_cod_dept,
				d.var_nom_dept,
				c.int_cod_provi,
				pr.var_nom_provi,
				c.var_dist_cli,
				c.var_telf_cli,
				c.var_fax_cli,
				c.var_dni_cli,
				c.var_cor_cli
				from T_cliente c
				inner join T_pais p on p.int_cod_pais=c.int_cod_pais
				inner join T_departamentos d on d.int_cod_dept=c.int_cod_dept
				inner join T_provincias pr on pr.int_cod_provi=c.int_cod_provi
				where int_est_cli=1 and int_iden_suc_cli=0 and c.var_rsoc_cli like '%$q%'
				order by int_cod_cli desc
				";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->cliente[]=$reg;
		}
			return $this->cliente;
	}
	
	public function get_cod_titulo_like($q)
	{
		$sql="select int_cod_tit, var_cod_bar_tit,var_nom_tit,dec_preven_def_tit,dec_preven_sug_tit from T_titulos where int_est_tit=1 and var_nom_tit like '%$q%'";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->cliente[]=$reg;
		}
			return $this->cliente;
	}
	public function get_nom_titulo_like($q)
	{
		$sql="select int_cod_tit,var_nom_tit from T_titulos where int_est_tit=1 and var_nom_tit like '%$q%'";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->cliente[]=$reg;
		}
			return $this->cliente;
	}
	
	public function get_cod_comp_titulo_like($q)
	{
		$sql="select 
					t.*,
					 e.var_nom_edit,
					 p.var_nom_pais,
					 g.var_nom_gen 
					from T_titulos t, T_editoriales e, T_pais p, T_generos g
					where int_est_tit=1 and t.int_cod_edit=e.int_cod_edit and t.int_cod_pais=p.int_cod_pais 
					and t.int_cod_gen=g.int_cod_gen and var_nom_tit like '%$q%'";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->cliente[]=$reg;
		}
			return $this->cliente;
	}
}
?>
