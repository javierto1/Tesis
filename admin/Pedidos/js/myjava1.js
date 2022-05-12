$(function(){
	$(document).ready(function(){
	$("button[name='historico']").click(function(){

		  var id_pedido=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"historico/busca_historico.php",
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
			  url:"ver_mas_datos/ver_datos_completos_pedido.php",
			  data:{'id_pedido': id_pedido},
			  success:function(data){
				 $("#respuesta1").html(data); 
			  }
		  });

	});
});

$(document).ready(function(){
	$("button[name='cargar_senia']").click(function(){

		  var id_pedido=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"senia_pedidos/cargar_senia_pedidos.php",
			  data:{'id_pedido': id_pedido},
			  success:function(data){
				 $("#respuesta3").html(data); 
			  }
		  });

	});
});


$(document).ready(function(){
	$("button[name='ver_senia']").click(function(){

		  var id_pedido=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"senia_pedidos/ver_senia_pedidos.php",
			  data:{'id_pedido': id_pedido},
			  success:function(data){
				 $("#respuesta4").html(data); 
			  }
		  });

	});
});

}); 
