
            $(document).ready(function(){
               
                 //capturando los datos para la edicion
                if(typeof $_GET("id") != 'undefined'){
                  
                var id_completo=$_GET("id");
				var sucursal=$_GET("sucursal");
				var empresa=1;
				
				alert(id_completo);
				alert(sucursal);
				alert(empresa);
                //var id = id_completo.substring(6, 12);
                $("#codigo_compra").val(id_completo);
				
                //alert(id_completo);

       
                };
                //Iniciando las validaciones del formulario
				$("#form").validate({
                //Especificando las reglas de validacion
                
        		rules: {
                            codigo_compra: {
                               required: true
                            },
                            descripcion: {
                               required: true
                            },
                            monto: {
                               required: true
                            },                            
                        
                    },
                // Especificandolos mensaje
                    messages: {
                        codigo_compra: "*",
                        fecha_registro: "*",
                        descripcion: "*",
                        monto: "*",                                       
                       
                    },
                    
                });
                                           
                
                });
				
				submitHandler: function(form) {
					
					//variables gastos
					var cod_emp=1;
					var cod_comp= $("#codigo_compra").val();
					var suc= $("#sucursal").val();
                    var descrip = $("#descripcion").val();
                    var monto = $("#monto").val();                   
                    var gas_usu='JSILVA';
					
					var comp_gasto = "[";
              
                    
                    //aqui me quedeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
                    for (var i=1;i<document.getElementById('grilla').rows.length-2;i++){ 
                        comp_gasto = comp_gasto + 
                            '{"codigo_libro":' 
                            + document.getElementById('grilla').rows[i].cells[0].childNodes[1].value + ", "
                            + '"precio_libro":'
                            + document.getElementById('grilla').rows[i].cells[2].childNodes[0].value + ", "                            
                            + '"cantidad_libro":'
                            + document.getElementById('grilla').rows[i].cells[3].childNodes[0].value + ", "
                            + '"valor_impuesto":'
                            + (document.getElementById('grilla').rows[i].cells[3].childNodes[0].value * document.getElementById('grilla').rows[i].cells[2].childNodes[0].value) * 0.18 + ", "
                            + '"valor_descuento":'
                            + (document.getElementById('grilla').rows[i].cells[3].childNodes[0].value * document.getElementById('grilla').rows[i].cells[2].childNodes[0].value) * document.getElementById('grilla').rows[i].cells[4].childNodes[0].value + ", "
                            + '"porcentaje_impuesto":'
                            + 18 + ", "
                            + '"porcentaje_descuento":'
                            + document.getElementById('grilla').rows[i].cells[4].childNodes[0].value + ", "
                            + '"costo_total_libro":'
                            + document.getElementById('grilla').rows[i].cells[4].childNodes[0].value + "}"

                            if (i==document.getElementById('grilla').rows.length-3){
                            pedido_detalle = pedido_detalle + "]";
                            }else{
                            pedido_detalle = pedido_detalle + ','; 
                            }       
                    }
					
                   
                   
                    
                    var pedido_detalle = "[";
					
					
					
					
					
					
					
					}
				
         

      function $_GET(param)
{
/* Obtener la url completa */
url = document.URL;
/* Buscar a partir del signo de interrogación ? */
url = String(url.match(/\?+.+/));
/* limpiar la cadena quitándole el signo ? */
url = url.replace("?", "");
/* Crear un array con parametro=valor */
url = url.split("&");

/* 
Recorrer el array url
obtener el valor y dividirlo en dos partes a través del signo = 
0 = parametro
1 = valor
Si el parámetro existe devolver su valor
*/
x = 0;
while (x < url.length)
{
p = url[x].split("=");
if (p[0] == param)
{
return decodeURIComponent(p[1]);
}
x++;
}
};

