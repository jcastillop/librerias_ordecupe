$(document).ready(function(){
    var empresa=1;
    var mes;
    var anho;
    var dt=$('#example').dataTable();
 
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            mes = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            anho = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(anho, mes, 1));
            mes=parseInt(mes)+1;
        },

    });




	$('#generar').click(function(){
        dt.fnClearTable();    
        dt.fnDestroy();
       
    
        dt = $('#example').dataTable({
                 "bProcessing" : false,
                 "bServerSide" : false,
                 "sAjaxSource": "cab_det_comp_buscar.php",
                  
                 fnServerParams : function(aoData) {
                        
                                aoData.push({
                                    "name" : "emp",
                                    "value" : empresa
                                });
                             
                                aoData.push({
                                    "name" : "mes",
                                    "value" : mes
                                });
                                aoData.push({
                                    "name" : "anho",
                                    "value" : anho
                                });
                                                      
                            },
                    
                 "aoColumns": [
                        { "mData": 'var_cod_comp_cab'} ,
                        { "mData": 'date_fec_emi_comp_cab'} ,
                        { "mData": 'date_fec_rec_comp_cab' } ,
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'int_nrodoc_prov'},
                        { "mData": 'var_rsoc_prov'},
                        { "mData": 'dec_val_comp_det'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
                        { "mData": 'vacio'},
            ]     
        });

    });

    $('#imprimir').click(function(){
         var periodo=$("#startDate").val();
        window.open('imprimir.php?empresa='+empresa+'&mes='+mes+'&anho='+anho+'&periodo='+periodo,'Impresion','height=640,width=800,left=300,padding=500');
    });
});