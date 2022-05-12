<!DOCTYPE html>
<html lang="en">
<?php 
include "../admin/includes_admin/dbcon.php"; 
include "../admin/includes_admin/fecha_acomodada.php";
include ("../admin/seguridad.php");	
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cliente - Gráfica "No Convencional"</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Timeline CSS -->
    <link href="css/mis_mensajes.css" rel="stylesheet">
	
	
	
	<script src="js/jquery.js"></script>
	<script>
	 $(document).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
 });
	
	</script>
</head>

<body>



<!-- Page Content -->
<div class="container">
	<?php include ("includes_cliente/botonera_cliente.php"); ?>
		<div class="row">
				<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<p class="lead">Su Bandeja<b> de Mensajes</b>:</p><hr>
					</div>
		</div>

						
		
<div class="row">
			<div class="col-lg-1"></div>
						
								<div class="panel-body col-lg-10 thumbnail" id="Layer1" style="width:975px; height:350px; overflow-y: scroll; overflow-x: scroll;">
										<ul class="chat">
											
											<?php
											
											//$emisor=(int) $_GET['emisor']; EL emisor se saca de la session!!!!
											$emisor=$_SESSION['usuario'];
											//$receptor=(int) $_GET['receptor'];
											//$receptor=58;
											
											$query = "	SELECT 	 m.id_mensaje, m.emisor, m.receptor, m.asunto, m.mensaje, m.fecha_mensaje, m.estado,
																 dp.id, dp.apellido, dp.nombre, dp.username, dp.telefono
																 
														
														FROM 	mensajeria m,
																datos_personales dp
														
														WHERE	m.emisor = dp.id
														
														ORDER BY fecha_mensaje DESC";
											
											
											$result = mysql_query($query); 
		
											while ($registro = mysql_fetch_array($result)){ 
											
											$receptor=$registro['receptor'];
											
											
											if ($emisor==$registro['receptor']) {
											echo '					
											<li class="left clearfix">
												<span class="chat-img pull-left">
													<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
												</span>
												<div class="chat-body clearfix">
													<div class="header">
														<small class="pull-right text-muted">
															<span class="glyphicon glyphicon-time text-danger"></span>
															<font color="red">'.fecha_horaNormal($registro['fecha_mensaje']).'</font>
														</small>
														<strong class="primary-font">'.$registro['username'].'</strong><br>
														<strong class="primary-font">Asunto: '.$registro['asunto'].'</strong><br>
													</div>
													<p>
														Mensaje: '.$registro['mensaje'].'.
													</p>
												</div>
											</li>';}
											
											if ($emisor==$registro['emisor']) {
											
											echo '
											<li class="left clearfix">
												<span class="chat-img pull-left">
													<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
												</span>
												<div class="chat-body clearfix">
													<div class="header">
														<small class="pull-right text-muted">
															<span class="glyphicon glyphicon-time"></span>
															<span>'.fecha_horaNormal($registro['fecha_mensaje']).'</span>
														</small>
														<strong class="primary-font">'.$registro['username'].'</strong><br>
														<strong class="primary-font">Asunto: '.$registro['asunto'].'</strong><br>
													</div>
													<p>
														Mensaje: '.$registro['mensaje'].'.
													</p>
												</div>
											</li>
											
											';}} ?>
											
										</ul>
								<div class="caption">
									<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModalNuevoMensaje" >NUEVO MENSAJE <i class="fa fa-comments" aria-hidden="true"></i></a>
								</div>
								</div>
							<div class="col-lg-1"></div>
						
</div>							
							
<div class="row"><div class="col-lg-1"></div><div class="col-lg-10"><hr></div></div>	

	<!-- Modal -->
	<div id="myModalNuevoMensaje" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<form action="Mensajes/responder_mensaje_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Escribir nuevo mensaje:</h3>
			  </div>
			  <div class="modal-body"> 
					<form> 
						
							DE:<input class="form-control" placeHolder="Cliente" name="emisor"  type="text" disabled/>
								<input type="hidden" name="emisor" value="<?=$emisor;?>" />
								
							PARA:<input class="form-control" placeHolder="Operador" name="receptor"  type="text" disabled/>
									<input type="hidden" name="receptor" value="<?=$receptor;?>" />
						
							ASUNTO:<input class="form-control" name="asunto" value="" type="text" required/>
						
						
							MENSAJE:<textarea class="form-control" name="mensaje" value="" rows="3" id="textArea" required></textarea>
						
					</form>
			  </div>
			  <div class="modal-footer">
				<button type="submit" class="btn btn-success pull-right" href="Mensajes/responder_mensaje_enviado.php">ENVIAR</button>
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">CANCELAR</button>
			  </div>
			</div>
		</form>

	  </div>
	</div>




</div><!-- FIN CONTAINER -->	
    <!-- /.container -->

	

	
	<?php include ("includes_cliente/footer_cliente.php"); ?>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>