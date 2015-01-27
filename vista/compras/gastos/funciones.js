
$(document).ready(function(){
var tipo_accion;               
  //capturando los datos para la edicion
  if(typeof $_GET("id") != 'undefined'){
                  
    var codigo=$_GET("id");
		var sucursal=$_GET("sucursal");
    var empresa=1;

    $("#codigo_compra").val(codigo);

    $("#codigo_sucursal").val(sucursal);




    $.ajax({
      type: "GET",
      url: "gastos_buscar.php",
      //concatenamos los parametros que usaremos para buscar los registros
      data: "cod=" + codigo + "&suc=" + sucursal+ "&emp=" + empresa,
      success: function(datos){

        
        //decodificando el JSON proveniente de guias_buscar.php                        
        var jsonData = JSON.parse(datos);
         
        cadena_precio_mercaderia="<tr>";
        cadena_precio_mercaderia= cadena_precio_mercaderia + "<td><input name='desc[]' class='input username' type='text' value='FOB(Precio Mercaderia)' size='15' OnFocus='this.blur()'/></td>";
        cadena_precio_mercaderia= cadena_precio_mercaderia + "<td><input name='monto[]' class='input username' type='text' value='"+ jsonData[0][0].total +"' size='30' OnFocus='this.blur()'/></td>";
        cadena_precio_mercaderia= cadena_precio_mercaderia + "</tr>";

        $("#grilla tbody").append(cadena_precio_mercaderia);
       
         tipo_accion=jsonData.length;
          for(i=1;i<jsonData.length;i++){
                //cargando en un array en una cadena con el formato de la tabla detalle   
                if(jsonData[i].var_cod_comp_gas>0){
                    cadena = "<tr>";
                    cadena = cadena + "<td><input name='desc[]' class='input username' type='text' value='"+ jsonData[i].var_des_comp_gas +"' size='15' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><input name='monto[]' class='input username' type='text' value='"+ jsonData[i].dec_val_comp_gas +"' size='30' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><a class='elimina'><img src='delete.png' /></a></td>";
                    cadena= cadena + "</tr>";
                    //agregando la cadena a la grilla
                    $("#grilla tbody").append(cadena);

                };     



                };
                $("#fecha_compra").val(jsonData[0][0].date_fec_rec_comp_cab);
                $("#descripcion_compra").val(jsonData[0][0].var_desc_comp_cab);
                $("#fob_compra").html(jsonData[0][0].total);
                   //estableciendo el foco 
                    $("#descripcion").focus();
                    //funcion eliminar permite activar la opcionde borrar los registros
                    fn_dar_eliminar();
                    //halla la cantidad de registros cargados a la grilla
                    fn_cantidad();
                    //realiza la suma total correspondiente al valor de los productos
                    fn_sumatotal();


      },

      error: function(datos) {
        alert("Data not found");
      }

    });
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
                    var fac_com=$("#factor").html(); 
                  
                  
                            
                    var detalle = "[";

                    for (var i=2;i<document.getElementById('grilla').rows.length-1;i++){ 
                     
                        detalle = detalle 
                            +'{"descripcion":"' 
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
                                        '&fac_com='+fac_com+
                                        '&tipo_accion='+tipo_accion+
                                        '&detalle='+detalle;
                                                          
                         
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
                    fn_sumatotal();
 
                });
	                                           
                
                });
				
			
		          function fn_cantidad(){
                cantidad = $("#grilla tbody").find("tr").length;
                $("#span_cantidad").html(cantidad);
               
            };
            function fn_sumatotal(){
                    
    var total=0;
    for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 
                    
        total= total + parseFloat(document.getElementById('grilla').rows[i].cells[1].childNodes[0].value);
             
    }
    total=parseFloat(Math.round(total * 100) / 100).toFixed(2);
    $("#suma_total").html(total); 
    $("#total_compra").html(total);
    var fob=parseFloat($("#fob_compra").html());
    if(total>0){
      var fac=parseFloat(Math.round(total/fob * 100) / 100).toFixed(2);
      $("#factor").html(fac); 
      
    }

};  
            
            
      

               function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    
                  
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
                            fn_cantidad(); 
                            fn_sumatotal();
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

