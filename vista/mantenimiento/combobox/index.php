
<?php
require_once("../../../conexiones/class_pais.php");
require_once("../../../conexiones/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Combos dependientes</title>
<script language="javascript" src="js/jquery-1.2.6.min.js"></script>
<script language="javascript">
$(document).ready(function(){
	// Parametros para e combo1


   $("#pais").change(function () {
   		$("#pais option:selected").each(function () {
			//alert($(this).val());
				elegido=$(this).val();			
				$.post("combo1.php", { elegido: elegido, }, function(data){
				$("#departamento").html(data);
				
			});			
        });
   })
   
     
   
   
	// Parametros para el combo2
	$("#departamento").change(function () {
   		$("#departamento option:selected").each(function () {
			//alert($(this).val());
				elegido2=$("#pais").val();
				elegido3=$("#departamento").val();
				$.post("combo2.php", { elegido2:elegido2, elegido3:elegido3  }, function(data){
				$("#provincia").html(data); 
			});			
        });
   })
});
</script>
</head>
<body>

         País:
        
          <select  name="pais" id="pais" class="input username" style="width: 160px;" onKeyPress="return tab(event,this)">
          <!--<option value="999">--Seleccione--</option>-->
          <option>--Seleccione--</option>
          <?php
			$tra=new pais();
			$reg=$tra->get_combo_pais();
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_pais"];?>"><?php echo $reg[$i]["var_nom_pais"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
            Departamento:
            <select name="departamento" id="departamento">	
            <option>--Seleccione--</option>
            </select>
            Provincia:
            <select name="provincia" id="provincia">
            <option>--Seleccione--</option>	
            </select>
           

</body>
</html>
