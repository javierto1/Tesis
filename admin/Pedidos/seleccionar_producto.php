<?php
include ("../includes_admin/botonera_admin.php");

// include ("seguridad.php");
// if($rol !='0'){
// header("location: login_admin.php");
	// exit();
// }
include "../includes_admin/dbcon.php";  
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
												<td rowspan="11"> <h3><b>Seleccione el producto: </b></h3></td>
												<?php
											$rol=(int) $_GET['rol'];
											
											$query = "select * from producto"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											echo ' 
												<td> 
												<a href="cotizacion_producto.php?id_producto='.$registro[id_producto].'" type="button" class="btn btn-outline btn-primary">'.$registro['denominacion'].'</a>
												</td>
												<td> 
												<a href="#" id="popover" rel="popover" data-content="" title="Tarjeta Persona 9x5" type="button" class="btn btn-default btn-xs">Vista Previa</a>
												
											
												</td>
											</tr>
											 
										'; } ?>
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
			var image = '<img src="../../images/card.png">';
			$('#popover').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../../images/card.png">';
			$('#popover1').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../../images/card.png">';
			$('#popover2').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../../images/card.png">';
			$('#popover3').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../../images/card.png">';
			$('#popover4').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../../images/card.png">';
			$('#popover5').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../../images/card.png">';
			$('#popover6').popover({placement: 'bottom', content: image, html: true});
		});
		
		$(document).ready(function(){
			var image = '<img src="../../images/card.png">';
			$('#popover7').popover({placement: 'bottom', content: image, html: true});
		});
		
	
	</script>
	<!--------ACA EMPIEZAN LOS JS LOCALES--------->
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>