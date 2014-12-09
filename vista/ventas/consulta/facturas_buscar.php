<?php
require_once("../../../conexiones/class_historico_ventas.php");
?>
<?php
					$tra=new factura_cabecera();
					$reg=$tra->get_factura_cabecera();
					for ($i=0;$i<count($reg);$i++)
				{
					 $data['data']=$reg;
				}
				 echo json_encode($data);
				
?>  
                 