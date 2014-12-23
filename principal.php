
<?php 
 @session_start();


require_once("conexiones/class_acceso.php");

if (isset($_GET['d']))
{

$tra=new acceso();
$reg=$tra->get_acceso($_SESSION["cod_usu_login"]);

$dato=$reg[0]["dato"];


 if ($dato==1)
{



echo "<script type='text/javascript'>
		
		window.location='acceso/validar.php';
		</script>";
}
else
{
$_SESSION['id_empresa']=$reg[0]["int_cod_emp"];
}

}


if (isset($_GET['id_empresa']))
{
$_SESSION['id_empresa']=$_GET['id_empresa'];
}
//print_r($_SESSION);

 ?>
<!DOCTYPE html>

<html lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<LINK REL="SHORTCUT ICON" HREF="img/ordecupe.ico">
<link href="img/ordecupe.ico" type="image/x-icon" rel="shortcut icon" />
    <meta charset="utf-8">
    <title>SISTEMA WEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your page description here">
    <meta name="author" content="">
    <!-- css -->
    <link href="css/menu.css" rel="stylesheet">

    <script type="text/javascript" src="paquetes/alertas/lib/alertify.js"></script>
    <link rel="stylesheet" href="paquetes/alertas/themes/alertify.core.css" />
    <link rel="stylesheet" href="paquetes/alertas/themes/alertify.default.css" />
</head>

	<!-- start header -->
	<header>	

		<div class="container">
        
			<div class="navbar navbar-static-top">
            <img src="css/images/ordecupe_logo_final.png" width="60" height="30">
				<div class="navigation">
				<nav>
					<ul class="nav topnav bold" id="navegador_tabs">
						<li class="dropdown active">
							<a >MANTENIMIENTO <i class="icon-angle-down"></i></a>
								<ul class="dropdown-menu bold">
									<li><a class="" onClick="addTab('Usuario','vista/mantenimiento/usuario/vista_usuario.php')">USUARIO</a></li>
									<li><a class="" onClick="addTab('Cliente','vista/mantenimiento/cliente/vista_cliente.php')">CLIENTES</a></li>
									<li><a class="" onClick="addTab('Proveedor','vista/mantenimiento/proveedor/vista_proveedor.php')">PROVEEDOR</a></li>
									<li><a class="" onClick="addTab('Titulos','vista/mantenimiento/titulos/vista_titulos.php')">TITULOS</a></li>
									<li><a class="" onClick="addTab('Sucursales','vista/mantenimiento/sucursales/vista_sucursales.php')">SUCURSALES</a></li>
									<li><a class="" onClick="addTab('Editoriales','vista/mantenimiento/editorial/vista_editorial.php')">EDITORIALES</a></li>
                                    <!--<li><a class="" onClick="addTab('Monedas','vista/mantenimiento/Monedas/vista_monedas.php')">MONEDAS</a></li>-->
									<li><a class="" onClick="addTab('Tipo de Cambio','vista/mantenimiento/tipo_cambio/vista_tipocambio.php')">TIPO DE CAMBIO</a></li>
									<li><a class="" onClick="addTab('Generos','vista/mantenimiento/genero/vista_generos.php')">GENEROS</a></li>	
									<li><a class="" onClick="addTab('Series','vista/mantenimiento/serie/vista_serie.php')">SERIES</a></li>
																</ul>
									</li>
						<li class="dropdown">
							<a >ALMACEN <i class="icon-angle-down"></i></a>
								<ul class="dropdown-menu bold">
									<li><a class="" onClick="addTab('Transacciones','vista/almacen/registro/index.php')">REGISTRO</a></li>
									<li><a class="" onClick="addTab('Histórico transacciones','vista/almacen/consulta/vista_guia.php')">HISTÓRICO</a></li>
              					</ul>
						</li>
                        <li class="dropdown">
							<a>VENTAS <i class="icon-angle-down"></i></a>
								<ul class="dropdown-menu bold">
									<li><a onClick="addTab('Registro Ventas','vista/ventas/registro/index.php')">REGISTRO</a></li>
									<li><a onClick="addTab('Histórico Ventas','vista/ventas/consulta/vista_ventas.php')">HISTÓRICO</a></li>

								</ul>
						</li>
						<li class="dropdown">
							<a >COMPRAS<i class="icon-angle-down"></i></a>
								<ul class="dropdown-menu bold">
									<li><a onClick="addTab('Registro Compras','vista/compras/registro/index.php')">REGISTRO</a></li>
									<li><a onClick="addTab('Histórico Compras','vista/compras/consulta/vista_compras.php')">HISTÓRICO</a></li>
									
								</ul>
							</li>                           
                            <li class="dropdown">
							<a>REPORTES<i class="icon-angle-down"></i></a>
								<ul class="dropdown-menu bold">
									<li class="dropdown">
                                    <a>ALMACÉN<i class="icon-angle-down"></i></a>
                                        <ul >
                                        <li><a onClick="addTab('Stock General','vista/stock/vista_stock.php')">Stock General</a></li>
                                        <li><a onClick="addTab('Reporte Stock Minimo','vista/reportes/almacen/reporte_stock_min.php')">Stock Mínimo</a></li>                                        <li><a onClick="addTab('prueba','vista/reportes/almacen/prueba.php')">prueba</a></li>                                                                         
                                        </ul>
                                    </li>

									<li class="dropdown">
                                    <a>VENTAS<i class="icon-angle-down"></i></a>
                                        <ul >
                                        <li><a onClick="addTab('Reporte Ventas','vista/reportes/ventas/reporte_ventas.php')">Record Ventas</a></li>
                                                                            
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown">
                                    <a>COMPRAS<i class="icon-angle-down"></i></a>
                                        <ul >
                                        <li><a onClick="addTab('Reporte Compras','vista/reportes/compras/reporte_titulos.php')">Record Compras</a></li>
                                                                            
                                        </ul>
                                    </li>									
								</ul>
							</li>
						<li class="dropdown">
							<a href="#">SALIR <i class="icon-angle-down"></i></a>
						        <ul class="dropdown-menu bold">
									<li><a href="conexiones/logout.php">CERRAR SESION</a></li>
								</ul>
						</li>
					</ul>
				</nav>
				</div>
					<!-- end navigation -->
				</div>
			</div>
			</div>
		</div>
	</header>	
	<!-- end header -->
	

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/funciones_principal.js"></script>



<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
	

    
  <body>
   <div id="tt" class="easyui-tabs" >
		<div align="center" title="INICIO">
        <p style="padding:80px;">
        <img src="css/images/ordecupe_logo.png">
        <p style="padding:60px;">
        
		</div>

	</div>  
 

</body>




</html>
