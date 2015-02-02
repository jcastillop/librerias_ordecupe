       $(document).ready(function(){
               
                                        
              $("#boton").click(function() {
                var tip_per=$("#tip_per").val();
                var rsoc=$("#rsoc").val();
                var ruc=$("#ruc").val();
                var direccion=$("#direccion").val();
                
                var dataString= 'tip_per='+tip_per+
                                        '&rsoc='+rsoc+
                                        '&ruc='+ruc+
                                        '&direccion='+direccion;
                                        
                    $.ajax({
                          type: "POST",
                          url: "insertar_datos_cliente.php",
                          data: dataString,
                          cache: false,
                          success: function(result){
                   
                            alert(result); 
                   

                          },
                          error: function(result){

                            alert("error");
                          }
                        });
                });

                //Iniciando el datepicker
                $( "#datepicker" ).datepicker({dateFormat: 'dd-mm-yy'});
                //Iniciando las validaciones del formulario
				$("#contact-form").validate({
                //Especificando las reglas de validacion
                
                        rules: {
						    
							tipo_doc: {
                               required: true
                            },
                            sucursal: {
                               required: true
                            },
                            fecha_registro: {
                               required: true
                            },
                            cliente: {
                               required: true
                            },
							ruc: {
                               required: true
                            },
                            vendedor: {
                               required: true
                            }
                           
                    },
                // Especificandolos mensaje
                    messages: {
					    tipo_doc: "*",
                        sucursal: "*",
                        fecha_registro: "*",
                        cliente: "*",
						ruc: {
                            required: "*",
                            maxlength: "Máximo 11 caracteres"
                        },						
                        vendedor: "*"
                       
                       
                    },
                    submitHandler: function(form) {
                        //Variables Cabecera Pedido

                   
					var tipo_doc= $("#tipo_doc").val();
                    var cod_suc = $("#sucursal").val();
                    var cod_cli = $("#clienteID").val();
                    var tip_ven = $("#ventas:checked").val()? 2:1;

                    var con_ven = $("#condiciones").val();
                    var fec_pedido=$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd ").val() + " 12:36:05";
                    
                    //Variables Cabecera Guia
                    var cod_ser='1';
                    var cod_usu=$("#vendedor").val();
                    
                    
                    if($("#afecto").is(':checked')) {
		             	var igv=0.18;
						var igv_t=18;
		               } else {
			             var igv=0;
						 var igv_t=0;
		               }

                    var pedido_detalle=[];
                    for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 
                        pedido_detalle.push({
                            codigo_libro: document.getElementById('grilla').rows[i].cells[0].childNodes[1].value,
                            precio_libro: document.getElementById('grilla').rows[i].cells[2].childNodes[0].value,
                            cantidad_libro: document.getElementById('grilla').rows[i].cells[3].childNodes[0].value,
                            valor_impuesto: document.getElementById('grilla').rows[i].cells[3].childNodes[0].value * document.getElementById('grilla').rows[i].cells[2].childNodes[0].value * igv,
                            valor_descuento: document.getElementById('grilla').rows[i].cells[4].childNodes[0].value,
                            porcentaje_impuesto: igv_t,
                            porcentaje_descuento: document.getElementById('grilla').rows[i].cells[4].childNodes[0].value,
                            costo_total_libro:document.getElementById('grilla').rows[i].cells[5].childNodes[0].value
                        });
                             
                    }
                   
                                                                                                                      
                        $.ajax({
                          type: "POST",
                          url: "insertar_datos.php",
                          data: {
                                cod_suc:cod_suc,
                                cod_cli:cod_cli,
                                fec_pedido:fec_pedido,
                                cod_ser:cod_ser,
                                cod_usu:cod_usu,
                                tipo_doc:tipo_doc,
                                tip_ven:tip_ven,
                                con_ven:con_ven,
                                pedido_detalle:JSON.stringify(pedido_detalle),
                                },
                          cache: false,
                          success: function(result){
                            
                            
							var res = jQuery.parseJSON(result);
                           
                            alert(res.mensaje);
                            limpiarformulario("#contact-form");
                            $("#condiciones").val("0");
                       
                          },
                          error: function(result){

                            alert("error");
                          }
                        });
                    
                    return false;   
        }
                });
                //Busqueda de titulos segun el codgo de barra proporcionado
                $("#valor_ide").change(function() {
                    
                    $.ajax({
                        type: "GET",
                        url: "titulos_buscar.php",
                        data: {
                            id: $("#valor_ide").val(),
                            mayoreo: $("#mayoreo:checked").val()? 2:1
                        },
                        success: function(datos){
                        
                        var res = jQuery.parseJSON(datos);
                        
                        if(res.nombre===""){
                            alert("Título no registrado, proceda a agregarlo en el menú correspondiente");
                        }else{
                        alert(res.codigo);
                        $("#valor_uno").val(res.nombre);

                        $("#tituloID").val(res.codigo);

                        $("#valor_dos").val(res.precio);
                        
                        $("#valor_cuatro").val(res.precio);
                     
                        $("#valor_tres").focus();
                        
                        fn_dar_eliminar();
                        fn_cantidad(); 
                        fn_sumatotal();
                        }
                        
                        },
                        error: function(datos) {
                        alert("Data not found");
                        }
                    });
                });

                $("#valor_tres").change(function() {
                        cadena = "<tr>";
                        cadena = cadena + "<td><input name='codigo[]' class='codigo' type='text' value='"+ $("#valor_ide").val() +"'  OnFocus='this.blur()'/><input name='codigo_titulo[]' id='codigo_titulo[]' type='hidden' value='"+ $("#tituloID").val() +"'/></td>";
                        cadena = cadena + "<td><input name='nombre[]' class='input username' id='nombre[]' type='text' value='"+ $("#valor_uno").val() +"'  OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='precio[]' class='precio' type='text' value='"+ $("#valor_dos").val() +"'  OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='cantidad[]' class='cantidad' id='cantidad[]' type='text' value='"+ $("#valor_tres").val() +"'  onKeyUp='sumar()'/></td>";
                        cadena = cadena + "<td><input name='descuento[]' class='descuento' id='descuento[]' type='text' value='0'  onKeyUp='sumar()'/></td>";
                        cadena = cadena + "<td><input name='total[]' class='total' id='total[]' type='text' value='"+ redondear($("#valor_dos").val() * $("#valor_tres").val()) +"'  OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><a class='elimina'><img src='delete.png' /></a></td></tr>";
                        $("#grilla tbody").append(cadena);
                        $('#frm_usu input[type="text"]').val('');
                        $("#valor_ide").focus();
                        fn_dar_eliminar();
                        fn_cantidad(); 
                        fn_sumatotal();
 
                });

                
                
            });
				
			function fn_cantidad(){
				cantidad = $("#grilla tbody").find("tr").length;
				$("#span_cantidad").html(cantidad);

                if(cantidad>27){
                   notificacion();
                   $("#valor_ide").prop('disabled', true);
                   $("#valor_uno").prop('disabled', true);
                   $("#valor_dos").prop('disabled', true);
                   $("#valor_tres").prop('disabled', true);
                }
			};

            function notificacion(){
                alert("No se puede registrar mas Títulos"); 
                return false;
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
	   
            function fn_sumatotal(){
                    var total=0;
                    for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 
                    total= total + parseFloat(document.getElementById('grilla').rows[i].cells[5].childNodes[0].value);
             
                    }
                    $("#suma_total").html(total); 
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
                fn_sumatotal()
                

            }
            function sumar(){
        
                var a_descuento = [], a_precio = [], a_cantidad  = [], a_total  = [];
                $('.descuento').each( function () {       
                    a_descuento.push($(this));
                } );
                $('.precio').each( function () {         
                    a_precio.push($(this));
                } );
                $('.cantidad').each( function () {        
                    a_cantidad.push($(this));
                } );  
                $('.total').each( function () {        
                    a_total.push($(this));
                } );  
          
                for(var i =0 ; i < a_cantidad.length ; i++){
            
                    a_total[i][0]['value'] = (a_precio[i][0]['value'] * a_cantidad[i][0]['value'])-((a_precio[i][0]['value'] * a_cantidad[i][0]['value'])*(a_descuento[i][0]['value']/100));

                }
         
            console.log(a_total);        
            console.log(a_precio);
            console.log(a_descuento);
            console.log(a_cantidad);
            fn_sumatotal();
            }

            function redondear(num){
                return Math.round(num * 100) / 100;
            }




