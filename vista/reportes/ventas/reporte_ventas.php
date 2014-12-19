
<?php
require_once("../../../conexiones/class_reportes.php");
require_once("../../../conexiones/conexion.php");
require_once("../../../conexiones/fechas.php");
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
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Reporte Almacen</title>

<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
<!--****************************estilos de la tablas de datos********************************-->
<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../paquetes/media/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="../../../paquetes/syntax/shCore.css">
<link rel="stylesheet" type="text/css" href="../../../paquetes/resources/demo.css">
<!--*********************************************************************************** -->

<!--****************************links para el datepicker********************************-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!--*********************************************************************************** -->

<!--***********************************funciones de la tablas de datos*******************************************-->
<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="../../../paquetes/media/js/dataTables.tableTools.js"></script>
<!--************************************************************************************************************ -->

<!--***********************************Api de ajax para realizar operaciones**************************************-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<!--************************************************************************************************************ -->

<!--*******************************Codigo autocomplete para realizar busquedas***********************************-->
<script type='text/javascript' src="busquedas/js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="busquedas/js/jquery.autocomplete.css" />
<!--************************************************************************************************************ -->

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
				<tbody align="center">
                 <?php
					$tra=new reportes();
					if (isset($_POST['titulo']) && isset($_POST['fec1']) && isset($_POST['fec2']))
					{
					   $titulo=$_POST['titulo']==''?'%%':$_POST['titulo'];
					   $fecini=$_POST['fec1']==''?Fechas::mifechagmtactual(time(),-5):$_POST['fec1'];
				       $fecfin=$_POST['fec2']==''?Fechas::mifechagmtactual(time(),-5):$_POST['fec2'];
					   $reg=$tra->get_reporte_ventas($titulo, $fecini,$fecfin);
					}
					else
					{
					   $fecini=Fechas::mifechagmtactual(time(),-5);
					   $fecfin=Fechas::mifechagmtactual(time(),-5);
					   $reg=$tra->get_reporte_ventas('%%',$fecini, $fecfin);
					}
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
</form>
</body>
</html>
