<?php
require_once("../../../conexiones/class_sucursal.php");
require_once("../../../conexiones/class_usuario.php");
require_once("../../../conexiones/conexion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>VENTAS</title>
        <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="busquedas/js/jquery-1.4.2.js"></script>
        <script language="javascript" type="text/javascript" src="funciones.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
        
        <link href="../../../css/estilo.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>        
        
                 
        <script type='text/javascript' src="busquedas/js/jquery.autocomplete.js"></script>
		<link rel="stylesheet" type="text/css" href="busquedas/js/jquery.autocomplete.css" />
        
 <script type="text/javascript">

 function validaCondicion(b_valida)
 {
    document.forms['contact-form'].condiciones.disabled=!b_valida;
    if(!b_valida){
      document.forms['contact-form'].condiciones.value=0;
    }
    else{
      document.forms['contact-form'].condiciones.value='';
    } 

 }
 
 

$().ready(function() {
	$("#cliente").autocomplete("busquedas/autoCompleteMain.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#cliente").result(function(event, data, formatted) {
		$("#clienteID").val(data[1]);
		$("#ruc").val(data[2]);
		$("#direccion").val(data[3]);
		$("#distrito").val(data[4]);
	
	});
});

$().ready(function() {
	$("#valor_uno").autocomplete("busquedas/autoCompleteMainDescripcion.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#valor_uno").result(function(event, data, formatted) {
        var precio;
        
        if($('#mayoreo').is(':checked')){
          precio=data[4];
        }else{
          precio=data[2];
        }
        

		$("#valor_ide").val(data[1]);
		$("#valor_dos").val(precio);
        $("#tituloID").val(data[3]);
		$("#valor_tres").focus(3);
		
	
	});
});



$(document).ready(function () {
 
         var inputs = $(':input').keypress(function (e) {
             if (e.which == 13) {
                 e.preventDefault();
                 var nextInput = inputs.get(inputs.index(this) + 1);
                 if (nextInput) {
                     nextInput.focus();
                 }
             }
         });
 
              });
			  
			  


       
        </script>
        
        
    </head>

    
    
<script>
    function tabular(e,obj) {
        tecla=(document.all) ? e.keyCode : e.which;
        if(tecla!=13) return;
        frm=obj.form;
        for(i=0;i<frm.elements.length;i++) 
            if(frm.elements[i]==obj) { 
            if (i==frm.elements.length-1) i=-1;
            break; 
            }
        frm.elements[i+1].focus();
        return false;
    };

</script> 
    
<body>	
            <form name="form"  id="contact-form" class="login-form">
    
   <div class="container" >
            <h4 align="center" >Registro de Ventas</h4>
                
				<label for="lbltdoc">Tipo documento: </label>
                     <input type="hidden" id="clienteID" name="clienteID"/>
                        <select  name="tipo_doc" id="tipo_doc"  style="width:150px;margin-right:50px;" class="menu">
                            <option value="">-Seleccione-</option>
                            <option value="1">Boleta</option>
                            <option value="2">Factura</option>
                        </select>
                        <label for="lblsuc">Sucursal procedencia    : </label>
                        <select  name="sucursal" id="sucursal"  style="width:150px;margin-right:50px;" class="menu" onChange="from(document.form1.sucursal.value,'midiv','prueba.php')" >
                            <option value="">-Seleccione-</option>
                            <?php
                                 $tra=new sucursal();
                                 $reg=$tra->get_combo_sucursal();
                                 for ($i=0;$i<count($reg);$i++)
                                 {
                             ?>
                             <option value="<?php echo $reg[$i]["int_cod_suc"];?>"><?php echo $reg[$i]["var_nom_suc"];?></option>
                            <?php
                                 }
                            ?>
                        </select>
						 <label for="lblvend">Vendedor:</label>
                    <select  name="vendedor" id="vendedor"   class="menu" >
                      <option value="">-Seleccione-</option>
                      <?php
                                 $tra=new usuario();
                                 $reg=$tra->get_combo_usuario();
                                 for ($i=0;$i<count($reg);$i++)
                                 {
                             ?>
                      <option value="<?php echo $reg[$i]["int_cod_usu"];?>"><?php echo $reg[$i]["nombre"];?></option>
                      <?php
                                 }
                            ?>
                    </select><br>
                        <label for="lblfec" style="margin-left:75px">Fecha:</label>
                        <input name ="fecha_registro" type="text" id="datepicker" class="fecha"  />

                        <label name="lbl_mayoreo" id="lbl_mayoreo" style="width:80px;margin-left:10px">V. Mayoreo: </label>
                        <input name="mayoreo" type="checkbox" style="width:20px;"  id="mayoreo" value="0" />                        
                        <label name="lbl_afecto" id="lbl_afecto" style="width:80px;margin-left:10px">V. Afecto(IGV): </label>
                        <input name="afecto" type="checkbox" style="width:20px;"  id="afecto" value="0" />
                        
                        
     <label for="lblcond" style="margin-left:15px">Condicion:</label>
                        
                        
     <label name="lbl_ventas" id="lbl_ventas" style="width:20px;margin-left:9px">
        <input name="ventas" type="checkbox" style="width:20px;" onclick="javascript:validaCondicion(this.checked)" id="ventas"/>Venta a Plazo: </label>
                        <input name="condiciones" class="condiciones" id="condiciones" value="0" disabled type="text" />
                  <br><label for="lblcli" style="margin-left:68px"> Cliente:</label>
                    <input name="cliente" class="cliente"  type="text" id="cliente"  onKeyDown ="detectar_tecla (event);validar_ruc();" onkeyup="validar_ruc();validar_ruc_2();" onfocus="validar_datos()"  />
                   
                   <label for="lblruc" > R.U.C:</label>
                    <input name="ruc" class="input username" style="width:150px;margin-left:9px" type="text"  id="ruc"  onFocus="validar_cliente()" /></td>
                <label for="lbldir">Direccion:</label>
                      <input name="direccion" class="input username"  type="text" id="direccion"  />
                 <label for="lbldis">   Distrito:</label>
                    <input name="distrito" class="input username"  type="text" id="distrito" />
                    
            
         

            <br />
             </div>
            
      
           </div>  
     <div class="container3" >
             <h4 align="center">Registro de productos</h4>
            <div id="frm_usu">
                <table>

                    <tbody>
                        <tr>
                            <td> <label for="lblcod" style="width:180px">Código</label></td>
                            <td><input name="valor_ide" class="input username" style="width:100px" type="text" id="valor_ide" size="10" onkeypress="return tabular(event,this)"/></td>
       
                            <td><label for="lbldesc" style="width:180px">Descripción</label></td>
                            <td><input name="valor_uno" class="input username"style="width:300px" type="text" id="valor_uno" size="50" class="required"/></td>
                   
                            <td><label for="lbldesc" style="width:180px">Precio</label></td>
                            <td><input name="valor_dos" class="input username" style="width:100px" type="text" id="valor_dos" size="10" class="required"/>
                                <input type="hidden" id="tituloID" name="tituloID"></input>
                            </td>
                                
                            <td><label for="lbldesc" style="width:180px">Cantidad</label></td>
                            <td><input name="valor_tres" class="input username" style="width:100px" type="text" id="valor_tres" size="10" onkeypress="return tabular(event,this)"/></td>
                        </tr>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            
                        </tr>
                    </tfoot>
                </table>
            </div>    </div>
            
            	
			<div class="container4">
            <table id="grilla" class="lista" border="0" align="center">
              <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Descuento</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

 
                </tbody>
                <tfoot>
                	<tr>
                    	<td colspan="3"><strong>Cantidad:</strong> <span id="span_cantidad">0</span> productos.</td>
                        <td><strong>Suma total:</strong> <span id="suma_total">0</span></td>
                        <td colspan="5" align="center"><input id="submit" name="Submit" class="enviar" value="GUARDAR DATOS" type="submit" /></td>
                   
                    </tr>
                </tfoot>
            </table>
            </div>
         
</form> 

        
     
    </body>
</html>
