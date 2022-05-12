$(document).ready(function(){
	$("button[name='mis_datos']").click(function(){

		  var id=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"php/ver_mis_datoss.php",
			  data:{'id': id},
			  success:function(data){
				 $("#respuesta_ver_mis_datos").html(data); 
			  }
		  });

	});
});

