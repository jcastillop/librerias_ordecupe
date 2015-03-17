<?php 

 @session_start();
//print_r($_SESSION);
/*
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
//$_SESSION['id_empresa']=$reg[0]["int_cod_emp"];
$_SESSION['id_empresa']=1;
}

}


if (isset($_GET['id_empresa']))
{
//$_SESSION['id_empresa']=$_GET['id_empresa'];
$_SESSION['id_empresa']=1;
}
//print_r($_SESSION);
*/

$_SESSION['id_empresa']=1;
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ORDECUPE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="paquetes/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="paquetes/bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
    <link href="paquetes/bootstrap/css/bootstrap-submenu.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/easyui.css"/>
    <link rel="stylesheet" type="text/css" href="css/icon.css"/>
    <link href="css/menunew.css" rel="stylesheet">
    <script type="text/javascript" src="paquetes/alertas/lib/alertify.js"></script>

</head>
<body>
    <div class="container-full">
        <header>
            <nav class="navbar navbar-default navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="buttom" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">
                            <img src="css/images/ordecupe_logo_final.png" width="60" height="30">
                        </div>
                    </div>

                    <div class="collapse navbar-collapse " id="navbar-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"><!--MANTENIMIENTO-->
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">MANTENIMIENTO <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="" onClick="addTab('Usuario','vista/mantenimiento/usuario/vista_usuario.php')">USUARIO</a></li>
                                    <li><a class="" onClick="addTab('Cliente','vista/mantenimiento/cliente/vista_cliente.php')">CLIENTES</a></li>
                                    <li><a class="" onClick="addTab('Proveedor','vista/mantenimiento/proveedor/vista_proveedor.php')">PROVEEDOR</a></li>
                                    <li><a class="" onClick="addTab('Titulos','vista/mantenimiento/titulos/vista_titulos.php')">TITULOS</a></li>
                                    <li><a class="" onClick="addTab('Sucursales','vista/mantenimiento/sucursales/vista_sucursales.php')">SUCURSALES</a></li>
                                    <li><a class="" onClick="addTab('Editoriales','vista/mantenimiento/editorial/vista_editorial.php')">EDITORIALES</a></li>
                                    <li><a class="" onClick="addTab('Tipo de Cambio','vista/mantenimiento/tipo_cambio/vista_tipocambio.php')">TIPO DE CAMBIO</a></li>
                                    <li><a class="" onClick="addTab('Generos','vista/mantenimiento/genero/vista_generos.php')">GENEROS</a></li>
                                    <li><a class="" onClick="addTab('Series','vista/mantenimiento/serie/vista_serie.php')">SERIES</a></li>
                                </ul>
                            </li><!--MANTENIMIENTO-->

                            <li class="dropdown"><!--ALMACEN-->
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">ALMACEN <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="" onClick="addTab('Transacciones','vista/almacen/registro/index.php')">REGISTRO</a></li>
                                    <li><a class="" onClick="addTab('Histórico transacciones','vista/almacen/consulta/vista_guia.php')">HISTORICO</a></li>
                                </ul>
                            </li><!--ALMACEN-->

                            <li class="dropdown"><!--VENTAS-->
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">VENTAS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a onClick="addTab('Registro Ventas','vista/ventas/registro/index.php')">REGISTRO</a></li>
                                    <li><a onClick="addTab('Histórico Ventas','vista/ventas/consulta/vista_ventas.php')">HISTORICO</a></li>
                                </ul>
                            </li><!--VENTAS-->

                            <li class="dropdown"><!--COMPRAS-->
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">COMPRAS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a onClick="addTab('Registro Compras','vista/compras/registro/index.php')">REGISTRO</a></li>
                                    <li><a onClick="addTab('Histórico Compras','vista/compras/consulta/vista_compras.php')">HISTORICO</a></li>
                                </ul>
                            </li><!--COMPRAS-->

                            <li class="dropdown "><!--REPORTES-->
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">REPORTES <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li class="dropdown-submenu">
                                        <a href="#">ALMACEN</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a onClick="addTab('Stock General','vista/reportes/almacen/stock/index.php')">Stock General</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown-submenu">
                                        <a href="#">VENTAS</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a onClick="addTab('Reporte Ventas','vista/reportes/ventas/reporte_ventas.php')">Record de Ventas</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown-submenu">
                                        <a href="#">COMPRAS</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a onClick="addTab('Reporte Compras','vista/reportes/compras/reporte_titulos.php')">Record de Compras</a></li>
                                        </ul>
                                    </li>

                                        <li class="dropdown-submenu">
                                        <a href="#">COONTABILIDAD</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a onClick="addTab('Registro de Ventas e Ingresos','vista/reportes/contabilidad/ventas_ingresos/index.php')">Registro de Ventas e Ingresos</a></li>
                                            <li><a onClick="addTab('Registro de Compras','vista/reportes/contabilidad/compras_registro/index.php')">Registro de Compras</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li><!--REPORTES-->
                            <li><!--CERRAR SESION-->
                                <a href="conexiones/logout.php">CERRAR SESION</a>
                            </li><!--COMPRAS-->
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div id="tt" class="col-dm-12 easyui-tabs" style="margin-top:-20px;" >
        <div align="center" title="Inicio">
            <p style="padding:80px;">
            <img class="img-responsive" src="css/images/ordecupe_logo.png">
            <p style="padding:60px;">
        </div>
    </div>

<script src="js/jquery-vu.js"></script>
<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
<script src="paquetes/bootstrap/js/bootstrap.min.js"></script>
<script src="paquetes/bootstrap/js/bootstrap-submenu.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/easyui.css">
<link rel="stylesheet" type="text/css" href="css/icon.css">
<script src="js/funciones_principal.js"></script>


<script>
$(document).ready(function(){
    $('.dropdown-submenu>a').submenupicker();
});
</script>

</body>
</html>
