$(document).ready(function(){
    var empresa=1;
    var sucursal=1;
    var anho;
    var dt=$('#example').dataTable();
 

	$('#generar').click(function(){
        dt.fnClearTable();    
        dt.fnDestroy();
       
    
        dt = $('#example').dataTable({
                 "bProcessing" : false,
                 "bServerSide" : false,
                 "sAjaxSource": "stock_buscar.php",
                  
                 fnServerParams : function(aoData) {
                        
                                aoData.push({
                                    "name" : "emp",
                                    "value" : empresa
                                });
                             
                                aoData.push({
                                    "name" : "suc",
                                    "value" : sucursal
                                });
                                                                 
                            },
                    
                 "aoColumns": [
                        { "mData": 'var_nom_tit'} ,
                        { "mData": 'var_nom_edit'} ,
                        { "mData": 'var_autor_tit' } ,
                        { "mData": 'int_cant_stk'},
                        { "mData": 'fec_actualizacion' },
            ]     
        });

    });

    $('#imprimir').click(function(){
         var periodo=$("#startDate").val();
        window.open('imprimir.php?empresa='+empresa+'&sucursal='+sucursal,'Impresion','height=640,width=800,left=300,padding=500');
    });
});