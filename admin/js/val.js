function validar(){
			
	 		$.ajax({
				type: 'POST',
				data: $("#loguearse").serialize(),
				url: 'control.php',
				success: function(data){
					$('#mensaje').html('<p class="alert alert-info">Elemento eliminado Correctamente!</p>');
				}
			});
		
	};