/*     validar cliente                      */



			  
function Abrir_ventana (pagina) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=525, top=15, left=140";
window.open(pagina,"",opciones);
}
function abrir_popup()
	{
		xpos=(screen.width/2)-200; 
		ypos=(screen.height/2)-315; 
		window.open('cliente_nuevo.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=450, height=500, left='+ xpos+', top='+ ypos);
	}
function detectar_tecla(){
    with (event){
        if (keyCode==8 ){
			
			document.getElementById("clienteID").value="";
            event.keyCode = 0;
            event.cancelBubble = true;
            
            return false;
        
        }
    }
}
function error(){
				alertify.error("SELECCIONE CORRECTAMENTE SU OPCION"); 
				return false; 
			}
function validar_sucursal()
{
	var factura = document.getElementById("sucursal").value;
	if (factura=="")
	{
		
		document.getElementById("sucursal").style.borderColor = "#F00";
	}
	else
	{
		document.getElementById("sucursal").style.borderColor = "#CCC";
	}
}
function validar_factura()
{
	var factura = document.getElementById("tipo_doc").value;
	if (factura=="")
	{
		
		document.getElementById("tipo_doc").style.borderColor = "#F00";
		
		 error();
			
		
		
	}
	else
	{
		document.getElementById("tipo_doc").style.borderColor = "#CCC";
	}
	
	if (factura==1){
	
	document.getElementById('rsocial').innerHTML = 'DNI';
	}
	else if (factura==2){
		document.getElementById('rsocial').innerHTML = 'R.U.C';
		}
	
	
	
}
function validar_datos(){
	validar_sucursal();
	validar_factura();
	}
