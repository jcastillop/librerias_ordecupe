
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<?php
require_once("../../../conexiones/class_empresa.php");
require_once("../../../conexiones/class_reporte.php");
require_once("../../../conexiones/conexion.php");

 ?>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<script src="http://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css" />

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

<link rel="stylesheet" href="estilos.css" />

<script src="funciones.js"></script>



<form name="form" method="post">

<div align="center" class="fo"  >

<table width="40%" border="0" align="center" class="bor">
  <tr class="cab" >
    <td height="44" colspan="4">REPORTES</td>
    </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr>
    <td height="28">FECHA INICIO:</td>
    <td><label for="fec1"></label>
      <input type="text" name="fec1" id="fec1" style="width:200px; height:35px;" /></td>
    <td>FECHA FIN:</td>
    <td><input type="text" name="fec2" id="fec2" style="width:200px; height:35px;" /></td>
  </tr>
  <tr>
    <td height="56">EMPRESA</td>
    <td>
      <select  name="empresa" size="1"  class="empresa" id="empresa">
         
          <option value="0">--TODOS--</option>
          <?php
			$tra=new empresa();
			$reg=$tra->get_combo_empresa();
			
			
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_emp"];?>"><?php echo $reg[$i]["var_nom_emp"];?></option>
			
			
			<?php
			}
		  ?>
      </select></td>
    <td>&nbsp;</td>
    <td><label for="select"></label></td>
  </tr>
  <tr>
    <td height="56">SUCURSAL</td>
    <td><select name="sucursal" id="sucursal" style="width: 160px; height:35px;">
	<option value='0'>TODOS</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="Submit" id="button" class="enviar" value="CONSULTAR" /></td>
    </tr>
</table>

    </form>


</div>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr class="ca">
                 
                <td>#</td>
                <td>EMPRESA</td>
                <td>SUCURSAL</td>
                <td>TITULO</td>
                <td>CANTIDAD</td>
                <td>FECHA</td>
            </tr>
        </thead>
 
        <tfoot>
            <tr class="ca">
           
                <td>#</td>
                <td>EMPRESA</td>
                <td>SUCURSAL</td>
                <td>TITULO</td>
                <td>CANTIDAD</td>
                <td>FECHA</td>
            </tr>
        </tfoot>
 
        <tbody>
            
                    <tr>
              <?php
					$tra=new reporte();
			if (isset($_POST['fec1']))
			{
			//print_r($_POST);	
			 $reg=$tra->get_reporte_detallado($_POST['fec1'],$_POST['fec2'],$_POST['empresa'],$_POST['sucursal']);
			}
			else
			{
						$reg=$tra->get_reporte();	
			}
			
			
			
		    if (empty($reg))
			{
			
			?>
            
            	        <td ></td>              
						<td ></td> 
                        <td ></td>
                        <td ></td>
						<td align="center" ></td>
                        <td align="center" ></td>
					
					</tr> 
            
            <?php 
			
			
			}
			else
			{
				echo "no es array";
		
			
					for ($i=0;$i<count($reg);$i++)
			{
				
			
				 ?> 
            
          
             
                
                
                
                    
                    	<td ><?php // echo $reg[$i]["id"];
						
						?></td>              
						<td ><?php echo $reg[$i]["var_nom_emp"];?></td> 
                        <td ><?php echo $reg[$i]["var_nom_suc"];?></td>
                        <td ><?php echo $reg[$i]["var_nom_tit"];?></td>
						<td align="center" ><?php echo $reg[$i]["cant"];?></td>
                        <td align="center" ><?php echo $reg[$i]["fecha"];?></td>
					
					</tr> 
<?php 				
} 

			}?>          
          </tbody>
            
      
    </table>
