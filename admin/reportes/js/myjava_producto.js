//EMPIEZA PEDIDOS

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	
	window.open('../reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta);
}
