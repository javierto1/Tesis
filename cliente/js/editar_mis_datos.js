$(document).ready(function(){
	$("button[name='editar']").click(function(){

		  var id=$(this).attr('value');

		  $.ajax({
			  type:"GET",
			  url:"edit.php",
			  data:{'id': id},
			  success:function(data){
				 $("#respuesta1").html(data); 
			  }
		  });

	});
});

