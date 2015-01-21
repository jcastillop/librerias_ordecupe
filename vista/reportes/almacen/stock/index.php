<!DOCTYPE html>
<html>
<head>
<p id="deHijo"></p>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Auto Loading Records</title>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="https://editor.datatables.net/media/css/dataTables.editor.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
 <link rel="stylesheet" type="text/css" href="../../../../paquetes/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="../../../../paquetes/resources/demo.css">
    <link href="../../../../css/estilo.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="https://jquery-datatables-editable.googlecode.com/svn-history/r88/trunk/media/js/jquery.jeditable.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://jquery-datatables-editable.googlecode.com/svn-history/r122/trunk/media/js/jquery.dataTables.editable.js"></script>
<script src="http://jquery-datatables-column-filter.googlecode.com/svn/trunk/media/js/jquery.dataTables.columnFilter.js"></script>
<script src="funciones.js"></script>
<script src="datepicker_año_mes_español.js"></script>
<!-- DataTables -->
</head>
<body class="dt-example">


    <h4 align="center" >Reporte de STOCK</h4>
    
    	<div class="container2" align="center" id="edicion_precios_totales" width="150px">
            <label for="lblmes">Empresa</label>
        	<label for="lblmes">Sucursal</label>
            
            <input id="generar" class="enviar" value="Generar" type="button" style="width:150px;margin-top:5px;">
            <br>
    	</div>
<div id="content"></div>
	<div class="container3">

      <!-- Main component for a primary marketing message or call to action -->
 
        <section>
  
            <div class="tablas"  align="center" >


		<table id="example" class="cell-border" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>TITULO</th>
                <th>EDITORIAL</th>
				<th>CANTIDAD</th>
				<th>FEC. ACTUALIZ.</th>
            </tr>
        </thead>

    </table>

</div>
        </section>
      
    </div>
          <div class="container4" align="center">
                
                <input id="imprimir" class="enviar" value="Imprimir" type="button" style="width:150px;margin-top:5px;">
               
            </div>
<!---->
</body></html>
