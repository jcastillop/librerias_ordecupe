<script> 
function cerrarse(){ 
window.close() 
} 
</script> 



<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../../conexiones/class_serie.php");
require_once("../../../conexiones/conexion.php");
?>
  


<?php

$tra=new serie();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
	$tra->edit_serie($_GET["suc_id"], 
		             $_GET["emp_id"], 
		             $_GET["ser_id"], 
		             $_GET["estado"], 
		             $user, 
		             $fecha_actual);
}
   $reg=$tra->get_serie_por_id($_GET["emp_id"],$_GET["suc_id"],$_GET["ser_id"]);
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<title>Modificacion Cliente</title>

<!--STYLESHEETS-->
<link href="../../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
 <script type="text/javascript" src="../../../paquetes/js/validar.js"></script>

 <script type="text/javascript" src="js/validar.js"></script>
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
function validar(e) { // 1

    tecla = (document.all) ? e.keyCode : e.which; // 2

    if (tecla==8) return true; // 3

    patron =/[A-Za-z\s]/; // 4

    te = String.fromCharCode(tecla); // 5

    return patron.test(te); // 6

}

</script>

</head>
<body <?php if (isset($_GET['load'])){ echo "onload='cerrar();'";  } ?>   >

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon_"></div>
    <div class="pass-icon_"></div>
    <!--END SLIDE-IN ICONS-->
    <br />
    <br />

<!--LOGIN FORM-->
<form name="form1" class="login-form" action="mod_serie.php" method="get">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">CLIENTE</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	 
       <table width="100%" border="1">
        <tr>
          <td>Empresa: </td>
          <td>
            <select class="input username" name="cb_emp" disabled style="width: 160px;" id="cb_emp" onKeyPress="return tab(event,this)">
              <option value="<?php echo $reg[0]['int_cod_emp'];?>"><?php echo $reg[0]["var_nom_emp"];?></option>
            </select>
          </td>
        </tr>
          
        <tr>
          <td>Sucursal: </td>
          <td>
            <select class="input username" name="cb_suc" disabled style="width: 160px;" id="cb_suc">
              <option value="<?php echo $reg[0]['int_cod_suc'];?>"><?php echo $reg[0]["var_nom_suc"];?></option>   
            </select>
          </td>
        </tr>
        
		<tr>
          <td>N° Serie: </td>
          <td><input name="txt_ser" disabled type="text" value="<?php echo $reg[0]['var_cod_ser'];?>" maxlength="3" class="input username" style="width: 150px;" id="txt_ser"  onKeyPress="return tab(event,this)" /></td>
        </tr>
        <tr>
          <td>Estado: </td>
          <td>
            <?php
              if($reg[0]["int_est_ser"]==1) {
               	echo "<input type='checkbox' onclick='estado.value=this.checked?1:2' name='chk_est' id='chk_est' checked/>
               	      <label>Activo</label>";
              } else {
               	echo "<input type='checkbox' onclick='estado.value=this.checked?1:2' name='chk_est' id='chk_est'/>
               	      <label>Inactivo</label>";
              }
            ?>
          </td>
        </tr>

      </table>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer" >
    <!--LOGIN BUTTON-->
    <input type="submit" name="submit" value="GUARDAR" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON-->
    <input type="button" name="submit" value="CANCELAR" class="register"onClick="cerrarse()" /><!--END REGISTER BUTTON-->
    <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $_GET["emp_id"]; ?>">
    <input type="hidden" name="suc_id" id="suc_id" value="<?php echo $_GET["suc_id"]; ?>">
    <input type="hidden" name="ser_id" id="ser_id" value="<?php echo $_GET["ser_id"]; ?>">
    <input type="hidden" name="estado" id="estado">
    <input type="hidden" name="grabar" value="si" />
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
