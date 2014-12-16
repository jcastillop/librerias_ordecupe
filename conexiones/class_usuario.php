
        <script type="text/javascript">
        function cerrar() {
            var data = window.document.getElementById('val1').value;
            window.opener.document.getElementById('deHijo').innerHTML = "Este texto viene de la página hijo: "+data;        
			
			
            /*this.window.close();*/
			opener.location.reload();
        }
		
        </script>
<input type="hidden" id="val1" value="" disabled="disabled"/> 
       
        
<?php
//******************************************************************
class usuario
{
	//private $usuario=array();
	private $usuario;
	
	public function __construct()
		{
			$this->usuario=array();
		}

   public function get_combo_usuario()
	{
		$sql="select int_cod_usu, CONCAT(var_nom_usu , ' ' , var_appat_usu, ' ',var_apmat_usu) as nombre from T_usuario t where t.int_est_usu=1";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}

	public function get_usuario()
	{
		$sql="select 
			u.var_nick_usu,
			u.int_cod_usu,
			u.int_cod_rol,
			r.var_nom_rol,
			u.var_nom_usu,
			u.var_appat_usu,
			u.var_apmat_usu,
			case when u.int_est_usu=1 then 'Activo' else 'Inactivo' end int_est_usu,
			u.var_cla_usu,
			u.var_usuadd_usu,
			u.date_fecadd_usu,
			u.var_usumod_usu,
			u.date_fecmod_usu
			from T_usuario u
			inner join T_rol r on r.int_cod_rol=u.int_cod_rol
			where u.int_est_usu<>0 
			order by u.int_cod_usu desc
		";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	
	
	public function get_combo_rol()
	{
		$sql="select * from T_rol ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	
	public function get_combo_rol_update($id_rol)
	{
		$sql="select * from T_rol where not int_cod_rol='$id_rol'  ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	
		
	public function add_usuario($nombres_usu,$appat_usu,$apmat_usu,$nick_usu,$clave_usu,$rol_usu,$estado_usu,$usu_crea,$fec_crea,$usu_mod,$fec_mod)
	{
		$sql="insert into T_usuario values 
				(null,
				'$nombres_usu',
				'$appat_usu',
				'$apmat_usu',
				'$nick_usu',
				'$clave_usu',
				'$rol_usu',
				'$estado_usu',
				'$usu_crea',
				'$fec_crea',
				'$usu_mod',
				'$fec_mod')	
		";
		
		
		$res=mysql_query($sql,Conectar::con() );
		
		
		
		if($res){  $_POST['id']=mysql_insert_id();
		
		
		}
         else
        {echo "error: ".mysql_error(),"</br>";
		//echo "codigo_error:".mysql_errno();
		}
		
		
		
	}
	
	public function add_permisos($id,$empresa)
	{
		 $sql="
		insert into T_permisos (int_cod_emp,int_cod_usu,var_usuadd_per,date_fecadd_per,var_usumod_per,date_fecmod_per) values ($empresa,$id,'admin',now(),'admin',now())

		";
		
		
		$res=mysql_query($sql,Conectar::con() );
		
		
		
		if($res){  $_POST['id']=mysql_insert_id();
		
		echo "<script type='text/javascript'>
		alert('SE INSERTO CORRECTAMENTE');
		cerrar();
		window.location='usuario.php?load=1';
		</script>";
		}
         else
        {echo "error: ".mysql_error(),"</br>";
		//echo "codigo_error:".mysql_errno();
		}
		
		
		
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
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	public function edit_usuario($id,$nombres_usu,$appat_usu,$apmat_usu,$nick_usu,$clave_usu,$rol_usu,$estado_usu,$usu_mod)
	{
		//$sql="update usuario set nombre_persona='$nom',texto='$texto' where id=$id";
	
		$sql="update T_usuario "
			." set "
		
		."
		var_nom_usu='$nombres_usu',
		var_appat_usu='$appat_usu',
		var_apmat_usu='$apmat_usu',
		var_nick_usu='$nick_usu',
		var_cla_usu='$clave_usu',
		int_cod_rol='$rol_usu',
		int_est_usu='$estado_usu',
		var_usumod_usu='$usu_mod',
		date_fecmod_usu=now()		
		"
		
			." where "
			." int_cod_usu=$id ";
			
			
			
		$res=mysql_query($sql,Conectar::con());
		
		
	}
	public function eliminar_usuario($id)
	{
		$sql="update T_usuario t set t.int_est_usu=0 where int_cod_usu=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		
		window.location='eliminar_usuario.php?eliminado=1';
		</script>";
	}
	
	
	
	public function insertar_cabecera($id_cliente,$deuda_ant,$fecha_deuda,$fec_crea,$total_av,$total_neto,$total_precio_c,$total_precio_v,$total_importe,$total_haber,$sub_total,$total,$usu_crea,$mod_usu)
	{
		$sql="
			
			INSERT INTO flete_cab (id_flete, id_cliente, deuda_ant, fec_deuda, fec_flete, to_av, to_neto, to_precio_c, to_precio_v, to_importe, haber, sub_total, dsct, total_final, fec_crea_usu, usu_crea, fec_mod_usu, usu_mod) VALUES (NULL, $id_cliente, '$deuda_ant', '$fecha_deuda',STR_TO_DATE('$fec_crea','%d-%m-%Y') , '$total_av', '$total_neto', '$total_precio_c', '$total_precio_v', '$total_importe', '$total_haber', '$sub_total', 0, '$total', now(), '$usu_crea', now(), '$mod_usu');
			
				
					";
		$res=mysql_query($sql,Conectar::con() );
		
		
		
		if($res){  $_POST['id']=mysql_insert_id();}
         else
        {echo "error: ".mysql_error(),"</br>";
		//echo "codigo_error:".mysql_errno();
		}
	}
	
}
?>
