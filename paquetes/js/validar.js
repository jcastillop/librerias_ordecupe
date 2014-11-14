// JavaScript Document


   function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
	
	
	
	
	  function  efecto(){
                             $('#fotocargando').hide();
                             $('#cargar_contenido').fadeIn(1500);
        }
	
 
function tab(ev,obj) {
		var keyCode = document.layers ? ev.which : document.all ? event.keyCode : document.getElementById ? ev.keyCode : 0;
		if (keyCode !=13) return;
		frm = obj.form;
		for(i = 0; i < frm.elements.length; i++) 
			if (frm.elements[i] == obj) { 
			if (i == frm.elements.length-1) i =-1;
			break 
			}
		frm.elements[i+1].focus();
		return false;
	}

	function decimal(evt) {
		var keyPressed = (evt.which) ? evt.which : event.keyCode
		return !((keyPressed !=13) && (keyPressed != 46) && (keyPressed < 48 || keyPressed > 57));
		
	}
	
	function validar(e) { // 1

    tecla = (document.all) ? e.keyCode : e.which; // 2

    if (tecla==8) return true; // 3

    patron =/[A-Ñ-Za-ñ-z\s]/; // 4

    te = String.fromCharCode(tecla); // 5

    return patron.test(te); // 6

} 
