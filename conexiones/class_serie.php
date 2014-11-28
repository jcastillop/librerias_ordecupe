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
  class serie
  {
  	private $serie;
  	public function __construct()
  	{
  		$this->serie=array();
  	}

  	public function get_serie(){
  		$sql="select t.int_cod_suc, y.var_nom_suc, t.int_cod_emp, x.var_nom_emp, t.var_cod_ser,t.int_est_ser,
	                 if(int_est_ser=1,'ACTIVO','INACTIVO') estado, 
                     t.var_usuadd_ser, t.date_fecadd_ser, t.var_usumod_ser,t.date_fecmod_ser 
                from T_serie t, T_empresa x, T_sucursal y
               where t.int_cod_emp=x.int_cod_emp and
                     t.int_cod_emp=y.int_cod_emp and
                     t.int_cod_suc=y.int_cod_suc and
                     t.int_est_ser<>0 
            order by t.var_cod_ser,t.int_cod_emp, t.int_cod_suc";
  		$res=mysql_query($sql,Conectar::con());
  		while ($reg=mysql_fetch_assoc($res))
		{
			$this->serie[]=$reg;
		}
		return $this->serie;
  	}

  	public function add_serie($cod_suc, $cod_emp, $cod_ser, $usuadd_ser, $fecadd_ser)
	{
		$sql="CALL proc_insertar_serie($cod_suc.,$cod_emp,'$cod_ser',1,'$usuadd_ser','$fecadd_ser',@n_Flag, @c_msg); ";
		$res=mysql_query($sql,Conectar::con());
		$array_flag = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
        $array_msg = mysql_fetch_array(mysql_query("Select @c_msg",Conectar::con()));
        $codigo_flag = $array_flag["@n_Flag"];
        $codigo_msg = $array_msg["@c_msg"];
		if ($codigo_flag==0){
           echo "<script type='text/javascript'>
		          alert('".$codigo_msg."');
		          cerrar();
		          window.location='series.php?load=1';
		         </script>";
		}
		else{
           echo "<script type='text/javascript'>
		          alert('".$codigo_msg."');
		         </script>";
		}
	}

	public function edit_serie($cod_suc, $cod_emp, $cod_ser, $est_ser, $usumod_ser, $fecmod_ser)
	{
		$sql="CALL proc_modificar_serie($cod_suc.,$cod_emp,'$cod_ser',$est_ser,'$usumod_ser','$fecmod_ser',@n_Flag, @c_msg); ";
		$res=mysql_query($sql,Conectar::con());
		$array_flag = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
        $array_msg = mysql_fetch_array(mysql_query("Select @c_msg",Conectar::con()));
        $codigo_flag = $array_flag["@n_Flag"];
        $codigo_msg = $array_msg["@c_msg"];

        if ($codigo_flag==0){
		    echo "<script type='text/javascript'>
		           alert('".$codigo_msg."');
				   cerrar();
		           window.location='mod_serie.php?ser_id=$cod_ser&suc_id=$cod_suc&emp_id=$cod_emp && load=1';
		          </script>";	
        } 
        else{
            echo "<script type='text/javascript'>
		          alert('".$codigo_msg."');
		         </script>";	
        }
	}

	public function eliminar_serie($cod_suc, $cod_emp, $cod_ser)
	{
		$sql="update T_serie t set t.int_est_ser=0 
		                     where t.int_cod_suc='$cod_suc' and
		                           t.int_cod_emp='$cod_emp' and
		                           t.var_cod_ser='$cod_ser'";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		        window.location='eliminar_serie.php';
		      </script>";
	}

	public function get_serie_por_id($cod_emp, $cod_suc, $cod_ser)
	{
		$sql="select t.int_cod_suc, y.var_nom_suc, t.int_cod_emp, x.var_nom_emp, t.var_cod_ser,t.int_est_ser,
	                 if(int_est_ser=1,'ACTIVO','INACTIVO') estado, 
                     t.var_usuadd_ser, t.date_fecadd_ser, t.var_usumod_ser,t.date_fecmod_ser 
                from T_serie t, T_empresa x, T_sucursal y
               where t.int_cod_emp=x.int_cod_emp and
                     t.int_cod_emp=y.int_cod_emp and
                     t.int_cod_suc=y.int_cod_suc and
                     t.int_est_ser<>0 and 
                     t.int_cod_emp='$cod_emp' and 
                     t.int_cod_suc='$cod_suc' and 
                     t.var_cod_ser='$cod_ser'";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->serie[]=$reg;
		}
		return $this->serie;
	}
  }
?>
