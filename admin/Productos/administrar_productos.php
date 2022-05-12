<?php
include ("includes_admin/botonera_admin.php");

// include ("seguridad.php");
// if($rol !='0'){
// header("location: login_admin.php");
	// exit();
// }

?>
<div id="page-wrapper">
	<div class="col-lg-12">
                    <h1 class="page-header">Productos</h1>
 
	<div class="panel panel-default">
							
							
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
											<tr>
												<td rowspan="4"> <h3><b>Tarjetas: </b></h3></td>
												<td> <i>Tarjetas Personales 9x5</i></td><td> <button id="popover" rel="popover" data-content="" title="Tarjeta Persona 9x5" type="button" class="btn btn-default btn-xs">Vista Previa</button></td>
												
											</tr>
											<tr>
												<td> <i>Tarjetas Personales 5x5</i></td><td> <button id="popover1" rel="popover1" data-content="" title="Tarjeta Persona 5x5" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Tarjetas Personales 5x9</i></td><td> <button id="popover2" rel="popover" data-content="" title="Tarjeta Persona 5x9" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Hoja A4 Membretada</i></td><td> <button id="popover3" rel="popover" data-content="" title="Hoja A4 Membretada" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											
											<tr>
												<td rowspan="4"> <h3><b>Gráfica Publicitaria:</b> </h3></td>
												<td> <i>Imanes 6 x 4 cm</i></td> <td> <button id="popover4" rel="popover" data-content="" title="Imanes 6 x 4 cm" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Imanes 7 x 5 cm</i></td> <td> <button id="popover5" rel="popover" data-content="" title="Imanes 7 x 5 cm" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Volantes 9 x 20 cm</i></td> <td> <button id="popover6" rel="popover" data-content="" title="Volantes 9 x 20 cm" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Volantes 22 x 20 cm</i></td> <td> <button id="popover7" rel="popover" data-content="" title="Volantes 22 x 20 cm" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											
											<tr>
												<td rowspan="4"> <h3><b>Editorial: </b></h3></td>
												<td> <i>Revista A5 - 8 Paginas</i></a></td> <td> <button id="popover" rel="popover" data-content="" title="Revista A5 - 8 Paginas" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Revista A5 - 12 Paginas</i></td> <td> <button id="popover" rel="popover" data-content="" title="Revista A5 - 12 Paginas" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Revista A5 - 16 Paginas</i></td> <td> <button id="popover" rel="popover" data-content="" title="Revista A5 - 16 Paginas" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
											<tr>
												<td> <i>Revista A4 - 16 Paginas</i></td> <td> <button id="popover" rel="popover" data-content="" title="Revista A4 - 16 Paginas" type="button" class="btn btn-default btn-xs">Vista Previa</button></td></td>
											</tr>
										
										</tbody>
									</table>
								</div>
                            <!-- /.table-responsive -->
							</div>
                        
						</div>
						

        </div>

    


</div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc2/js/bootstrap.min.js"></script>
	
	<script>
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover1').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover2').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover3').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover4').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover5').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover6').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../images/card.png">';
			$('#popover7').popover({placement: 'bottom', content: image, html: true});
		});
		
	
	</script>
	<!--------ACA EMPIEZAN LOS JS LOCALES--------->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>