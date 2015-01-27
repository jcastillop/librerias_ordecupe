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
 <link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">
    <link href="../../../css/estilo.css" rel="stylesheet" type="text/css" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="https://jquery-datatables-editable.googlecode.com/svn-history/r88/trunk/media/js/jquery.jeditable.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://jquery-datatables-editable.googlecode.com/svn-history/r122/trunk/media/js/jquery.dataTables.editable.js"></script>
<script src="http://jquery-datatables-column-filter.googlecode.com/svn/trunk/media/js/jquery.dataTables.columnFilter.js"></script>
<script src="funciones.js"></script>
<!-- DataTables -->
<style type="text/css">
td.highlight {
    background-color: whitesmoke !important;
}
</style> 


<body class="dt-example">


    <h4 align="center" >Precios de títulos</h4>
    
    	<div class="container2" align="center" id="edicion_precios_totales">

        <label for="lblpmay">Precio por mayor</label>
        <input name ="pmayor" type="text" id="pmayor" style="width:40px;height:15px" value="0"/>
        <label for="lblpmen"style="margin-left:20px">Precio por menor</label>
        <input name ="pmenor" type="text" id="pmenor" style="width:40px;height:15px;" value="0"/><br>
        <input type="checkbox" name="porcentaje" id="porcentaje" value="1" checked="true" style="width:40px;height:15px;margin-right:0;margin-top:7px;">
        <label for="lblporcentaje"style="margin-left:1px" >Porcentaje</label>
        <input type="checkbox" name="vacios" id="vacios" value="1" checked="true" style="width:40px;height:15px;margin-right:0">
        <label for="lblvacios"style="margin-left:1px " >Aplicar solo a campos vacíos</label><br>
        <input id="aplicar" class="enviar" value="Aplicar" type="button" style="width:150px;">
        <input id="guardar" class="enviar" value="Guardar" type="button" style="width:150px;">
        <input id="cancelar" class="enviar" value="Cancelar" type="button" style="width:150px;margin-top:5px;">
    </div>
<div id="content" align="center"><img src="loading.gif"/></div>
	<div class="container3">

      <!-- Main component for a primary marketing message or call to action -->
 
        <section>
  
            <div class="tablas"  align="center" >


		<table id="example" class="cell-border" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Cant</th>
                <th>Titulo</th>
				<th>Autor</th>
                 <th>Editorial</th>
                <th>Proveedor</th>
                <th>Precio Compra Total</th>
                <th>Precio Compra Unitario</th>
                <th>P.C.U.(*FOB)</th>
                <th>Sugerido x Mayor</th>
               <th>Sugerido x Menor</th>
                <th>Definido x Mayor</th>
               <th>Definido x Menor</th>               
               
            </tr>
        </thead>

    </table>

</div>
        </section>
      
    </div>
          <div class="container4" align="center">
                
                
               
            </div>
<!---->
</body></html>
