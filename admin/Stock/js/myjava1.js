$(function(){

$(document).ready(function(){
	$("button[name='ver_mas']").click(function(){

		  var id_detalle=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"ver_mas_datos/ver_datos_completos_factura.php",
			  data:{'id_detalle': id_detalle},
			  success:function(data){
				 $("#respuesta1").html(data); 
			  }
		  });

	});
});

}); 
