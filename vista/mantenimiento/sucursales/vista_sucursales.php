
<?php
require_once("../../../conexiones/class_sucursal.php");
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

	<title>Sucursales</title>
	<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/dataTables.tableTools.css">
	<link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">
    
  

    <script type="text/javascript">
		var newwindow;
		function poptastic(url)
		{
			newwindow=window.open(url,'name','height=363,width=567,left=400');
			if (window.focus) {newwindow.focus()}
		}
		var newwindow;
		function modificar(url)
		{
			newwindow=window.open(url,'name','height=425,width=590,left=400');
			if (window.focus) {newwindow.focus()}
		}
		var newwindow;
		function elim(url)
		{
			newwindow=window.open(url,'name','height=200,width=400,left=400,padding=700');
			if (window.focus) {newwindow.focus()}
		}
	</script>
	<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.js"></script>
    
	<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/dataTables.tableTools.js"></script>
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/js/TableTools.js"></script>
	<script type="text/javascript" language="javascript" src="../../../paquetes/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../../../paquetes//resources/demo.js"></script>

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
</head>

<body class="dt-example" >
	
    
    <div class="container_">
    
		<section>
			<h1>SUCURSALES<span></span></h1>

			
            <div class="tablas"  align="center">

			<table id="example"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr class="cabecera" >
						
						<th><a href="javascript:poptastic('sucursales.php');"><img src="../../../css/images/list-add.png" width="98" height="30"/></a></th>
						<th>Nombre de Sucursal</th>
						<th>Departamento</th>
						 <th>Provincia</th>
                        <th>Dirección</th>                        
                        <th>Telefono</th>
                        <th>Estado</th>
						<th></th>
				
					</tr>
				</thead>
		<tbody align="center">		
                <?php
$tra=new sucursal();
$reg=$tra->get_sucursal();
for ($i=0;$i<count($reg);$i++)
{
?> 


					<tr>
                  <td align='center' ><a href=" javascript:modificar('mod_sucursales.php?id=<?php echo $reg[$i]["int_cod_suc"];?>'); " ><img src='../../../img/images/edit.png' width='15px' height='15px' title='Actualizar'></a></td>
                      
						<td><?php echo $reg[$i]["var_nom_suc"];?></td>						
                        <td><?php echo $reg[$i]["var_nom_dept"];?></td>
                        <td><?php echo $reg[$i]["var_nom_provi"];?></td>
						<td><?php echo $reg[$i]["var_dir_suc"];?></td>                        
                        <td><?php echo $reg[$i]["var_telf_suc"];?></td>
                        <td><?php echo $reg[$i]["int_est_suc"];?></td>
						
		
                       <td align='center' ><a href=" javascript:elim('eliminar_sucursales.php?id=<?php echo $reg[$i]["int_cod_suc"];?>'); " ><img src='../../../img/images/delete.png' width='15px' height='15px' title='Eliminar'></a></td>

						
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
