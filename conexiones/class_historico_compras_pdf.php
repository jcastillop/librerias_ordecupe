   <?php
require("conexion.php");
//******************************************************************
class historico_compras
{
	//private $titulos=array();
	private $hist_comp;
	
	public function __construct()
	{
		$this->hist_comp=array();
	}
    public function get_conta_compras($emp,$mes,$anho)
	{
	$sql="select t1.var_cod_comp_cab, t1.date_fec_emi_comp_cab, date(t1.date_fec_rec_comp_cab) as date_fec_rec_comp_cab, t2.int_cod_prov, t3.int_nrodoc_prov, t3.var_rsoc_prov, 
       sum(t2.dec_val_comp_det) dec_val_comp_det, '' vacio
  from T_ordcomp_cab t1, T_ordcomp_det t2, T_proveedor t3 
 where t1.int_cod_emp=t2.int_cod_emp and
       t1.int_cod_suc=t2.int_cod_suc and
       t1.var_cod_comp_cab=t2.var_cod_comp_cab and
       t2.int_cod_prov=t3.int_cod_prov and
       month(t1.date_fec_rec_comp_cab)=$mes and year(t1.date_fec_rec_comp_cab)=$anho
group by t1.var_cod_comp_cab, t1.date_fec_emi_comp_cab, t1.date_fec_rec_comp_cab, t2.int_cod_prov, t3.var_rsoc_prov";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->hist_comp[]=$reg;
		}
			return $this->hist_comp;
	}
}
?>