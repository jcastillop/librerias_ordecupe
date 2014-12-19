
$( document ).ready(function() {
$('#example').dataTable({
                 "processing": true,
                 "ajax": "detalle_compras_buscar.php",
                 "aoColumns": [
                        { data: 'int_cant_comp_det' } ,
                        { data: 'var_nom_tit' } ,
                        { data: 'var_autor_tit' },
                        { data: 'var_nom_edit' },
                        { data: 'var_rsoc_prov' },
                ]
        }).makeEditable({
            sUpdateURL: "UpdateData.php"
        });   
});
