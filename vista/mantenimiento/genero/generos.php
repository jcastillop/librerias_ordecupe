<script> 
function cerrarse(){ 
window.close() 
} 
</script> 
<?php
require_once("../../../conexiones/class_genero.php");
require_once("../../../conexiones/conexion.php");
?>
  




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agregar género</title>

<!--STYLESHEETS-->
<link href="../../../paquetes/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../../paquetes/bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
<link href="../../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="../../../paquetes/js/validar.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();



function from(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la p�gina en el cach�...
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petici�n sea asincr�nica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }/*else
               {
			document.getElementById(ide).innerHTML="<img src='ima/loading.gif' title='cargando...' />";

                }*/
       }
       miPeticion.send(null);

}

function formulario(f) {
	if (f.var_nom_gen.value   == '') { alert ('El campo Nombre de Generos esta vacío, ingrese un dato porfavor!!');  
	f.var_nom_gen.focus(); return false; }  
	
 return true; } 
</script>

</head>
<body <?php if (isset($_GET['load'])){ echo "onload='cerrarse();'";  } ?>   >

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon_"></div>
    <div class="pass-icon_"></div>
    <!--END SLIDE-IN ICONS-->
    <br />
    <br />

<!--LOGIN FORM-->
<form name="form1" class="login-form" action="ingresar_generos.php" method="post" onSubmit="return formulario(this)">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">GÉNERO</h1>	
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
        <tr>
          <td height="20">Nombre Generos: </td>
          <td><input name="var_nom_gen" type="text" maxlength="50" style="width: 400px;" class="input username" onKeyPress="return tab(event,this)" /></td>	
           </tr>
        <tr>
          <td height="20">Descripcion: </td>
          <td><input type="text" class="input username" style="width: 160px;"   name="var_des_gen" id="var_des_gen" />
          <input name="estado" id="estado" type="hidden" value="1" class="input username" /></td>
          </tr>
      </table>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
   <div class="footer" >
      <div class="text-center">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="GUARDAR" class="btn btn-primary" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><input type="button" name="submit" value="CANCELAR" class="btn btn-default" onClick="cerrarse()" /><!--END REGISTER BUTTON-->
    <input type="hidden" id="val1" value="" disabled="disabled"/> 
    </div>
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><!--END GRADIENT-->
<script src="../../../js/jquery-vu.js"></script>
<script src="../../../paquetes/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

