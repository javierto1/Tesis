$(document).ready(pagination(1));
$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var rol = $('#bd-rol').val();
		var url = '../reportes/reportes/php/clientes/busca_cliente_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta+'&rol='+rol,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var rol = $('#bd-rol').val();
		var url = '../reportes/reportes/php/clientes/busca_cliente_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta+'&rol='+rol,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../reportes/reportes/php/clientes/busca_cliente.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});


function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var rol = $('#bd-rol').val();
	window.open('../reportes/reportes/php/clientes/clientes_pdf.php?desde='+desde+'&hasta='+hasta+'&rol='+rol);
}

function pagination(partida){
	var rol = $('#bd-rol').val();
	var url = '../reportes/reportes/php/clientes/paginarClientes.php';
	$.ajax({ 
		type:'POST',
		url:url,
		data:'partida='+partida+'&rol='+rol,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}

//HASTA ACA CLIENTES


