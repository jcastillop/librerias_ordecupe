<script> 
function cerrarse(){ 
window.close() 
} 
</script> 
<?php
require_once("../../../conexiones/class_sucursal.php");
require_once("../../../conexiones/class_empresa.php");
require_once("../../../conexiones/class_pais.php");
require_once("../../../conexiones/conexion.php");
?>
  




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agregar sucursal</title>

<!--STYLESHEETS-->
<link href="../../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-1.2.6.min.js"></script>
 <script type="text/javascript" src="../../../paquetes/js/validar.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function(){
	// Parametros para e combo1


   $("#pais").change(function () {
   		$("#pais option:selected").each(function () {
			//alert($(this).val());
				elegido=$(this).val();			
				$.post("combo1.php", { elegido: elegido, }, function(data){
				$("#departamento").html(data);
				
			});			
        });
   })
   
     
   
   
	// Parametros para el combo2
	$("#departamento").change(function () {
   		$("#departamento option:selected").each(function () {
			//alert($(this).val());
				elegido2=$("#pais").val();
				elegido3=$("#departamento").val();
				$.post("combo2.php", { elegido2:elegido2, elegido3:elegido3  }, function(data){
				$("#provincia").html(data); 
			});			
        });
   })
});

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
	if (f.var_nom_suc.value   == '') { alert ('El campo Sucursal esta vacío, ingrese un dato porfavor!!');  
	f.var_nom_suc.focus(); return false; } 
	if (f.pais.value   == '--Seleccione--') { alert ('El campo País esta vacío, ingrese un dato porfavor!!');  
	f.pais.focus(); return false; }
	if (f.departamento.value   == '--Seleccione--') { alert ('El campo 	Departamento esta vacío, ingrese un dato porfavor!!');  
	f.departamento.focus(); return false; }
	if (f.provincia.value   == '--Seleccione--') { alert ('El campo Provincia esta vacío, ingrese un dato porfavor!!');  
	f.provincia.focus(); return false; }
	if (f.direccion.value   == '') { alert ('El campo Dirección esta vacío, ingrese un dato porfavor!!');  
	f.direccion.focus(); return false; } 
	
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
<form name="form1" class="login-form" action="ingresar_sucursal.php" method="post" onSubmit="return formulario(this)">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">SUCURSAL</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
        <tr>
          <td>Sucursal: </td>
          <td><input name="var_nom_suc" type="text" maxlength="50" style="width: 250px;" class="input username" onKeyPress="return tab(event,this)" /></td>
        </tr>
        <tr>
          <td>Descripción: </td>
          <td><input name="descripcion" type="text" maxlength="100" style="width: 400px;" class="input username" id="nombres_usu" onKeyPress="return tab(event,this)" /></td>
        </tr> 
        <tr>
         <td>País: </td>
          <td>
          <select  name="pais" id="pais" class="input username" style="width: 200px;" onKeyPress="return tab(event,this)">
          <!--<option value="999">--Seleccione--</option>-->
          <option>--Seleccione--</option>
          <?php
			$tra=new pais();
			$reg=$tra->get_combo_pais();
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_pais"];?>"><?php echo $reg[$i]["var_nom_pais"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
             </td>	
              </tr>
        <tr>	  
       <td>Departamento:</td>
          <td>
          <select name="departamento" style="width: 200px;" id="departamento" class="input username">	
            <option>--Seleccione--</option>
            </select>
          </td>
           </tr>
        <tr>
        <td>Provincia: </td>
          <td>
          <select name="provincia" style="width: 200px;" id="provincia" class="input username">
            <option>--Seleccione--</option>	
            </select>
          </td>		
           </tr>
<tr>
          <td>Dirección: </td>
          <td><input name="direccion" type="text" maxlength="50" style="width: 380px;"  class="input username" onKeyPress="return tab(event,this)" /></td>
        </tr>		
        <tr>
          <td>Telefono :</td>
          <td><input name="telf" id="telf" maxlength="15" style="width: 160px;" type="text" class="input username" onkeyUp="return ValNumero(this);" />
          <input name="estado" id="estado" type="hidden" value="1" class="input username"  /></td>
        </tr>        
      </table>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer" >
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="GUARDAR" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><input type="button" name="submit" value="CANCELAR" class="register"onClick="cerrarse()" /><!--END REGISTER BUTTON-->
    <input type="hidden" id="val1" value="" disabled="disabled"/> 
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><!--END GRADIENT-->

</body>
</html>

