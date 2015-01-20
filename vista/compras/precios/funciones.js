
$( document ).ready(function() {
  
    var codigo_cabecera=$_GET("id");
    //capturamos la sucursal
    var sucursal=$_GET("sucursal");
    var empresa = 1;
    var dt;
    dt = $('#example').dataTable({
                 "bProcessing" : false,
                 "bServerSide" : false,
                 "sAjaxSource": "detalle_compras_buscar.php",
                 fnServerParams : function(aoData) {
                         
                                aoData.push({
                                    "name" : "emp",
                                    "value" : empresa
                                });
                              
                                aoData.push({
                                    "name" : "suc",
                                    "value" : sucursal
                                });
                                aoData.push({
                                    "name" : "cab",
                                    "value" : codigo_cabecera
                                });
                            },
                 "aoColumns": [
                        { "mData": 'int_cod_tit', "bVisible":false } ,
                        { "mData": 'int_cant_comp_det'} ,
                        { "mData": 'var_nom_tit' } ,
                        { "mData": 'var_autor_tit', "bVisible":false },
                        { "mData": 'var_nom_edit', "bVisible":false },
                        { "mData": 'var_rsoc_prov', "bVisible":false },
                        { "mData": 'dec_val_comp_det' },
                        { "mData": 'punit'},
                        { "mData": 'precio' },
                        { "mData": 'sug_por_mayor' },
                        { "mData": 'sug_por_menor' },
                        { "mData": 'def_por_mayor' },
                        { "mData": 'def_por_menor' },
                       
                ],
                /*
            "aoColumnDefs":[{
                "aTargets":[7],
                "defaultContent": "0"
             }],*/
            
                fnRowCallback : function(nRow, aData, iDisplayIndex ){
                        $(nRow).attr("id",aData["int_cod_tit"]); // Change row ID attribute to match database row id
                        return nRow;
                    }/*,
            
                fnDrawCallback: function(oSettings){
                    
                    setTimeout( function () {
                    dt.fnGetColumnData();
                    }, 0 );
                }      */              
        });

    dt.makeEditable({
        sUpdateURL: "insertar_datos.php",
            aoColumns:[
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {   
                    indicator: 'Saving platforms...',
                    tooltip: 'Click to edit platforms',  
                    type:'text'
                                     
                },
                { 
                    type:"text"
                    
                },
                ],
            
            fnOnEditing: function(input)
                {   
                    $("#trace").append("Updating cell with value " + input.val());
                    return true;
                },
                        fnOnEdited: function(status)
                {   
                    $("#trace").append("Edit action finished. Status - " + status);
                },
        });
    /*
           dt.columnFilter({

            aoColumns:[
            
                    { sSelector: "#int_cant_comp_det", type:"number-range"  },
                    { sSelector: "#var_nom_tit" },
                    { sSelector: "#var_autor_tit" },
                    { sSelector: "#var_nom_edit", type:"select" },
                    { sSelector: "#var_rsoc_prov", type:"select"}
                    { sSelector: "#var_rsoc_prov", type:"select", values : ["A", "B", "C"] }
                    
                    null,
                    { type:"text" },
                    { type:"text" },
                    { type:"text" },
                    { type:"text" }
                                    ]
            });
            */

    var table = $('#example').DataTable();

    $('#example tbody').on( 'mouseover', 'td', function () {

        $(table.column(11).nodes()).addClass('highlight');
        $(table.column(12).nodes()).addClass('highlight');
     
    });
    $('#cancelar').click(function(){
       
       dt.fnClearTable();    
       dt.fnDestroy();
       dt = $('#example').dataTable({
                 "bProcessing" : false,
                 "bServerSide" : false,
                 "sAjaxSource": "detalle_compras_buscar.php",
                 fnServerParams : function(aoData) {
                         
                                aoData.push({
                                    "name" : "emp",
                                    "value" : empresa
                                });
                              
                                aoData.push({
                                    "name" : "suc",
                                    "value" : sucursal
                                });
                                aoData.push({
                                    "name" : "cab",
                                    "value" : codigo_cabecera
                                });
                            },
                 "aoColumns": [
                        { "mData": 'int_cod_tit', "bVisible":false } ,
                        { "mData": 'int_cant_comp_det'} ,
                        { "mData": 'var_nom_tit' } ,
                        { "mData": 'var_autor_tit', "bVisible":false },
                        { "mData": 'var_nom_edit', "bVisible":false },
                        { "mData": 'var_rsoc_prov', "bVisible":false },
                        { "mData": 'dec_val_comp_det' },
                        { "mData": 'punit'},
                        { "mData": 'precio' },
                        { "mData": 'sug_por_mayor' },
                        { "mData": 'sug_por_menor' },
                        { "mData": 'def_por_mayor' },
                        { "mData": 'def_por_menor' },
                       
                ],
                /*
            "aoColumnDefs":[{
                "aTargets":[7],
                "defaultContent": "0"
             }],*/
            
                fnRowCallback : function(nRow, aData, iDisplayIndex ){
                        $(nRow).attr("id",aData["int_cod_tit"]); // Change row ID attribute to match database row id
                        return nRow;
                    }/*,
            
                fnDrawCallback: function(oSettings){
                    
                    setTimeout( function () {
                    dt.fnGetColumnData();
                    }, 0 );
                }      */              
        });

    dt.makeEditable({
        sUpdateURL: "insertar_datos.php",
            aoColumns:[
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {   
                    indicator: 'Saving platforms...',
                    tooltip: 'Click to edit platforms',  
                    type:'text'
                                     
                },
                { 
                    type:"text"
                    
                },
                ],
            
            fnOnEditing: function(input)
                {   
                    $("#trace").append("Updating cell with value " + input.val());
                    return true;
                },
                        fnOnEdited: function(status)
                {   
                    $("#trace").append("Edit action finished. Status - " + status);
                },
        });
    });
$('#guardar').click(function(){
     $('#content').html('<div><img src="loading.gif"/></div>');
 });
 $('#aplicar').click(function(){
     $('#content').html('<div><img src="loading.gif"/></div>');
    /*
    alert("porcentaje mayor: "+$("#pmayor").val());
    alert("porcentaje pmenor: "+$("#pmenor").val());
    alert("porcentaje: "+$("#porcentaje:checked").val());
    alert("vacios: "+$("#vacios:checked").val());
    */
    //imagen cargando
    //$('#content').html('<div><img src="loading.gif"/></div>');

     var tabla = $('#example').DataTable();
      
     var a_precio_sug_may = []; 
     var a_precio_sug_men = []; 
     var a_precio_def_may = []; 
     var a_precio_def_men = [];
     var p_mayor = [];
     var p_menor = [];
     var boolean_porcentaje = [];
     var boolean_vacios = []; 
 
       
        for(var i=0;i<tabla.column(0).data().length;i++)
        {
            
            a_precio_sug_may.push({ posicion: i, monto: tabla.column(9).data()[i] });
            a_precio_sug_men.push({ posicion: i, monto: tabla.column(10).data()[i] });
            a_precio_def_may.push({ posicion: i, monto: tabla.column(11).data()[i] });
            a_precio_def_men.push({ posicion: i, monto: tabla.column(12).data()[i] });
        }

/*
     var cells = [];
        var rows = $("#example").dataTable().fnGetNodes();
        for(var i=0;i<rows.length;i++)
        {
            // Get HTML of 3rd column (for example)
            cells.push($(rows[i]).find("td:eq(2)").html()); 
        }

*/
   
      $.ajax({
        url: "operaciones.php",
        type: "POST",
        cache: false,
        dataType: "json",
        data: {
            p_mayor:$("#pmayor").val(),
            p_menor:$("#pmenor").val(),
            boolean_porcentaje:$("#porcentaje:checked").val(),
            boolean_vacios:$("#vacios:checked").val(),
            a_precio_sug_may:JSON.stringify(a_precio_sug_may),
            a_precio_sug_men:JSON.stringify(a_precio_sug_men),
            a_precio_def_may:JSON.stringify(a_precio_def_may),
            a_precio_def_men:JSON.stringify(a_precio_def_men)
        },

        success: function(result) {
  
            //alert(JSON.stringify(result));
          
        
            for(i=0;i<result.mayor.length;i++){
                dt.fnUpdate(result.mayor[i].monto, i, 11);
                dt.fnUpdate(result.menor[i].monto, i, 12);     
            }      
             $('#content').hide();  
        },
        error: function(result){
                      
            alert("error");
        }

      });
      
      /*
    
    for(i=0;i<array_precio_def_por_mayor.length;i++){

        if(!array_precio_def_por_mayor[i]){
            dt.fnUpdate(array_precio_sug_por_mayor[i], i, 11);
        };

        if(!array_precio_def_por_menor[i]){
            dt.fnUpdate(array_precio_sug_por_menor[i], i, 12);
        };    

    }; 
    //$('#content').fadeIn(1000).html();
     dt.ajax.reload(); 
    */      
    });



});
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

