$(function(){
$("#Ingresar").on('click', function(){
	
		
		/*var buscar_proveedor = formu.elements["buscar_proveedor"];
		var numero = formu.elements["numero"];
		var tipo = $('#tipo').val();
		var bday = $('#bday').val();
		var material = $('#materiales').val();
		var tamano = $('#tamano').val();
		var precio = $('#precio').val();
		var lote = $('#lote').val();*/
		var password = $('#password').val();
		var username = $('#username').val();
				$.ajax({
				type: 'POST',
				data: "password="+passwrod+"username="+username"",
				url: 'control.php',
				success: function(data){
					$('#mensaje').html('<p class="alert alert-info">Grabados Correctamente! '$password'</p>');
				}
			});
		
			/*}
				
				}
				
					}
						
						}
							}

								}
									}*/
	});
});