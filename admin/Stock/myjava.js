$(function(){
$("#cargarStock").on('click', function(){
	
		
		/*var buscar_proveedor = formu.elements["buscar_proveedor"];
		var numero = formu.elements["numero"];
		var tipo = $('#tipo').val();
		var bday = $('#bday').val();
		var material = $('#materiales').val();
		var tamano = $('#tamano').val();
		var precio = $('#precio').val();
		var lote = $('#lote').val();
		var cantidad = $('#cantidad').val();*/
			
		if (document.formulario.buscar_proveedor.value.length==0){ 
      	$('#mensaje').html('<p class="alert alert-warning">Espere!!, debe ingresar un CUIT o CUIL.</p>') 
      	document.formulario.buscar_proveedor.focus() 
      	return 0;
			}else if(document.formulario.numero.value.length==0){ 
      		$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar un numero de FACTURA.</p>'); 
      		document.formulario.numero.focus() 
      		return 0;
				}else if(document.formulario.tipo.selectedIndex==0){ 
      			$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar un TIPO de FACTURA.</p>'); 
      			document.formulario.tipo.focus() 
      			return 0;
      				}else if(document.formulario.bday.value.length==0){ 
      				$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar una FECHA.</p>'); 
      				document.formulario.bday.focus() 
      				return 0;}
      					else if(document.formulario.cantidad.value.length==0){ 
      					$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar una CANTIDAD.</p>'); 
      					document.formulario.cantidad.focus() 
      					return 0;
      						}else if(document.formulario.materiales.selectedIndex==0){ 
      						$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar un material.</p>'); 
      						document.formulario.materiales.focus() 
      						return 0;
      							}else if(document.formulario.tamano.selectedIndex==0){ 
						      		$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar un TAMAÑO.</p>'); 
						      		document.formulario.tamano.focus() 
						      		return 0;
						      			}else if(document.formulario.precio.value.length==0){ 
      									$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar un PRECIO.</p>'); 
      										document.formulario.precio.focus() 
      											return 0;
      										}else if(document.formulario.lote.value.length>0){  
			$.ajax({
				type: 'POST',
				data: $("#formulario").serialize(),
				url: 'grabar_stock.php',
				success: function(data){
					$('#cantidad').val('').focus();
					$('#tamano').val('0');
					$('#precio').val('');
					$('#lote').val('');
					$('#materiales').val('0');
					$('#contenidoRegistro').html(data);
					$('#mensaje').html('<p class="alert alert-info">Grabados Correctamente!</p>');
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, Debe ingresar un LOTE.</p>');
		}
			/*}
				
				}
				
					}
						
						}
							}

								}
									}*/
	});
});
