$( document ).ready(function() {
var dt = $('#example').dataTable({
                 "processing": true,
                 "ajax": "mostrar_cabecera.php",
                 "aoColumns": [
                        { data: 'int_cod_tit' } ,
                        { data: 'var_nom_tit' } ,
                        { data: 'int_cant_guia_det' },
                ]
        })

    dt.makeEditable({
            sUpdateURL: "UpdateData.php"
        });
           dt.columnFilter();
});
