<script> 
function cerrarse(){ 
window.close() 
} 
</script> 
<?php
require_once("../../../conexiones/class_proveedor.php");
require_once("../../../conexiones/class_pais.php");
require_once("../../../conexiones/conexion.php");
?>
  




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
<title>PROVEEDOR</title>

<!--STYLESHEETS-->
<link href="../../../paquetes/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../../paquetes/bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
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
	if (f.raz_soc.value   == '') { alert ('El campo Razon Social esta vacío, ingrese un dato porfavor!!');  
	f.raz_soc.focus(); return false; }  
	if (f.tip_per.value   == '--Seleccione--') { alert ('El campo Tipo de Persona esta vacío, ingrese un dato porfavor!!');  
	f.tip_per.focus(); return false; }
	if (f.nro_doc.value  != '' && f.nro_doc.value.length < 11) {
		 alert ('El campo RUC tiene menos de 11 Digitos, Complete los digitos porfavor!!');
  		f.nro_doc.focus(); return false; 
		}
	if (f.distrito.value   == '') { alert ('El campo Distrito esta vacío, ingrese un dato porfavor!!');  
	f.distrito.focus(); return false; }
	if (f.direccion.value   == '') { alert ('El campo Dirección  esta vacío, ingrese un dato porfavor!!');  
	f.direccion.focus(); return false; }
	if (f.contacto.value   == '') { alert ('El campo Contacto  esta vacío, ingrese un dato porfavor!!');  
	f.contacto.focus(); return false; }	
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
<form name="form1" class="login-form" action="ingresar_proveedor.php" method="post" onSubmit="return formulario(this)">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">PROVEEDOR</h1>	
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
        <tr>
          <td height="20">Razon Social: </td>
          <td><input name="raz_soc" type="text" maxlength="50" style="width: 400px;" class="input username" onKeyPress="return tab(event,this)" /></td>	
           </tr>
        <tr>
          <td height="20">Tipo de Persona: </td>
          <td><select name="tip_per" class="input username" style="width: 160px;" id="tip_per" onKeyPress="return tab(event,this)">
                <option>--Seleccione--</option>
                <option value="1">Persona Natural</option>
                <option value="2">Persona Juridica</option>
              </select>
              RUC:
          <input name="nro_doc" type="text" maxlength="11" style="width: 180px;" class="input username" onKeyPress="return tab(event,this)"  onkeyUp="return ValNumero(this);" /></td>	
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
          <td>Distrito: </td>
          <td><input name="distrito" type="text" maxlength="50" style="width: 300px;" class="input username" onKeyDown="return tab(event,this)" onKeyPress="return validar(event)" /></td>
           </tr>
        <tr>
          <td>Dirección: </td>
          <td><input name="direccion" type="text" maxlength="50" style="width: 400px;" class="input username" onKeyPress="return tab(event,this)" /></td>
           </tr>
        <tr>
          <td>Telefono: </td>
          <td><input name="telefono" type="text" maxlength="15" style="width: 150px;" class="input username" onKeyPress="return tab(event,this)" onkeyUp="return ValNumero(this);" />
          Celular:
          <input name="celular" type="text" maxlength="15" style="width: 150px;" class="input username" onKeyPress="return tab(event,this)" onkeyUp="return ValNumero(this);" /></td>
           </tr>
        <tr>
          <td>Fax: </td>
          <td><input name="fax" type="text" maxlength="15" style="width: 150px;" class="input username" onKeyPress="return tab(event,this)" onkeyUp="return ValNumero(this);" /></td>
        </tr>
        <tr>
        <td>Contacto:</td>
        <td><input name="contacto" type="text" maxlength="50" style="width: 250px;" class="input username" />
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

