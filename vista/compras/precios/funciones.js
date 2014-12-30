
$( document ).ready(function() {

    var codigo_cabecera=$_GET("id");
    //capturamos la sucursal
    var sucursal=$_GET("sucursal");
    var empresa = 1;

var dt = $('#example').dataTable({
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
                        { "mData": 'var_autor_tit' },
                        { "mData": 'var_nom_edit' },
                        { "mData": 'var_rsoc_prov' },
                        { "mData": 'dec_val_comp_det' },
                        { "mData": 'punit' },
                        { "mData": 'precio' },
                        { "mData": 'por_mayor' },
                        { "mData": 'por_menor' },
                       
                ],
                /*
            "aoColumnDefs":[{
                "aTargets":[7],
                "defaultContent": "0"
            }],
            */
                fnRowCallback : function(nRow, aData, iDisplayIndex ){
                        $(nRow).attr("id",aData["int_cod_tit"]); // Change row ID attribute to match database row id
                        return nRow;
                    }
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
                null,
                { 
                    type:"text"
                    
                },
                { 
                    type:"text"
                    
                } ],
            
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
