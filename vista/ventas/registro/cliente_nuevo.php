<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NUEVO CLIENTE</title>
</head>
 <link href="responsive/css/style.css" rel="stylesheet">
 <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script src="responsive/js/scripts.js"></script>
 <script src="funciones.js"></script>
  <link href="../../../paquetes/js/validar.js" rel="stylesheet">
  <style>
  .event {
	-moz-box-shadow: 0px 1px 0px 0px #f0f7fa;
	-webkit-box-shadow: 0px 1px 0px 0px #f0f7fa;
	box-shadow: 0px 1px 0px 0px #f0f7fa;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
	background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
	background-color:#33bdef;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #057fd0;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:10px 23px;
	text-decoration:none;
	text-shadow:0px -1px 0px #5b6178;
}
.event:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
	background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
	background-color:#019ad2;
}
.event:active {
	position:relative;
	top:1px;
}



  </style>
<body>
<div align="center">
<form name="form_dsct"  >
<div id="contact-form">
  <table width="34%"  class="table_css"  align="center">
    <tr>
      <td colspan="3" align="center"><p><img src="responsive/img/edit_user-.png" width="94" height="77" /></p>
        <p>CLIENTE NUEVO</p></td>
    </tr>
    <tr>
      <td colspan="3" class="tw">&nbsp;</td>
      </tr>
    <tr>
      <td width="27%"><p>&nbsp;</p>
      
        <p>TIPO CLIENTE : </p></td>
      <td colspan="2"><select name="tip_per" class="menu"   id="tip_per" onchange="validar_tipo_doc();" onFocus="validar_tipo_doc()"   onkeypress="return tab(event,this)">
        <option>--Seleccione--</option>
        <option value="1">Persona Natural</option>
        <option value="2">Persona Juridica</option>
      </select></td>
      </tr>
    <tr>
      <td><label id="rsocial" class="rsocial">R. SOCIAL:</label></td>
      <td colspan="2"><input name="rsoc" type="text"   id="rsoc"  onkeypress="return tab(event,this)" /></td>
      </tr>
    <tr>
      <td><label id="rucs" class="rucs">RUC:</label></td>
      <td ><input name="ruc" type="text" id="ruc" onKeyUp="return ValNumero(this);" onKeyPress="return tab(event,this)"   /></td>
      </tr>
    <tr>
      <td>DIRECCION:</td>
      <td width="36%"><input name="direccion" type="text"   id="direccion"  onkeypress="return tab(event,this)" /></td>
      <td width="37%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" name="boton" id="boton" class="event" value="GUARDAR" />
      <input type="hidden" name="dsct" value="9999"/>
          <a class="event" onClick="javascript:window.opener.document.form.clienteID.value = window.document.form_dsct.dsct.value;window.opener.document.form.cliente.value ='';window.close();">REGRESAR </a>
        
        </td>
      </tr>
    </table>


</form>
</div>



</body>
</html>

