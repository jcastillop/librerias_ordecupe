
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
	<title>Reporte Almacen</title>
	<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/dataTables.tableTools.css">      
	<link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">
 
    <script type="text/javascript">
		var newwindow;
		function poptastic(url)
		{
			newwindow=window.open(url,'name','height=238,width=380,left=400');
			if (window.focus) {newwindow.focus()}
		}
	</script>
	<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.js"></script>    
	<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/dataTables.tableTools.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/js/TableTools.j"></script>
	<script type="text/javascript" language="javascript" src="../../../paquetes/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../../../paquetes//resources/demo.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	
     


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


$(document).ready(function() {
	var table = $('#example').DataTable();

	$('#example tbody').on( 'dblclick', 'tr', function () {
		$(this).toggleClass('selected');
	} );

	$('#button').click( function () {
		alert( table.rows('.selected').data().length +' row(s) selected' );
	} );
} );



$(document).ready( function () {
    var table = $('#example').DataTable();
    $.fn.dataTable.KeyTable( table );
} );


	</script>
	<script> 
       $(function() {
         $("#datepicker1").datepicker();
         $("#datepicker2").datepicker();
       });
     </script>

    <style type="text/css">
		#d{margin-left: -850px;
		margin-top: 30px; 
		margin-bottom: -50px;}
	</style>
	
</head>

<body class="dt-example" >
	
 <form action="reporte_ventas.php" method="post">   
    <div class="container_">
		<section>
		  <h1>Reporte Ventas</h1>
		  <table align="center">
             <tr>
               <th>
                 Titulo
               </th>
               <th>
                 <input type="text" name="tit">
               </th>
               <th>
                 Fecha inicio
               </th>
               <th>
                 <input type="text" name ="fec1" id="datepicker1"/>
               </th>
               <th>
                 Fecha fin
               </th>
               <th>
                 <input type="text" name ="fec2" id="datepicker2"/>
               </th>
               <th>
                 <input id="submit" name="Submit" class="enviar" value="Enviar" type="submit"/>
               </th>
             </tr>
          </table>
            <div class="tablas"  align="center" >
			<table id="example"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr class="cabecera" >
					    <th>Número</th>
                        <th>Tit.ID</th>
                        <th>Título</th>
                        <th>Cantidad</th>
				
					</tr>
				</thead>
				<tbody align="center">
                 <?php
					$tra=new reportes();
					if (isset($_POST['tit']) && isset($_POST['fec1']) && isset($_POST['fec2']))
					{$reg=$tra->get_reporte_ventas($_POST['tit'], $_POST['fec1'], $_POST['fec2']);}
					else{$reg=$tra->get_reporte_ventas('%%','2014-11-01','2014-11-24');}
					for ($i=0;$i<count($reg);$i++)
					{
				 ?>  
					<tr>
					    <td><?php echo $i+1 ?></td>
                        <td><?php echo $reg[$i]["int_cod_tit"];?></td>                      
						<td><?php echo $reg[$i]["var_nom_tit"];?></td>                        
						<td><?php echo $reg[$i]["int_cant_guia_det"];?></td>
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
</body>
</html>
