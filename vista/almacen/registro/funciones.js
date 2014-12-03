
$(document).ready(function(){
    //ocultando campos, al seleccionar el chek box los campos se podran visualizar
    $("#trans_dat").css("display", "none");
	$("#trans_dat1").css("display", "none");   
    //Iniciando el datepicker y estableciendo el formato dia-mes-año
    $( "#datepicker" ).datepicker({dateFormat: 'dd-mm-yy'});
    /*
    capturando los datos para la edición, al hacer doble click en la grilla de almacen/consulta/vista_guia.php
    se envía con el metodo get: el codigo del registro, serie y almacén. Para que estos valores puedan ser interceptados
    por funciones.js es necesario declarar un metodo "GET" que permita su lectura (el metodo get se implementa en
    la linea 452)
    */
    /*
    "typeof" permite capturar si se asignaron valores de 'undefined'. Si existen valores pasados se registra una nueva
    guia, caso contrario se editará por lo cual se cargaran los inputo mediante el uso de JQUERY y JSON
    */
    if(typeof $_GET("id") != 'undefined'){
        //capturamos el valor que es la concatenacion de la serie y el codigo
        var id_completo=$_GET("id");
        //el uso del metodo substring permite extraer caracteres de un String especificando su posición
        //extraemos el codigo correspondiente al registro que ocupa las posiciones de 4 a la 12
        var id = id_completo.substring(4, 12);
        //extraemos la serie que ocupa las posiciones de 0 a 3
        var serie = id_completo.substring(0, 3); 
        //capturamos la sucursal
        var sucursal=$_GET("sucursal");
        //capturamos el codigo de empresa la cual debe venir de las variables de sesion
        var empresa=1;
        //inicializamos el ajax que permitirá ubicar los registros correspondientes                
        
        $.ajax({
            type: "GET",
            url: "guias_buscar.php",
            //concatenamos los parametros que usaremos para buscar los registros
            data: "id=" + id + "&serie=" + serie+ "&sucursal=" + sucursal + "&empresa=" + empresa,

            success: function(datos){
                //decodificando el JSON proveniente de guias_buscar.php                        
                var jsonData = JSON.parse(datos);
                //recorriendo el array para extraer el detalle de las guias        
                for(i=0;i<jsonData.length;i++){
                //cargando en un array en una cadena con el formato de la tabla detalle        
                    cadena = "<tr>";
                    cadena = cadena + "<td><input name='codigo[]' class='input username' type='text' value='"+ jsonData[i].var_isbn_tit +"' size='15' OnFocus='this.blur()'/><input name='codigo_titulo[]' id='codigo_titulo[]' type='hidden' value='"+ jsonData[i].int_cod_tit +"'/></td>";
                    cadena = cadena + "<td><input name='nombre[]' class='input username' id='nombre[]' type='text' value='"+ jsonData[i].var_nom_tit +"' size='30' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><input name='precio[]' class='input username' type='text' value='"+ jsonData[i].dec_pvent_guia_det +"' size='30' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><input name='cantidad[]' class='input username' id='cantidad[]' type='text' value='"+ jsonData[i].int_cant_guia_det +"' size='30' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><input name='total[]' class='input username' id='total[]' type='text' value='"+ jsonData[i].dec_pvent_guia_det * jsonData[i].int_cant_guia_det +"' size='30' OnFocus='this.blur()'/></td>";
                    cadena = cadena + "<td><a class='elimina'><img src='delete.png' /></a></td>";
                    //agregando la cadena a la grilla
                    $("#grilla tbody").append(cadena);
                    //estableciendo el foco 
                    $("#valor_ide").focus();
                    //funcion eliminar permite activar la opcionde borrar los registros
                    fn_dar_eliminar();
                    //halla la cantidad de registros cargados a la grilla
                    fn_cantidad();
                    //realiza la suma total correspondiente al valor de los productos
                    fn_sumatotal();

                };
                //cargando la data correspondiente a la cabecera del producto        
                $('#sucursal option[value="'+jsonData[0].int_cod_suc+'"]').attr('selected', 'selected');
                $('#cliente option[value="'+jsonData[0].int_cod_cli+'"]').attr('selected', 'selected');
                $("#sucursal").prop('disabled', true);
                $('#vendedor option[value="'+jsonData[0].int_cod_usu+'"]').attr('selected', 'selected');
                //Estableiendo la fecha en el formato adecuado
                $("#datepicker").val(jsonData[0].date_fecenv_guia_cab);
                var dia=jsonData[0].date_fecenv_guia_cab.substring(8, 10);
                var mes=jsonData[0].date_fecenv_guia_cab.substring(5, 7);
                var año=jsonData[0].date_fecenv_guia_cab.substring(0, 4);
                $("#datepicker").val(dia+"-"+mes+"-"+año);

                $("#ruc").val(jsonData[0].var_ruc_cli);
                $("#direccion_compra").val(jsonData[0].var_dir_env_guia_cab);
                $("#punto_partida").val(jsonData[0].var_pun_part_guia_cab);
                $("#punto_llegada").val(jsonData[0].var_pun_lleg_guia_cab);
                $("#transporte_mn").val(jsonData[0].var_tran_marca_guia_cab);
                $("#transporte_c").val(jsonData[0].var_tran_constancia_guia_cab);
                $("#transporte_l").val(jsonData[0].var_tran_licencia_guia_cab);
                $("#transportista_rs").val(jsonData[0].var_trans_rs_guia_cab);
                $("#transportista_dir").val(jsonData[0].var_trans_dir_guia_cab);
                $("#transportista_ruc").val(jsonData[0].var_trans_ruc_guia_cab);
                $("#codigo_guia_cabecera").val(jsonData[0].var_cod_guia_cab);
                $("#codigo_pedido_cabecera").val(jsonData[0].var_cod_pedi_cab);
                $("#codigo_serie").val(jsonData[0].var_cod_ser);
                        
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
            distrito: {
                required: true
            },
            vendedor: {
                required: true
            },
            punto_partida: {
                required: true
            },
            punto_llegada: {
                required: true
            },
                            
                        
        },
        // Especificandolos mensaje
        messages: {
            sucursal: "*",
            fecha_registro: "*",
            cliente: "*",
            ruc: "*",
            vendedor: "*",
            punto_partida: {
                required: "*"
            },
            punto_llegada: {
                required: "*"
            },
        },
        submitHandler: function(form) {
            //capturando los input del formulario y asignandolos a variables
                        
            var codigo_guia_cabecera=$("#codigo_guia_cabecera").val();
            var codigo_pedido_cabecera=$("#codigo_pedido_cabecera").val();
            var codigo_serie=$("#codigo_serie").val();
            var cod_emp=1;
            var cod_suc = $("#sucursal").val();
            var cod_cli = $("#cliente").val();
            var fec_pedido=$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd ").val() + " 12:36:05";
            var ped_usu='JCASTILLO';
            //Variables Cabecera Guia
            var cod_ser='1';
            var dir_env=$("#direccion_compra").val();
            var pun_part=$("#punto_partida").val();
            var pun_lleg=$("#punto_llegada").val();
            var cod_usu=$("#vendedor").val();
            var dist_gui=$("#distrito_compra").val();
            var turn_gui=$("#turno").val();
            var telef_gui=$("#telefono").val();
            var tran_mn=$("#transporte_mn").val();
            var tran_c=$("#transporte_c").val();
            var tran_l=$("#transporte_l").val();
            var trans_rs=$("#transportista_rs").val();
            var trans_ruc=$("#transportista_ruc").val();
            var trans_dir=$("#transportista_dir").val();
            var pedido_detalle = "[";
                    //guardando el detalle en un array del tipo JSON
            for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 
                pedido_detalle = pedido_detalle + 
                '{"codigo_libro":' 
                + document.getElementById('grilla').rows[i].cells[0].childNodes[1].value + ", "
                + '"precio_libro":'
                + document.getElementById('grilla').rows[i].cells[2].childNodes[0].value + ", "                            
                + '"cantidad_libro":'
                + document.getElementById('grilla').rows[i].cells[3].childNodes[0].value + ", "
                + '"valor_impuesto":'
                + 0 + ", "
                + '"valor_descuento":'
                + 0 + ", "
                + '"porcentaje_impuesto":'
                + 0 + ", "
                + '"porcentaje_descuento":'
                + 0 + ", "
                + '"costo_total_libro":'
                + document.getElementById('grilla').rows[i].cells[4].childNodes[0].value + "}"

                if (i==document.getElementById('grilla').rows.length-2){
                    pedido_detalle = pedido_detalle + "]";
                }else{
                    pedido_detalle = pedido_detalle + ','; 
                }       
            } 

            if(pedido_detalle=="["){
                alert("Registre correctamente los campos as");
            } else {
                                        //Datos Cabecera Pedido
                var dataString= 'codigo_serie='+codigo_serie+
                                '&codigo_guia_cabecera='+codigo_guia_cabecera+
                                '&codigo_pedido_cabecera='+codigo_pedido_cabecera+
                                '&cod_emp='+cod_emp+
                                '&cod_suc='+cod_suc+
                                '&cod_cli='+cod_cli+
                                '&fec_pedido='+fec_pedido+
                                '&ped_usu='+ped_usu+
                                //Datos Cabecera Guia
                                '&cod_ser='+cod_ser+
                                '&dir_env='+dir_env+
                                '&pun_part='+pun_part+
                                '&pun_lleg='+pun_lleg+
                                '&cod_usu='+cod_usu+
                                '&dist_gui='+dist_gui+
                                '&turn_gui='+turn_gui+
                                '&telef_gui='+telef_gui+
                                '&tran_mn='+tran_mn+
                                '&tran_c='+tran_c+
								'&tran_l='+tran_l+
                                '&trans_rs='+trans_rs+
								'&trans_ruc='+trans_ruc+
								'&trans_dir='+trans_dir+
                                '&pedido_detalle='+pedido_detalle;
                //inicializamos el ajax que permitirá registrar      
                $.ajax({
                    type: "POST",
                    url: "insertar_datos.php",
                    data: dataString,
                    cache: false,
                          
                    success: function(result){
                        
                        var res = jQuery.parseJSON(result);
                        alert(res.mensaje);
                        /*busca el tipo de respuesta desde el archivo insertar_datos.php
                        si es 0 es debido a que es un registro nuevo, en caso sea 1
                        es un registro existente que se editó
                        */
                        
                        /*
                        if(res.tipo==0){
                            Abrir_ventana('../consulta/reporte_historial_1.php?id='+res.codigo);
                        };
                        */
                             
                        limpiarformulario("#form");
                        $("#condiciones").val("Transacción");   
                    },
                    error: function(result){
                        
                        alert("error");
                    }

                });
            }
            return false;   
        }
    });
                
    //metodo que permite mostrar ó ocultar los datos correspondientes a transporte 
    $("#transporte").click(function(evento){
                  
        if ($("#transporte").attr("checked")){
            
            $("#trans_dat").css("display", "block");

		}else{
            
            $("#trans_dat").css("display", "none");
        }
    });
    //metodo que permite mostrar ó ocultar los datos correspondientes a transporte          
    $("#transporte1").click(function(evento){
                  
        if ($("#transporte1").attr("checked")){
            
            $("#trans_dat1").css("display", "block");

        }else{
                  
            $("#trans_dat1").css("display", "none");
        }
    });
    //Busqueda de titulos segun el codgo de barra proporcionado en el evneto change
    $("#valor_ide").change(function() {
                    
        $.ajax({
            type: "GET",
            url: "titulos_buscar.php",
            data: "id=" + $("#valor_ide").val(),
                        
            success: function(datos){
                        
                var res = jQuery.parseJSON(datos);
                        
                if(res.nombre===""){
                            
                    alert("Título no registrado, proceda a agregarlo en el menú correspondiente");
                        
                }else{

                    $("#valor_uno").val(res.nombre);
                    $("#tituloID").val(res.codigo);
                    $("#valor_dos").val(res.precio);
                    $("#valor_cuatro").val(res.precio);
                    $("#valor_tres").focus();
                        
                    fn_dar_eliminar();
                    fn_cantidad(); 
                }
            },
            error: function(datos) {
                alert("Data not found");
            }
        });
    });
    // permite agregar de manera individual un titulo completando los campos
    $("#valor_tres").change(function() {
        cadena = "<tr>";
        cadena = cadena + "<td><input name='codigo[]' class='input username' type='text' value='"+ $("#valor_ide").val() +"' size='15' OnFocus='this.blur()'/><input name='codigo_titulo[]' id='codigo_titulo[]' type='hidden' value='"+ $("#tituloID").val() +"'/></td>";
        cadena = cadena + "<td><input name='nombre[]' class='input username' id='nombre[]' type='text' value='"+ $("#valor_uno").val() +"' size='30' OnFocus='this.blur()'/></td>";
        cadena = cadena + "<td><input name='precio[]' class='input username' type='text' value='"+ $("#valor_dos").val() +"' size='30' OnFocus='this.blur()'/></td>";
        cadena = cadena + "<td><input name='cantidad[]' class='input username' id='cantidad[]' type='text' value='"+ $("#valor_tres").val() +"' size='30' OnFocus='this.blur()'/></td>";
        cadena = cadena + "<td><input name='total[]' class='input username' id='total[]' type='text' value='"+ $("#valor_dos").val() * $("#valor_tres").val() +"' size='30' OnFocus='this.blur()'/></td>";
        cadena = cadena + "<td><a class='elimina'><img src='delete.png' /></a></td>";
        
        $("#grilla tbody").append(cadena);
        $('#frm_usu input[type="text"]').val('');
        $("#valor_ide").focus();
        fn_dar_eliminar();
		fn_cantidad();
        fn_sumatotal();
 
    });
    // en el caso de que cambie de sucursal ubique sus datos correspondientes   
    $( "#sucursal" ).change(function() {
                    
        $.ajax({
            type: "GET",
            url: "sucursal_buscar.php",
            data: "id=" + $("#sucursal").val(),
            
            success: function(datos){
                        
                var res = jQuery.parseJSON(datos);
                        
                $("#punto_partida").val(res.direccion_sucursal);
                        
            },
            error: function(datos) {

                alert("Data not founds");
                        
            }
        });
    });
    //en el caso seleccione una sucursal del destino ubicara sus datos correspondietnes
    $( "#cliente" ).change(function() {
                    
        $.ajax({
            type: "GET",
            url: "clientes_buscar.php",
            data: "id=" + $("#cliente").val(),
                        
            success: function(datos){
                        
                var res = jQuery.parseJSON(datos);
                       
                $("#ruc").val(res.ruc);
                $("#id").val(res.id);
                $("#punto_llegada").val(res.direccion + ' - '+ res.distrito);
                $("#distrito").val(res.distrito);
                $("#telefono").val(res.telefono);
                $("#referencia").val(res.referencia);
                $("#direccion_compra").focus();
                $('#ruc').prop('readonly', true);
            },
            
            error: function(datos) {
                
                alert("Data not founds");
            
            }
        });
    });				
});
//funcion que permite hallar la cantidad de registros cargados a la grilla
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
// funcion que permite sumar el valor total de los titulos
function fn_sumatotal(){
                    
    var total=0;
    for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 
                    
        total= total + parseFloat(document.getElementById('grilla').rows[i].cells[4].childNodes[0].value);
             
    }
    $("#suma_total").html(total); 
};			
// funcion que permite eliminar los titulos registrados en la grilla
function fn_dar_eliminar(){
                
    $("a.elimina").click(function(){
    
        id = $(this).parents("tr").find("td").eq(0).html();
        $(this).parents("tr").fadeOut("normal", function(){
                            
        $(this).remove();
        fn_cantidad(); 
        fn_sumatotal();
        })
    });
};
//funcion que permite limpiar el formulario            
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

function Abrir_ventana (pagina) {
    var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=525, top=15, left=140";
    window.open(pagina,"",opciones);
};
            
function notificacion(){
    alertify.log("No se puede registrar mas Títulos"); 
    return false;
}; 
//funcion que permite usar el metodo GET en archivo javascript
function $_GET(param){
/* Obtener la url completa */
    url = document.URL;
/* Buscar a partir del signo de interrogación ? */
    url = String(url.match(/\?+.+/));
/* limpiar la cadena quitándole el signo ? */
    url = url.replace("?", "");
/* Crear un array con parametro=valor */
    url = url.split("&");

    x = 0;
    while (x < url.length){

        p = url[x].split("=");

        if (p[0] == param){
            return decodeURIComponent(p[1]);
        }
    x++;
    }
};

