<?php
require("conexion.php");
class ordcomp_detalle
{
	//private $titulos=array();
	private $ordcomp_detalle;
	
	public function __construct()
		{
			$this->ordcomp_detalle=array();
		}


		public function get_ordcomp_detalle($cod_emp,$cod_suc,$cod_cab)
	{
			
		$sql="select d.int_cod_emp, d.int_cod_suc, d.var_cod_comp_cab, d.var_cod_comp_det, d.int_cant_comp_det, d.dec_val_comp_det, truncate(d.dec_val_comp_det/d.int_cant_comp_det,3) as punit, 
		truncate((d.dec_val_comp_det/d.int_cant_comp_det)*c.dec_fob_comp_cab,2) as precio, d.int_cod_tit, t.var_nom_tit, t.var_autor_tit,e.var_nom_edit,p.var_rsoc_prov,
		ifnull(t.dec_preven_sug_tit,
		truncate((truncate(c.dec_may_comp_cab/100,2)+1)*truncate((d.dec_val_comp_det/d.int_cant_comp_det)*c.dec_fob_comp_cab,2),2)) as por_mayor, 
		ifnull(t.dec_preven_def_tit,
		truncate((truncate(c.dec_min_comp_cab/100,2)+1)*truncate((d.dec_val_comp_det/d.int_cant_comp_det)*c.dec_fob_comp_cab,2),2)) as por_menor
		from T_ordcomp_det d 
	inner join T_titulos t on t.int_cod_tit=d.int_cod_tit 
	inner join T_proveedor p on p.int_cod_prov=d.int_cod_prov 
	inner join T_editoriales e on e.int_cod_edit=t.int_cod_edit 
	inner join T_ordcomp_cab c on d.var_cod_comp_cab=c.var_cod_comp_cab 
		where d.int_est_comp_det=1 and d.int_cod_emp=$cod_emp and d.int_cod_suc=$cod_suc and d.var_cod_comp_cab='$cod_cab'";
		
/*
				$sql="select d.int_cod_emp, d.int_cod_suc, d.var_cod_comp_cab, d.var_cod_comp_det, d.int_cant_comp_det, d.dec_val_comp_det, truncate(d.dec_val_comp_det/d.int_cant_comp_det,2) as punit, 
		truncate((d.dec_val_comp_det/d.int_cant_comp_det)*c.dec_fob_comp_cab,2) as precio, d.int_cod_tit, t.var_nom_tit, t.var_autor_tit,e.var_nom_edit,p.var_rsoc_prov,
		truncate((truncate(c.dec_may_comp_cab/100,2)+1)*truncate((d.dec_val_comp_det/d.int_cant_comp_det)*c.dec_fob_comp_cab,2),2) as por_mayor, 
		truncate((truncate(c.dec_min_comp_cab/100,2)+1)*truncate((d.dec_val_comp_det/d.int_cant_comp_det)*c.dec_fob_comp_cab,2),2) as por_menor
		from T_ordcomp_det d 
	inner join T_titulos t on t.int_cod_tit=d.int_cod_tit 
	inner join T_proveedor p on p.int_cod_prov=d.int_cod_prov 
	inner join T_editoriales e on e.int_cod_edit=t.int_cod_edit 
	inner join T_ordcomp_cab c on d.var_cod_comp_cab=c.var_cod_comp_cab 
		where d.int_est_comp_det=1 and d.int_cod_emp=$cod_emp and d.int_cod_suc=$cod_suc and d.var_cod_comp_cab='$cod_cab'";
*/

		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->ordcomp_detalle[]=$reg;
		}
			return $this->ordcomp_detalle;
	}

}
?>		