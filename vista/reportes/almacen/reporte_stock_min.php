
<?php
require_once("../../../conexiones/class_reportes.php");
require_once("../../../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<head>
  <p id="deHijo"></p>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Stock</title> 
    <link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/jquery.dataTables.css">
    	<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/dataTables.tableTools.css">
        

	<link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">
	
<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.js"></script>
    
	<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/dataTables.tableTools.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/js/TableTools.j"></script>
	<script type="text/javascript" language="javascript" src="../../../paquetes/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../../../paquetes//resources/demo.js"></script>
	<script type="text/javascript" >
	/*$().ready(function() {
	$("#titulo").autocomplete("busquedas/autoCompleteMainNom_Titulo.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#titulo").result(function(event, data, formatted) {
		
		$("#cod_tit").val(data[1]);
		$("#titulo").focus();
		
	
	});
});*/
	
	$(document).ready(function() {
	$('#example').DataTable( {
		/*"scrollY": 200,*/
        "scrollX": true,
		dom: 'T<"clear">lfrtip',
		tableTools: {
			
			"aButtons": [
				
				"print",
				
					]
				}
			} );
		} );

$(document).ready( function () {
    var table = $('#example').DataTable();
    $.fn.dataTable.KeyTable( table );
} );

  </script>	
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  
  </script>
</head>

<body class="dt-example" >
	
   <form action="reporte_stock_min.php" method="post">   
    <div class="container_">
    
		<section>
			<h1>STOCK</h1>
            <table align="center" >
                <tr>
               		<td>Cantidad</td>
                	<!--<td><input type="text" name="cod_tit" id="cod_tit" ><input type="text" name="titulo" id="titulo" ></td>-->
                    <td><input type="text" name="cant" id="cant" ></td>
                	<td>Fecha Ini.</td>
                    <td><input type="text" id="datepicker" name="fec_ini"></td>
                    <td>Fecho Fin</td>
                    <td><input type="text" id="datepicker1" name="fec_fin"></td>
                    <td><input id="submit" name="Submit" class="enviar" value="Enviar" type="submit"/></td>
                </tr>
            </table>

			
            <div class="tablas"  align="center" >
			<table border="1px solid" id="example"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr class="cabecera">
						
						<th>Tit.ID</th>
                        <th>Título</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
				
					</tr>
				</thead>
				<tbody align="center">
                <?php
					$tra=new reportes();
					if (isset($_POST['cant']) && isset($_POST['fec_ini']) && isset($_POST['fec_fin']))
					{$reg=$tra->get_reporte_stock_min($_POST['cant'], $_POST['fec_ini'], $_POST['fec_fin']);}
					else{$reg=$tra->get_reporte_stock_min('%%','2014-01-15','2014-12-18');}
					for ($i=0;$i<count($reg);$i++)
					{
				 ?>  
					<tr>
					    <td><?php echo $i+1 ?></td>
                        <td><?php echo $reg[$i]["var_nom_tit"];?></td>                      
						<td><?php echo $reg[$i]["int_cant_stk"];?></td>                        
						<td><?php echo $reg[$i]["date_fecact_stk"];?></td>
					</tr>
				  <?php
                }
                ?>        
                </tbody>
			</table>
			</div>
		</section>

        <section>
            <div class="footer"></div>
        </section> 
</div>
</form>
</body>

</html>
