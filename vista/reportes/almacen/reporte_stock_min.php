
<?php
require_once("../../../conexiones/class_stock.php");
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
	<script type="text/javascript" src="busquedas/js/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    
	<script type='text/javascript' src="busquedas/js/jquery.autocomplete.js"></script>

	<link rel="stylesheet" type="text/css" href="busquedas/js/jquery.autocomplete.css" />
	<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/dataTables.tableTools.css">      
	<link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">
 
	<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/dataTables.tableTools.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/js/TableTools.js"></script>

	<script type="text/javascript" >
	$().ready(function() {
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
});
	
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

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
  });
  
  </script>
</head>

<body class="dt-example" >
	
    
    <div class="container_">
    
		<section>
			<h1>STOCK</h1>
            <table align="center" >
                <tr>
               		<td>Título</td>
                	<td><input type="text" name="cod_tit" id="cod_tit" ><input type="text" name="titulo" id="titulo" ></td>
                	<td>Fecha Ini.</td>
                    <td><input type="text" id="datepicker"></td>
                    <td>Fecho Fin</td>
                    <td><input type="text" id="datepicker1"></td>
                    <td><input type="submit" name="submit" id="submit" value="Consultar" /></td>
                </tr>
            </table>

			
            <div class="tablas"  align="center" >
			<table border="1px solid" id="example"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr class="cabecera">
						
						<th>Tit.ID</th>
                        <th>Título</th>
                        <th>Cantidad</th>
				
					</tr>
				</thead>
				<tbody align="center">
                
                </tbody>
			</table>
			</div>
		</section>

        <section>
            <div class="footer"></div>
        </section> 
</div>
</body>

</html>
