 
        
<?php
require("conexion.php");
//******************************************************************
class ordcomp_cabecera
{
	//private $titulos=array();
	private $ordcomp_cabecera;
	
	public function __construct()
		{
			$this->ordcomp_cabecera=array();
		}
	public function get_ordcomp_cabecera()
	{
			
			$sk=mysql_query("set @a:=0;");
			$sql="select o.var_cod_comp_cab,p.var_rsoc_prov,od.int_cod_suc,
				s.var_nom_suc,o.int_cod_emp,e.var_nom_emp,month(o.date_fec_rec_comp_cab) as mes,year(o.date_fec_rec_comp_cab) as año   
				from T_ordcomp_cab o, T_ordcomp_det od
				inner join T_proveedor p on od.int_cod_prov=p.int_cod_prov 
				inner join T_sucursal s on s.int_cod_suc=od.int_cod_suc  
				inner join T_empresa e on e.int_cod_emp=od.int_cod_emp 
				where int_est_comp_cab=1 AND o.var_cod_comp_cab=od.var_cod_comp_cab 
				and o.int_cod_emp=od.int_cod_emp 
				and o.int_cod_suc=od.int_cod_suc
				group by CONCAT(o.var_cod_comp_cab, '_', p.var_rsoc_prov) 
				order by o.var_cod_comp_cab desc;
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->ordcomp_cabecera[]=$reg;
		}
			return $this->ordcomp_cabecera;
	}

	/*
	public function get_combo_editorial()
	{
		$sql="select * from t_editoriales ORDER BY int_cod_edit";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->titulos[]=$reg;
		}
			return $this->titulos;
	}*/
	
	public function get_combo_sucursal_update($id_sucursal)
	{
		$sql="select * from T_sucursal where not int_cod_suc='$id_sucursal'  ORDER BY int_cod_suc";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->pedidos[]=$reg;
		}
			return $this->pedidos;
	}
	/*
	public function get_combo_generos()
	{
		$sql="select * from t_generos ORDER BY int_cod_gen";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->titulos[]=$reg;
		}
			return $this->titulos;
	}*/
	
	public function get_combo_empresa_update($id_empresa)
	{
		$sql="select * from T_empresa where not int_cod_emp='$id_empresa'  ORDER BY int_cod_emp";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->pedidos[]=$reg;
		}
			return $this->pedidos;
	}
	/*
	public function get_combo_pais()
	{
		$sql="select int_cod_pais, var_nom_pais from t_pais ORDER BY int_cod_pais";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->titulos[]=$reg;
		}
			return $this->titulos;
	}*/
	
	public function get_combo_cliente_update($id_cliente)
	{
		$sql="select * from T_cliente where not int_cod_cli='$id_cliente'  ORDER BY int_cod_cli";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->pedidos[]=$reg;
		}
			return $this->pedidos;
	}
	/*	
	public function add_titulos($nom_tit,$autor_tit,$des_tit,$isbn_tit,$edic_tit,$numpag_tit,$edit_tit,$gen_tit,$pais_tit,$preven_def_tit,$preven_sug_tit,$est_tit,$cod_bar_tit,$usu_crea,$fec_crea,$usu_mod,$fec_mod)
	{
		$sql="
			insert into t_titulos values (null,
			'$nom_tit',
			'$autor_tit',
			'$des_tit',			
			'$isbn_tit',
			'$edic_tit',
			'$numpag_tit',
			'$edit_tit',
			'$gen_tit',
			'$pais_tit',
			'$preven_def_tit',
			'$preven_sug_tit',
			'$est_tit',
			'$cod_bar_tit',
			'$usu_crea',
			'$fec_crea',
			'$usu_mod',
			'$fec_mod')	
					";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('SE INSERTO CORRECTAMENTE');
		cerrar();
		window.location='titulos.php?load=1';
		</script>";
	}*/
	public function get_guia_por_id($id)
	{
		$sql="select 
			   	f.var_cod_fact_cab,
				f.var_cod_ser,
				f.int_tip_doc_fact,
				f.int_cod_suc,
				z.var_nom_suc,				
				f.int_cod_cli,
				c.var_rsoc_cli,
				f.int_cod_usu,
				u.var_nom_usu,
				date(f.date_fecenv_fact_cab) as date_fecenv_fact_cab
				from T_factura_cabecera f
				inner join T_serie s on s.var_cod_ser=f.var_cod_ser	
				inner join T_sucursal z on z.int_cod_suc=f.int_cod_suc
				inner join T_usuario u on u.int_cod_usu=f.int_cod_usu
				inner join T_cliente c on c.int_cod_cli=f.int_cod_cli
  				where f.var_cod_fact_cab='$id'";		
		 
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->guia[]=$reg;
		}
			return $this->guia;
	}
	public function edit_pedidos($id,$cod_suc,$cod_emp,$cod_cli,$est_ped,$fecpec_cab,$usu_mod)
	{
		//$sql="update titulos set nombre_titulos='$nom',texto='$texto' where id=$id";
	
		$sql="update T_pedido_cabecera "
			." set "
		
		."
		int_cod_suc='$cod_suc',
		int_cod_emp='$cod_emp',
		int_cod_cli='$cod_cli',
		int_est_pedi_cab='$est_ped',	
		date_fecped_pedi_cab='$fecpec_cab',	
		var_usumod_pedi_cab='$usu_mod',
		date_fecmod_pedi_cab=now()
		
		"
		
			." where "
			." var_cod_pedi_cab='$id' ";
			
			
			
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='mod_pedidos.php?id=$id && load=1';
		</script>
		<SCRIPT LANGUAGE=javascript>
  
		</SCRIPT> 
		
		";	
	
	}
	/*
	public function eliminar_pedidos($id)
	{
		$sql="delete from t_pedido_cabecera where var_cod_pedi_cab='$id'";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		
		window.location='eliminar_pedidos.php?eliminado=1';
		</script>";
	}*/
	
	
	public function get_ordcomp_cabecera_pdf($id_empresa,$id_suc,$id_var_compr)
	{
			
			//$sk=mysql_query("set @a:=0;");
		 $sql="
			
			    select 
				'1'orden,o.int_cod_emp,e.var_nom_emp,o.int_cod_suc,s.var_nom_suc,o.var_cod_comp_cab,''int_cod_tit,''var_nom_tit,''int_cant_com_det,''dec_val_comp_det,''total,date(o.date_fec_rec_comp_cab)fecha,cod_impor   
				from T_ordcomp_cab o
      inner join T_empresa e on e.int_cod_emp=o.int_cod_emp 
			inner join T_sucursal s on s.int_cod_suc=o.int_cod_suc
      where o.int_cod_emp='".$id_empresa."' and o.int_cod_suc='".$id_suc."' and o.var_cod_comp_cab='".$id_var_compr."'
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->ordcomp_cabecera[]=$reg;
		}
			return $this->ordcomp_cabecera;
	}
	
	
	
	public function get_ordcomp_detalle_pdf($id_empresa,$id_suc,$id_var_compr)
	{
			
			$sk=mysql_query("set @a:=0;");
			$sql="
			
select '2'orden,int_cod_emp_c,int_cod_suc_c,var_cod_comp_cab,int_cod_tit,var_nom_tit,int_cant_comp_det,dec_val_comp_det,(int_cant_comp_det*dec_val_comp_det)total,''fecha,''cod_impor from (
select s.int_cod_emp_c,s.int_cod_suc_c,s.var_cod_comp_cab,s.var_cod_comp_det,s.int_cod_tit,t.var_nom_tit,s.int_cant_comp_det,s.dec_val_comp_det
  from (
select (d.int_cod_emp)int_cod_emp_c,(d.int_cod_suc)int_cod_suc_c,d.var_cod_comp_cab,d.var_cod_comp_det,d.int_cod_tit,d.int_cant_comp_det,dec_val_comp_det from T_ordcomp_det d

where  d.var_cod_comp_cab in  (
select var_cod_comp_cab
				from T_ordcomp_cab o  where int_cod_emp='".$id_empresa."' and int_cod_suc='".$id_suc."' and var_cod_comp_cab='".$id_var_compr."'
)
) as s
inner join T_titulos t on t.int_cod_tit=s.int_cod_tit
)as s
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->ordcomp_cabecera[]=$reg;
		}
			return $this->ordcomp_cabecera;
	}
	
	
	
	
	/*
	public function eliminar_pedidos($id)
	{
		$sql="delete from t_pedido_cabecera where var_cod_pedi_cab='$id'";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		
		window.location='eliminar_pedidos.php?eliminado=1';
		</script>";
	}*/
	
	
	
}

?>
