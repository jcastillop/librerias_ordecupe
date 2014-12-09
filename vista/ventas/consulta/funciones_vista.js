$(document).ready(function() {   
	
	var table = $('#example').DataTable( {
    	"ajax": "json.php",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
           { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "salary" }
        ],
        "order": [[1, 'asc']]
    } );
// Add event listener for opening and closing details

	$('#example ').on('click', 'tr', function () {
        
        var name = $('td', this).eq(1).text();
		var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
			
        }
    else {
            // Open this row 
		
           // var sucursal= $('td', this).eq(1).children('#cod_sucursal').val();
			
			
            row.child( format(row.data()) ).show('ds');
            tr.addClass('shown');
			
			
        }
    } );

} );