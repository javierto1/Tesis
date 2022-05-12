$(function(){
	$(document).ready(function(){
	$("button[name='historico']").click(function(){

		  var id_pedido=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"php/busca_historico.php",
			  data:{'id_pedido': id_pedido},
			  success:function(data){
				 $("#respuesta").html(data); 
			  }
		  });

	});
});

$(document).ready(function(){
	$("button[name='ver_mas']").click(function(){

		  var id_pedido=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"php/ver_datos_completos_pedido.php",
			  data:{'id_pedido': id_pedido},
			  success:function(data){
				 $("#respuesta1").html(data); 
			  }
		  });

	});
});


}); 
