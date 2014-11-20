<?php
require_once("../../../conexiones/class_tipocambio.php");
require_once("../../../conexiones/class_monedas.php");
require_once("../../../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<head>
  <p id="deHijo"></p>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>TIPO DE CAMBIO</title>
	<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/jquery.dataTables.css">
    	<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/dataTables.tableTools.css">
        

	<link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">
    
    
    
	

    <script type="text/javascript">
var newwindow;
function poptastic(url)
{
	newwindow=window.open(url,'name','height=290,width=545,left=400');
	if (window.focus) {newwindow.focus()}
}
var newwindow;
function elim(url)
{
	newwindow=window.open(url,'name','height=200,width=420,left=400,padding=700');
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
			<h1>TIPO DE CAMBIO<span></span></h1>

			
            <div class="tablas"  align="center">

			<table id="example"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr class="cabecera" >
						
						<th><a href="javascript:poptastic('tipocambio.php');"><img src="../../../css/images/list-add.png" width="98" height="30" /></a></th>
						<th>Moneda</th>
			                        <th>Fecha tipo de cambio</th>
			                        <th>Valor del Tipo de Cambio</th>
									<th>Descripcion</th>
									<th></th>
				
					</tr>
				</thead>                   

		<tbody align="center">		
                <?php
$tra=new tipocambio();
$reg=$tra->get_tipocambio();
for ($i=0;$i<count($reg);$i++)
{
?> 


					<tr>
                  <td align='center' ><a href=" javascript:poptastic('mod_tipocambio.php?id=<?php echo $reg[$i]["int_cod_mon"];?> & fecha=<?php echo $reg[$i]["date_fecha_tipcam"];?>') " ><img src='../../../img/images/edit.png' width='15px' height='15px' title='Actualizar'></a></td>
                      <td><?php echo $reg[$i]["var_nom_mon"];?></td>
						<td><?php echo $reg[$i]["date_fecha_tipcam"];?></td>
                        			<td><?php echo $reg[$i]["dec_val_tipcam"];?></td>
						  			<td><?php echo $reg[$i]["var_desc_tipcam"];?></td>
						
		
                       <td align='center' ><a href=" javascript:elim('eliminar_tipocambio.php?id=<?php echo $reg[$i]["int_cod_mon"];?>&fecha=<?php echo $reg[$i]["date_fecha_tipcam"];?>'); " ><img src='../../../img/images/delete.png' width='15px' height='15px' title='Eliminar'></a></td>

						
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
