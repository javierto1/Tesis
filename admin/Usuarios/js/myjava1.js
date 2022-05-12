$(function(){

$(document).ready(function(){
	$("button[name='ver_mas']").click(function(){

		var id=$(this).attr('id');
		var rol=$(this).attr('value');
		  $.ajax({
			  type:"GET",
			  url:"ver_mas_datos/ver_datos_completos_cliente.php",
			  //data:{'id': id},
			  data:'id='+id+'&rol='+rol,
			  success:function(data){
				 $("#respuestaCliente").html(data); 
			  }
		  });

	});
});


}); 
