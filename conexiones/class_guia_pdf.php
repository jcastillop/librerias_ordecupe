
       
        
<?php
require("conexion.php");
//******************************************************************
class guia_cabecera
{
	//private $titulos=array();
	private $guia_cabecera;
	
	public function __construct()
		{
			$this->guia_cabecera=array();
		}

	public function get_guia_por_id($id,$ser,$suc,$emp)
	{
		$sql="select 
			 	g.var_cod_guia_cab,
				g.var_cod_ser,
				g.int_cod_suc,
				z.var_nom_suc,
				g.int_cod_emp,
				e.var_nom_emp,
				g.var_dir_env_guia_cab,
				g.int_cod_cli,
				c.var_rsoc_cli,
				c.var_ruc_cli,
				c.var_dir_cli,	
				c.var_dist_cli,
        		c.var_telf_cli,
				c.var_refdom_cli,
				g.var_dir_env_guia_cab,
				g.var_dist_guia_cab,
				g.var_telf_guia_cab,
				g.var_cod_pedi_cab,
				g.int_cod_mov,
				m.var_desc_mov,							
				g.var_pun_part_guia_cab,
				g.var_pun_lleg_guia_cab,
				case  when g.int_est_guia_cab=1 then 'Activo' else 'Inactivo' end int_est_guia_cab,
				g.int_cod_usu,
				u.var_nom_usu,					
				g.var_dist_guia_cab,				
				g.int_turn_guia_cab,
				g.var_telf_guia_cab,
				g.var_tran_marca_guia_cab,
				g.var_tran_constancia_guia_cab,
				g.var_tran_licencia_guia_cab,
				g.var_trans_rs_guia_cab,
				g.var_trans_ruc_guia_cab,
				g.var_trans_dir_guia_cab,
				g.date_fecenv_guia_cab
				from T_guia_cabecera g			
				inner join T_sucursal z on z.int_cod_suc=g.int_cod_suc
				inner join T_empresa e on e.int_cod_emp=g.int_cod_emp
				inner join T_cliente c on c.int_cod_cli=g.int_cod_cli
				inner join T_pedido_cabecera p on p.var_cod_pedi_cab=g.var_cod_pedi_cab
				inner join T_tipo_movimiento m on m.int_cod_mov=g.int_cod_mov
				inner join T_usuario u on u.int_cod_usu=g.int_cod_usu
				where g.var_cod_guia_cab='$id' and g.var_cod_ser='$ser' and g.int_cod_suc=$suc and g.int_cod_emp=$emp";				
		 
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->guia_cabecera[]=$reg;
		}
			return $this->guia_cabecera;
	}
	
	
	
	
	
	public function get_guia_detalle_por_id($id,$ser,$suc,$emp)
	{
		$sql="select d.var_cod_guia_det, d.int_cod_tit,t.var_nom_tit,d.int_cant_guia_det,d.dec_pvent_guia_det,d.dec_vtotal_guia_det  from T_guia_detalle d
INNER JOIN T_titulos t on  t.int_cod_tit=d.int_cod_tit where d.var_cod_guia_cab='$id' and d.var_cod_ser='$ser' and d.int_cod_suc=$suc and d.int_cod_emp=$emp";		
		 
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->guia_cabecera[]=$reg;
		}
			return $this->guia_cabecera;
	}
		public function get_guia_cabecera_detalle_por_codcabecera($cod_cab,$cod_ser,$cod_suc,$cod_emp)
	{
		
		$sql="select c.var_cod_guia_cab, c.var_cod_ser, c.int_cod_suc, s.var_nom_suc, s.var_dir_suc,c.int_cod_emp, c.var_dir_env_guia_cab, 
				c.int_cod_cli, cli.var_rsoc_cli, cli.var_ruc_cli, cli.var_dir_cli, c.var_cod_pedi_cab, c.int_cod_mov,c.int_cod_smov,c.var_pun_part_guia_cab, 
				c.var_pun_lleg_guia_cab,c.int_est_guia_cab, c.int_cod_usu, 
				concat(u.var_appat_usu,' ',u.var_apmat_usu,' ',u.var_nom_usu) as nombre, c.var_dist_guia_cab,
				c.int_turn_guia_cab, c.var_telf_guia_cab, c.var_tran_marca_guia_cab, c.var_tran_constancia_guia_cab, 
				c.var_tran_licencia_guia_cab, c.var_trans_rs_guia_cab, c.var_trans_ruc_guia_cab, c.var_trans_dir_guia_cab, 
				DATE(c.date_fecenv_guia_cab) as date_fecenv_guia_cab, d.var_cod_guia_det, d.int_cod_tit,t.var_nom_tit, t.var_isbn_tit, d.int_cant_guia_det,
				d.dec_pvent_guia_det,d.dec_pimpt_guia_det,d.dec_pdesc_guia_det,d.dec_vtotal_guia_det
				from T_guia_cabecera c
				inner join T_guia_detalle d on c.var_cod_guia_cab=d.var_cod_guia_cab 
				inner join T_sucursal s on c.int_cod_suc=s.int_cod_suc 
				inner join T_cliente cli on c.int_cod_cli=cli.int_cod_cli 
				inner join T_usuario u on c.int_cod_usu=u.int_cod_usu
				inner join T_titulos t on d.int_cod_tit=t.int_cod_tit
				where c.var_cod_guia_cab='$cod_cab' and c.var_cod_ser='$cod_ser' and c.int_cod_suc=$cod_suc and c.int_cod_emp=$cod_emp
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->guia_cabecera[]=$reg;
		}
			return $this->guia_cabecera;
	}
	
	public function actualizar_estado_impreson($id)
	{
		$sql="update T_guia_cabecera "
			." set "
		
		."
		int_est_impr_guia_cab=2			
		"
		
			." where "
			." var_cod_guia_cab='$id' ";
		$res=mysql_query($sql,Conectar::con());
		
		
	}
	
	
}

?>
