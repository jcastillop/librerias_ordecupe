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
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Reporte Almacen</title>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="https://editor.datatables.net/media/css/dataTables.editor.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
 <link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://jquery-datatables-editable.googlecode.com/svn-history/r88/trunk/media/js/jquery.jeditable.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script language="javascript" type="text/javascript" src="https://jquery-datatables-editable.googlecode.com/svn-history/r122/trunk/media/js/jquery.dataTables.editable.js"></script>
 <script language="javascript" type="text/javascript" src="funciones.js"></script>
<!-- DataTables -->

<script>
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
    $("#datepicker1").datepicker({dateFormat: 'yy-mm-dd'});
    $("#datepicker2").datepicker({dateFormat: 'yy-mm-dd'});
  });
</script>


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
                 <input type="text" name="titulo" id="titulo">
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
				<tfoot>
                   <tr>
                        <th>Numero</th>
                        <th>Tit. ID</th>
                        <th>Titulo</th>
                        <th>Cantidad</th>
            </tr>
        </tfoot>
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
