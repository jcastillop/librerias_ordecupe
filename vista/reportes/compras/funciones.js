$(document).ready(function(){
	// Parametros para e combo1


   $("#empresa").change(function () {
   		$("#empresa option:selected").each(function () {

				elegido=$(this).val();			
				$.post("combobox/combo1.php", { elegido: elegido, }, function(data){
				$("#sucursal").html(data);
				
			});			
        });
   })

	




		 $(function() {
	 $( "#fec1" ).datepicker({dateFormat: 'dd-mm-yy',numberOfMonths: 1,changeMonth: true,
changeYear: true,monthNames: ['Enero', 'Febrero', 'Marzo',
'Abril', 'Mayo', 'Junio',
'Julio', 'Agosto', 'Septiembre',
'Octubre', 'Noviembre', 'Diciembre'],
dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']});
$("#cliente").focus();
  });
  
  		 $(function() {
	 $( "#fec2" ).datepicker({dateFormat: 'dd-mm-yy',numberOfMonths: 1,changeMonth: true,
changeYear: true,monthNames: ['Enero', 'Febrero', 'Marzo',
'Abril', 'Mayo', 'Junio',
'Julio', 'Agosto', 'Septiembre',
'Octubre', 'Noviembre', 'Diciembre'],
dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']});
$("#cliente").focus();
  });
  
  
  
    });
	
	
	







	

  /*   



$().ready(function() {
	$("#cliente").autocomplete("busquedas/autoCompleteMain.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#cliente").result(function(event, data, formatted) {
		$("#id_cliente").val(data[1]);
		$("#monto_deuda").val(data[2]);
		$("#fecha_deuda").val(data[3]);
	
		$("#rsocial").focus();
		
		
		elegido=$("#id_cliente").val();
				$.post("combobox/combo1.php", { elegido: elegido }, function(data){
				$("#rsocial").html(data);
				//alert(data);
				$("#combo3").html("");
				
		});	
		
		
				elegido_prov=$("#proveedor").val();
				$.post("combobox/combo_prov.php", { elegido_prov: elegido_prov }, function(data){
				$("#proveedor").html(data);
				$("#proveedor_p").html(data);
				//alert(data);
				
				
		});	
		
		
	
	});
});





         relacion cliente - rsocial                          

$(document).ready(function(){
	// Parametros para e combo1   
   
    $("#rsocial").focus(function () {
   		$("#rsocial").focus(function () {
			//alert($(this).val());
				elegido=$("#id_cliente").val();
				$.post("combobox/combo1.php", { elegido: elegido }, function(data){
				$("#rsocial").html(data);
				//alert(data);
				$("#combo3").html("");
			});			
        });
   })
   
   
   
	// Parametros para el combo2
	$("#combo2").change(function () {
   		$("#combo2 option:selected").each(function () {
			//alert($(this).val());
				elegido=$("#id_cliente").val();
				$.post("combo2.php", { elegido: elegido }, function(data){
				$("#combo3").html(data);
			});			
        });
   })
});
 */  




 
	
