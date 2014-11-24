<?php
require_once("../../../conexiones/class_sucursal.php");
require_once("../../../conexiones/conexion.php");
require_once("../../../conexiones/class_usuario.php");
require_once("../../../conexiones/class_cliente.php");

?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
        <title>jQuery - agregar y eliminar filas en una tabla</title>
        <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
        <script language="javascript" type="text/javascript" src="funciones.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />		
        <link href="../../../css/estilo.css" rel="stylesheet" type="text/css" />
    
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
          <style type="text/css">
    .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #register-form label.error, .output {color:#FF0000;font-weight:bold;}
  </style>

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
    
    <form  id="form">
        <div class="container2" id="calculos">
            <h4 align="center" >Costo porque</h4>
                <label for="lblcod"style="margin-left:50px" >Codigo compra</label>
                <input name ="codigo_compra" type="text" id="codigo_compra" style="width:80px" />

                <input name ="codigo_sucursal" type="hidden" id="codigo_sucursal"/>

                <label for="lblfec"style="margin-left:50px" >Fecha compra</label>
                <input name ="fecha_compra" type="text" id="fecha_compra" style="width:100px" />

                <label for="lbldesc"style="margin-left:50px" >Descripción de compra</label>
                <input name ="descripcion_compra" type="text" id="descripcion_compra" class="input username" style="width:200px" />
                     
                <label for="lblfactor"style="margin-left:380px" >Factor = GASTO TOTAL / FOB =</label>
                <span id="total_compra">0</span>
                
                /
                
                <span id="fob_compra">0</span>
                =
                <span id="factor">0</span>
        </div>
        <div class="container3" id="registro">
            <h4 align="center" >Registro costos de transporte</h4>
                 
                                    
                     
                     <input name ="codigo_sucursal" type="hidden" id="codigo_sucursal"/>

                     <label for="lbldesc"style="margin-left:250px" >Descripción</label>
                     <input name ="descripcion" type="text" id="descripcion" class="input username" style="width:100px" />
                     
                     <label for="lblcodcomp"style="margin-left:100px" >Monto</label>
                     <input name ="monto" type="text" id="monto" class="input username" style="width:100px"  onkeypress="return tabular(event,this)" />
			
        </div>

            	
			<div align="center" class="container4" style="height:auto; overflow: scroll;" >
            <table id="grilla">
              <thead>
                    <tr>
                        <th style="width:50px;">Descripción</th>
                        <th style="width:50px;">Monto</th>
                    </tr>
              </thead>
                <tbody>

 
                </tbody>
                <tfoot>
                	<tr>
                        <td><strong>Cantidad:</strong> <span id="span_cantidad">0</span> productos.</td>
                        <td><strong>Acción:</strong> <input id="submit" name="Submit" class="enviar" value="Enviar" type="submit"></td>
                        <td><strong>Suma total:</strong> <span id="suma_total">0</span></td>
                    </tr>
                </tfoot>
            </table>
            </div>
            
</form> 

        
    
        

     
    </body>
</html>

