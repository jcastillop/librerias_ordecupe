<script> 
function cerrarse(){ 
window.close() 
} 
</script> 

<?php
require_once("../../../conexiones/class_usuario.php");
require_once("../../../conexiones/class_rol.php");
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
<title>USUARIO</title>

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


function formulario(f) {
	if (f.nick_usu.value   == '') { alert ('El campo Nick Usuario esta vacío, ingrese un dato porfavor!!');  
	f.nick_usu.focus(); return false; } 
	
	if (f.clave_usu.value  == '' ) { 
		alert ('El campo Clave esta vacio, ingrese un datos porfavor');
		f.clave_usu.focus(); return false; }
	else if (f.clave_usu.value  != '' && f.clave_usu.value.length <=6) { 
			alert ('La clave debe de tener mas de 6 digitos!');
			f.clave_usu.focus(); return false;
		}
	
	if (f.rol.value   == '--Seleccione--') { alert ('El campo Seleccione Rol esta vacío, ingrese un dato porfavor!!');  
	f.rol.focus(); return false; }
	if (f.nombres_usu.value   == '') { alert ('El campo Nombres completos esta vacío, ingrese un dato porfavor!!');  
	f.nombres_usu.focus(); return false; } 
	if (f.ap_pat.value   == '') { alert ('El campo Apellido Paterno esta vacío, ingrese un dato porfavor!!');  
	f.ap_pat.focus(); return false; } 
	if (f.ap_mat.value   == '') { alert ('El campo Apellido Materno esta vacío, ingrese un dato porfavor!!');  
	f.ap_mat.focus(); return false; } 
 return true; } 
 
 

</script>

</head>
<body <?php if (isset($_GET['load'])){ echo "onload='cerrarse();'";  } ?> >

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon_"></div>
    <div class="pass-icon_"></div>
    <!--END SLIDE-IN ICONS-->
    <br />
    <br />

<!--LOGIN FORM-->
<form name="f" class="login-form" action="ingresar_usuario.php" method="post" onSubmit="return formulario(this)">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">USUARIOS</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="100%" border="1">
        <tr>
          <td height="20">Nick deUsuario: </td>
          <td><input name="nick_usu" type="text" maxlength="50" class="input username" id="nick_usu"  style="width: 200px;" onKeyPress="return tab(event,this)" /></td>
           </tr>
        <tr>
          <td>Clave Usuario: </td>
          <td><input name="clave_usu" type="password" maxlength="50" class="input username" style="width: 200px;"  onKeyPress="return tab(event,this)" /></td>
        </tr>
        <tr>
          <td>Seleccione Rol: </td>
          <td>
          <select class="input username" style="width: 160px;"  name="rol" id="rol" onKeyPress="return tab(event,this)">
          		   <option>--Seleccione--</option>
          		<?php
					$tra=new rol();
					$reg=$tra->get_combo_rol();
					for ($i=0;$i<count($reg);$i++)
					{
				?>
				   <option value="<?php echo $reg[$i]["int_cod_rol"];?>"><?php echo $reg[$i]["var_nom_rol"];?></option>
				
				
				<?php
					}
				?>
         
            </select>
          </td>
           </tr>
        <tr>
          <td>Nombres Completos: </td>
          <td><input name="nombres_usu" type="text" maxlength="50" class="input username" id="nombres_usu" style="width: 200px;" onKeyDown="return tab(event,this)"  onKeyPress="return validar(event)" /></td>
        </tr>
        <tr>
          <td>Apellido Paterno: </td>
          <td><input name="ap_pat" type="text" maxlength="50" class="input username" style="width: 200px;" onKeyDown="return tab(event,this)" onKeyPress="return validar(event)" /></td>
          </tr>
        <tr>
          <td>Apellido Materno :</td>
          <td><input name="ap_mat" type="text" maxlength="50" class="input username" style="width: 200px;" onKeyPress="return validar(event)" /></td>
        </tr>
        <tr>
          <td>Empresas Asignada :</td>
          <td>
            <select name="empresa[]" size="1" multiple="multiple" id="empresa"  style="width:200px; height:35px; text-align:center; font-size:14px;">
          <?php
					$tra=new rol();
					$reg=$tra->get_combo_empresa();
					for ($i=0;$i<count($reg);$i++)
					{
				?>
				   <option value="<?php echo $reg[$i]["int_cod_emp"];?>" ><?php echo $reg[$i]["var_nom_emp"];?></option>
				
				
				<?php
					}
				?>
          </select></td>
        </tr>
        
        <tr>
          <td><input name="estado" id="estado" type="hidden" value="1" class="input username"  /></td>
        </tr>
      </table>
      <br><br>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer" >
      <div class="text-center">
        <!--LOGIN BUTTON--><input class="btn btn-primary" type="submit" name="submit" value="GUARDAR" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><input class="btn btn-default" type="button" name="submit" value="CANCELAR" onClick="cerrarse()" /><!--END REGISTER BUTTON-->
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