function validar_cliente()
{
	
	var factura = document.getElementById("tipo_doc").value;
    var id_cliente=document.getElementById("clienteID").value ;
if(id_cliente==""  )
{
	document.getElementById("ruc").disabled=true;
	document.getElementById("direccion").disabled=true;
	document.getElementById("distrito").disabled=true;
	document.getElementById("valor_ide").disabled=true;
	document.getElementById("valor_uno").disabled=true;
	document.getElementById("valor_dos").disabled=true;
	document.getElementById("valor_tres").disabled=true;	
    var r = confirm("CLIENTE NO EXISTE, DESEA AGREGAR UNO NUEVO!");
if (r == true) {
   abrir_popup();
    document.getElementById("clienteID").value=0;
    document.getElementById("ruc").disabled=true;
	document.getElementById("direccion").disabled=true;
	document.getElementById("distrito").disabled=true;
   	document.getElementById("cliente").style.borderColor = "#F00";
	document.getElementsByName('cliente')[0].placeholder='INGRESE CLIENTE CREADO ';	
	
} 
 else{
	 if (factura==2)
	 {
		 
		 
		 
	
		 
		 
		 
		 alert('NO SE PUEDE CREAR UNA FACTURA SIN CLIENTE')
		 document.getElementById("cliente").style.borderColor = "#ff0000";
		 document.getElementById("cliente").value="";
   
	document.getElementsByName('cliente')[0].placeholder='Ingrese Correctamente un Cliente ';
	
	
	
	 }
	 else
	 {
	document.getElementById("clienteID").value="999";
	document.getElementById("cliente").value="PRUEBA";
	document.getElementById("ruc").value="00000000";
   
	
	document.getElementById("ruc").disabled=false;
	document.getElementById("direccion").disabled=false;
	document.getElementById("distrito").disabled=false;
	document.getElementById("valor_ide").disabled=false;
	document.getElementById("valor_uno").disabled=false;
	document.getElementById("valor_dos").disabled=false;
	document.getElementById("valor_tres").disabled=false;
	
	document.getElementById("cliente").style.borderColor = "#0066CC";
	//document.getElementById("cliente").style.borderColor = "#ff0000";
	//document.getElementsByName('cliente')[0].placeholder='Ingrese Correctamente un Cliente ';
	 }
}	
}
else
{
document.getElementById("cliente").style.borderColor = "#FFF";
}
}
function validar_ruc_2(){
	
	var id_cliente=document.getElementById("clienteID").value ;
	if(id_cliente==9999)
	{
		var cant=document.getElementById("clienteID").value.length ;
		
	}
	}
    function validar_ruc(){
		//alert('validar_ruc');
	var id_cliente=document.getElementById("clienteID").value ;
	
	
	if ( id_cliente==9999){
	document.getElementById("ruc").disabled=true;
	document.getElementById("direccion").disabled=true;
	document.getElementById("distrito").disabled=true;
	document.getElementById("valor_ide").disabled=true;
	document.getElementById("valor_uno").disabled=true;
	document.getElementById("valor_dos").disabled=true;
	document.getElementById("valor_tres").disabled=true;
	var cant=document.getElementById("clienteID").value.length ;
	if(cant >0)
	{
	document.getElementById("ruc").disabled=false;
	document.getElementById("direccion").disabled=false;
	document.getElementById("distrito").disabled=false;
	document.getElementById("valor_ide").disabled=false;
	document.getElementById("valor_uno").disabled=false;
	document.getElementById("valor_dos").disabled=false;
	document.getElementById("valor_tres").disabled=false;
	document.getElementById("clienteID").value="";
	document.getElementById("ruc").value="";
	}
	}
	else if (id_cliente > 0 )
	{
		
	document.getElementById("ruc").disabled=false;
	document.getElementById("direccion").disabled=false;
	document.getElementById("distrito").disabled=false;
	document.getElementById("valor_ide").disabled=false;
	document.getElementById("valor_uno").disabled=false;
	document.getElementById("valor_dos").disabled=false;
	document.getElementById("valor_tres").disabled=false;
	
	}
	else
	{
		
	}
} 



/*       fin validacion de cliente              */
