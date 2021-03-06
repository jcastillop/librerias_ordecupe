<?php
  require_once("../../../conexiones/class_serie.php");
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

	<title>Series</title>
	<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/dataTables.tableTools.css">
        

	<link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">

    <script type="text/javascript">
		var newwindow;
		function poptastic(url)
		{
			newwindow=window.open(url,'name','height=265,width=330,left=400');
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
    <script type="text/javascript" language="javascript" src="../../../paquetes/media/js/js/TableTools.j"></script>
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
			<h1>SERIES<span></span></h1>

			
            <div class="tablas"  align="center">
			<table id="example"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr class="cabecera" >						
						<th><a href="javascript:poptastic('series.php');"><img src="../../../css/images/list-add.png" width="80" height="30" /></th>        
                        <th>Empresa</th>                  
                        <th>Sucursal</th>                       
                        <th>Serie</th>
                        <th>Estado</th>
                        <th></th>
                     </tr>
                 </thead>
				<tbody >
                  <?php
                    $tra=new serie();
                    $reg=$tra->get_serie();
                    for ($i=0;$i<count($reg);$i++)
                    {
                  ?>                 
				  <tr align="center">
                    <td align='center' ><a href=" javascript:poptastic('mod_serie.php?ser_id=<?php echo $reg[$i]["var_cod_ser"];?>&suc_id=<?php echo $reg[$i]["int_cod_suc"];?>&emp_id=<?php echo $reg[$i]["int_cod_emp"];?>');"><img src='../../../img/images/edit.png' width='15px' height='15px' title='Actualizar'></a></td>
                    <td><?php echo $reg[$i]["var_nom_emp"];?></td>
                    <td><?php echo $reg[$i]["var_nom_suc"];?></td>                        
                    <td><?php echo $reg[$i]["var_cod_ser"];?></td>
                    <td><?php echo $reg[$i]["estado"];?></td>
                    <td align='center' ><a href=" javascript:elim('eliminar_serie.php?ser_id=<?php echo $reg[$i]["var_cod_ser"];?>&suc_id=<?php echo $reg[$i]["int_cod_suc"];?>&emp_id=<?php echo $reg[$i]["int_cod_emp"];?>');"><img src='../../../img/images/delete.png' width='15px' height='15px' title='Eliminar'></a></td>
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
