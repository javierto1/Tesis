$(function(){	

$(document).ready(function(){
	$("button[name='profile_form']").click(function(){
	

		if (document.customForm.a.selectedIndex==0){ 
      	$('#falta').html('<p class="alert alert-warning">Espere!!, debe seleccionar Cantidad.</p>') 
      	document.customForm.a.focus() 
      	return 0;
			}else if(document.customForm.b.selectedIndex==0){ 
      		$('#falta').html('<p class="alert alert-warning">Espere!!, debe seleccionar Modulo.</p>'); 
      		document.customForm.b.focus() 
      		return 0;
				}else if(document.customForm.c.selectedIndex==0){ 
      			$('#falta').html('<p class="alert alert-warning">Espere!!, debe seleccionar Soporte.</p>'); 
      			document.customForm.c.focus() 
      			return 0;      				
		}else if(document.customForm.d.selectedIndex>0){

		  $.ajax({
			  type:"POST",
			  url:"ver_pedido.php",			  
			  data: $('form').serialize(),
			  success:function(data){
				 $("#respuesta1").html(data);
				 $('#falta').html('<p class="alert alert-info">Generamos exitosamente su pedido, por favor confirme el mismo!</p>');	
				 $('#boton_siguiente').html('<a href="#messages" data-toggle="tab" class="btn-submit btn btn-success pull-left" role="tab">Siguiente<a/>');			 

	 	  }
				
		  });
		  }else{
			$('#falta').html('<p class="alert alert-warning">Espere!!, debe seleccionar Terminacion.</p>');
		}

	});
});

}); 

