<?php
require("../../../conexiones/conexion.php");
class titulos
{
	
	private $titulo;
	
	public function __construct()
		{
			$this->titulo=array();
		}
	public function get_titulo_por_id($id)
	{
		$sql="select t.*, e.var_nom_edit, p.var_nom_pais, g.var_nom_gen from T_titulos t, T_editoriales e, T_pais p, T_generos g where int_est_tit=1 and t.int_cod_edit=e.int_cod_edit and t.int_cod_pais=p.int_cod_pais and t.int_cod_gen=g.int_cod_gen and t.var_cod_bar_tit='".$id."'";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->titulo[]=$reg;
		}
			return $this->titulo;
	}
	}
class clientes
{
	
	private $cliente;
	
	public function __construct()
		{
			$this->cliente=array();
		}
	public function get_cliente_por_nombre($nombre)
	{
		$sql="select int_cod_cli, var_rsoc_cli from T_cliente where var_rsoc_cli like '".$nombre."%'";
		$res=mysql_query($sql,Conectar::con());
		while ($reg_cliente=mysql_fetch_assoc($res))
		{
			$this->cliente[]=array(
				'id' => $reg_cliente['int_cod_cli'],
				'label' => $reg_cliente['var_rsoc_cli'],
				'value' => $reg_cliente['var_rsoc_cli']
				);
		}
			return $this->cliente;
	}	
	public function get_cliente_por_id($id)
	{
		$sql="select var_rsoc_cli, var_ruc_cli, var_dir_cli,var_dist_cli,var_telf_cli,var_refdom_cli from T_cliente where int_cod_cli='".$id."'";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->cliente[]=$reg;
		}
			return $this->cliente;
	}
}
class sucursal
{
	
	private $sucursal;
	
	public function __construct()
		{
			$this->sucursal=array();
		}

	public function get_sucursal_por_id($id)
	{
		$sql="select var_nom_suc, var_dir_suc from T_sucursal where int_cod_suc='".$id."' and int_est_suc=1";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->sucursal[]=$reg;
		}
			return $this->sucursal;
	}
}
class Fechas
{
	private $fecha_hora;

function mifechagmt($fecha_timestamp,$gmt=0)
{
    $timestamp=$fecha_timestamp; //puedes poner aqui la hora en formato "Unix timestamp" obtenida de una tabla
    $diferenciahorasgmt = (date('Z', time()) / 3600 - $gmt) * 3600; //La diferencia de horas entre el GMT del servidor y el GMT que queremos, en mi caso mi servidor es GTM-4, y si quiero un GTM -5 la diferencia será de -1 hora
    $timestamp_ajuste = $timestamp - $diferenciahorasgmt; //restamos a la hora actual la diferencia horaria en mi caso será -1 hora
    $fecha_hora = date("Y-m-d H:i:s", $timestamp_ajuste); //mostramos la fecha/hora
    return $fecha_hora;
}
function mifechagmtactual($fecha_timestamp,$gmt=0)
{
    $timestamp=$fecha_timestamp; //puedes poner aqui la hora en formato "Unix timestamp" obtenida de una tabla
    $diferenciahorasgmt = (date('Z', time()) / 3600 - $gmt) * 3600; //La diferencia de horas entre el GMT del servidor y el GMT que queremos, en mi caso mi servidor es GTM-4, y si quiero un GTM -5 la diferencia será de -1 hora
    $timestamp_ajuste = $timestamp - $diferenciahorasgmt; //restamos a la hora actual la diferencia horaria en mi caso será -1 hora
    $fecha_hora = date("Y-m-d", $timestamp_ajuste); //mostramos la fecha/hora
    return $fecha_hora;
}

}

?>

