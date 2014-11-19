        <?php
require("conexion.php");
//******************************************************************
class factura_cabecera
{
	//private $titulos=array();
	private $factura_cabecera;
	
	public function __construct()
		{
			$this->factura_cabecera=array();
		}
	public function get_factura_cabecera($cod_fac,$cod_serv,$cod_suc,$cod_emp,$tip_doc_fac)
	{
		
		$sk=mysql_query("set @a:=0;");
		
	 	$sql="select 
					@a11:=@a+1 as id,
					f.var_cod_fact_cab,
					f.var_cod_ser,
					case when f.int_tip_doc_fact=1 then 'Boleta' ELSE 'Factura' END int_tip_doc_fact,
					f.int_cod_suc,
					CONCAT(f.var_cod_ser,'-',f.var_cod_fact_cab)serie,
					z.var_nom_suc,				
					f.int_cod_cli,
					c.var_rsoc_cli,
					c.var_ruc_cli,
					c.var_dir_cli,	
					f.int_cod_usu,
					u.var_nom_usu,
					date(f.date_fecenv_fact_cab) as date_fecenv_fact_cab,
					   YEAR(date_fecenv_fact_cab)anio,
					   
						
						
					case when month(date_fecenv_fact_cab)=1 then 'Enero' else case when month(date_fecenv_fact_cab)=2 then 'Febrero' else case when month(date_fecenv_fact_cab)=3 then 'Marzo' else case when month(date_fecenv_fact_cab)=4 then 'Abril' ELSE
case when month(date_fecenv_fact_cab)=5 then 'Mayo' else case when month(date_fecenv_fact_cab)=6 then 'Junio' else case when month(date_fecenv_fact_cab)=7 then 'Julio' else case when month(date_fecenv_fact_cab)=8 then 'Agosto' else case when
 month(date_fecenv_fact_cab)=9 then 'Septiembre' else case when month(date_fecenv_fact_cab)=10 then 'Octubre' else case when month(date_fecenv_fact_cab)=11 then 'Noviembre' else case when month(date_fecenv_fact_cab)=12 then 'Diciembre' 
else 'error' end end end end end end end end end end end end as 
mes	,
						
						
							case when DAY(date_fecenv_fact_cab) <10 then CONCAT(0,DAY(date_fecenv_fact_cab))
             else DAY(date_fecenv_fact_cab) end   dia ,
						DATE_FORMAT(date_fecenv_fact_cab,'%d/%m/%Y')fec
							
				
					from T_factura_cabecera f
					inner join T_serie s on s.var_cod_ser=f.var_cod_ser	
					inner join T_sucursal z on z.int_cod_suc=f.int_cod_suc
					inner join T_usuario u on u.int_cod_usu=f.int_cod_usu
					inner join T_cliente c on c.int_cod_cli=f.int_cod_cli
				   where f.var_cod_fact_cab='$cod_fac' and f.var_cod_ser='$cod_serv' and f.int_cod_suc='$cod_suc' and f.int_cod_emp='$cod_emp' and f.int_tip_doc_fact='$tip_doc_fac'
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->factura_cabecera[]=$reg;
		}
			return $this->factura_cabecera;
	}
	
	
	public function get_factura_det($cod_fac,$cod_serv,$cod_suc,$cod_emp,$tip_doc_fac)
	{
		
		$sk=mysql_query("set @a:=0;");
		
			 $sql="select d.int_cant_fact_det,d.int_cod_tit,t.var_nom_tit,
case when dec_preven_sug_tit is null then dec_preven_def_tit else dec_preven_sug_tit end precio,
d.dec_pimpt_fact_det
 from T_factura_detalle d 
INNER JOIN T_titulos t on t.int_cod_tit=d.int_cod_tit
where d.var_cod_fact_cab='$cod_fac' and d.var_cod_ser='$cod_serv' and d.int_cod_suc='$cod_suc' and d.int_cod_emp='$cod_emp' and d.int_tip_doc_fact='$tip_doc_fac'
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->factura_cabecera[]=$reg;
		}
			return $this->factura_cabecera;
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
}

?>
