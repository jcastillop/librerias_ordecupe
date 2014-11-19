
            $(document).ready(function(){
               
                 //capturando los datos para la edicion
                if(typeof $_GET("id") != 'undefined'){
                  
                var id_completo=$_GET("id");
				var sucursal=$_GET("sucursal");
				
				
               //var id = id_completo.substring(6, 12);
                $("#codigo_compra").val(id_completo);
                $("#codigo_sucursal").val(sucursal);
				
                //alert(id_completo);

       
                };
                //Iniciando las validaciones del formulario
                $("#form").validate({
                //Especificando las reglas de validacion
                
                    rules: {
                        codigo_compra: {
                        required: true
                        },
                    },
                // Especificandolos mensaje
                    messages: {
                        codigo_compra: "*",
                    },
                    submitHandler: function(form) {
                        //Variables Cabecera Pedido
                        
                    var cod_com=$("#codigo_compra").val();
                    var cod_suc=$("#codigo_sucursal").val();
                    var cod_emp=1;
          
                   
                    var detalle = "[";
                    for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 
                        
                        detalle = detalle + 
                            '{"descripcion":"' 
                            + document.getElementById('grilla').rows[i].cells[0].childNodes[0].value + '", '
                            + '"monto":'
                            + document.getElementById('grilla').rows[i].cells[1].childNodes[0].value + "}";
                           
                        
                            if (i==document.getElementById('grilla').rows.length-2){
                            detalle = detalle + "]";
                            }else{
                            detalle = detalle + ','; 
                            }       
                    }
                     
                    if(detalle=="["){
                       
                        alert("Registre correctamente los campos as");
                    } else {
                                        //Datos Cabecera Pedido
                        var dataString= 'cod_com='+cod_com+
                                        '&cod_suc='+cod_suc+
                                        '&cod_emp='+cod_emp+
                                        '&detalle='+detalle;
                        alert(dataString);                                      
                        $.ajax({
                          type: "POST",
                          url: "insertar_datos.php",
                          data: dataString,
                          cache: false,
                          
                          success: function(result){
                            alert(result);
                                                      
                            limpiarformulario("#form");
                        
                          },
                          error: function(result){
                            alert("error");
                          }
                        });
                    }
                    
                    return false;   
                    }
                });
                $("#monto").change(function() {
                    cadena = "<tr>";
                    cadena = cadena + "<td><input name='desc[]' class='input username' id='desc[]' type='text' value='"+ $("#descripcion").val() +"' size='15' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><input name='monto[]' class='input username' id='nombre[]' type='text' value='"+ $("#monto").val() +"' size='30' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><a class='elimina'><img src='delete.png' /></a></td>";
                    $("#grilla tbody").append(cadena);
                    $('#descripcion').val('');
                    $('#monto').val('');
                    $("#descripcion").focus();
                    fn_dar_eliminar();
                    fn_cantidad();
              
 
                });
	                                           
                
                });
				
			
		          function fn_cantidad(){
                cantidad = $("#grilla tbody").find("tr").length;
                $("#span_cantidad").html(cantidad);
               
            };
            
            
      

               function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    
                  
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
                            fn_cantidad(); 
                       
                            /*
                                aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar.php", {ide_usu: id})
                            */
                        })
                    
                });

            };
            function limpiarformulario(formulario){
   /* Se encarga de leer todas las etiquetas input del formulario*/
     $(formulario).find('input').each(function() {
      switch(this.type) {
         case 'password':
         case 'text':
         case 'hidden':
              $(this).val('');
              break;
         case 'checkbox':
         case 'radio':
              this.checked = false;
      }
   });
 
   /* Se encarga de leer todas las etiquetas select del formulario */
   $(formulario).find('select').each(function() {
       $("#"+this.id + " option[value='']").attr("selected",true);
   });
   /* Se encarga de leer todas las etiquetas textarea del formulario */
   $(formulario).find('textarea').each(function(){
      $(this).val('');
   });
      $('#grilla tbody').empty();
                               fn_cantidad(); 
                            fn_sumatotal();
                            
};
				
         

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

