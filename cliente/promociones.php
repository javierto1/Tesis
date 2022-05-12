<!DOCTYPE html>
<html lang="en">
<?php
include "includes_cliente/dbcon.php";
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
	
	<!-- Custom CSS -->
    <link href="css/mis_pedidos.css" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link href="css/promociones.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">    
	
	<!-- Custom CSS -->
    <link href="css/productos_index.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<script src="../js/jquery.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
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
	
	
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <!-- Page Content -->
    <div class="container">
	<?php include ("includes_cliente/botonera_cliente.php"); ?>
		
		
		
		
		 <!-- BOTONERA-->
		
		
		
		 <!-- FIN BOTONERA-->
		
		<div class="row">
			<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<p class="lead">Encuentre <b>SU promocion:</b></p><hr>
				</div>
		</div>
		
		
		
		<!--  COMIENZA PRODUCTOS  -->
		<div class="container">
				<div class="col-lg-1"></div>
				
					<div class="col-lg-10" align="center">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#todos" data-toggle="tab" aria-expanded="true">TODOS </a></li>
						  <li class=""><a href="#cartas" data-toggle="tab" aria-expanded="false">CARTAS <span class="label label-danger">1</span></a></li>
						  <li class=""><a href="#individuales" data-toggle="tab" aria-expanded="false">INDIVIDUALES <span class="label label-danger">1</span></a></li>
						  <li class=""><a href="#monedas" data-toggle="tab" aria-expanded="false">MONEDAS <span class="label label-danger">1</span></a></li>
						</ul>
						<div class="col-lg-12" align="center"><br></div>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="todos">
									
									<!-- TH2 -->
									<div class="col-sm-4 col-lg-4 col-md-4">
										<div class="thumbnail">
											<div class="caption">
												<div class="offer offer-danger">
													<div class="shape">
														<div class="shape-text">
														SALE!								
														</div>
													</div>
													<div class="offer-content">
														<h4 class="pull-right text-danger"><b>$24.99</b></h4>
														<h4><b>CARTAS PERS.</b></h4>
														<p class="text-warning">See more snippets like this online store item atSee more snippets like this online store.</p>
														<a href="mi_pedido.php" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" >VER MÁS!</a>
													</div>
													<hr>
												</div>
											</div>
											
											<img src="images/cartas.jpg" alt="..." class="">
											
											<b>CARTAS PRESENTACION</b>
										   
										</div>
									</div>

									<!-- TH2 -->
									<div class="col-sm-4 col-lg-4 col-md-4">
										<div class="thumbnail">
										  
											<div class="caption">
												<div class="offer offer-danger">
													<div class="shape">
														<div class="shape-text">
														SALE!								
														</div>
													</div>
													<div class="offer-content">
														<h4 class="pull-right text-danger"><b>$24.99</b></h4>
														<h4><b>INDIVIDUALES</b></h4>
														<p class="text-warning">See more snippets like this online store item atSee more snippets like this online store.</p>
														<a href="mi_pedido.php" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" >VER MÁS!</a>
													</div>
													<hr>
												</div>
											</div>
											
											<img src="images/individuales.jpg" alt="..." class="">
											
											<b>INDIVIDUALES</b>
										   
										</div>
									</div>

									<!-- TH2 -->
									<div class="col-sm-4 col-lg-4 col-md-4">
										<div class="thumbnail">
										 
											<div class="caption">
												<div class="offer offer-danger">
													<div class="shape">
														<div class="shape-text">
														SALE!								
														</div>
													</div>
													<div class="offer-content">
														<h4 class="pull-right text-danger"><b>$24.99</b></h4>
														<h4><b>MONEDAS</b></h4>
														<p class="text-warning">See more snippets like this online store item atSee more snippets like this online store.</p>
														<a href="mi_pedido.php" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" >VER MÁS!</a>
													</div>
													<hr>
												</div>
											</div>
											
											<img src="images/monedas.jpg" alt="..." class="">
											
											<b>MONEDAS</b>
										   
										</div>
									</div>
							</div>
							<div class="tab-pane fade" id="cartas">
							<!-- TH2 -->
									<div class="col-sm-4 col-lg-4 col-md-4">
										<div class="thumbnail">
											<div class="caption">
												<div class="offer offer-danger">
													<div class="shape">
														<div class="shape-text">
														SALE!								
														</div>
													</div>
													<div class="offer-content">
														<h4 class="pull-right text-danger"><b>$24.99</b></h4>
														<h4><b>CARTAS PERS.</b></h4>
														<p class="text-warning">See more snippets like this online store item atSee more snippets like this online store.</p>
														<a href="mi_pedido.php" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" >VER MÁS!</a>
													</div>
													<hr>
												</div>
											</div>
											
											<img src="images/cartas.jpg" alt="..." class="">
											
											<b>CARTAS PRESENTACION</b>
										</div>
									</div>
							</div>
							<div class="tab-pane fade" id="individuales">
							
									<!-- TH2 -->
									<div class="col-sm-4 col-lg-4 col-md-4">
										<div class="thumbnail">
										  
											<div class="caption">
												<div class="offer offer-danger">
													<div class="shape">
														<div class="shape-text">
														SALE!								
														</div>
													</div>
													<div class="offer-content">
														<h4 class="pull-right text-danger"><b>$24.99</b></h4>
														<h4><b>INDIVIDUALES</b></h4>
														<p class="text-warning">See more snippets like this online store item atSee more snippets like this online store.</p>
														<a href="mi_pedido.php" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" >VER MÁS!</a>
													</div>
													<hr>
												</div>
											</div>
											
											<img src="images/individuales.jpg" alt="..." class="">
											
											<b>INDIVIDUALES</b>
										  
										</div>
									</div>
							</div>
							<div class="tab-pane fade" id="monedas">
									<!-- TH2 -->
									<div class="col-sm-4 col-lg-4 col-md-4">
										<div class="thumbnail">
										  
											<div class="caption">
												<div class="offer offer-danger">
													<div class="shape">
														<div class="shape-text">
														SALE!								
														</div>
													</div>
													<div class="offer-content">
														<h4 class="pull-right text-danger"><b>$24.99</b></h4>
														<h4><b>MONEDAS</b></h4>
														<p class="text-warning">See more snippets like this online store item atSee more snippets like this online store.</p>
														<a href="mi_pedido.php" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" >VER MÁS!</a>
													</div>
													<hr>
												</div>
											</div>
											
											<img src="images/monedas.jpg" alt="..." class="">
											
											<b>MONEDAS</b>
										  
										</div>
									</div>
							</div>
								
								<!-- PAGINACION -->
								<div class="col-lg-11" align="center">	
									<ul class="pagination pagination-sm">
									  <li class="disabled"><a href="#">&laquo;</a></li>
									  <li class="active"><a href="#">1</a></li>
									  <li><a href="#">2</a></li>
									  <li><a href="#">3</a></li>
									  <li><a href="#">4</a></li>
									  <li><a href="#">5</a></li>
									  <li><a href="#">&raquo;</a></li>
									</ul>
								</div>
								<!-- FIN PAGINACION -->
						</div>				
									
									
					</div>
					<!-- FIN MENU CATEGORIAS -->
					
					
					<div class="col-lg-1"></div>
		</div>
		<!-- FIN PRODUCTOS -->
		
		<div class="row"><div class="col-lg-1"></div><div class="col-lg-10"><hr></div></div>	
		
	
			
			
			
			 
			
        
    </div><!-- FIN CONTAINER -->	
    <!-- /.container -->
	
	
	
	
	
	
	
	
	<!-- /INCLUDE FOOTER -->
	
	<div class="container"> 
	<footer><!-- COMIENZO FOOTER -->
				<div class="row text-center">		
					
					<!-- MI HISTORICO ROWS; ESTADO PEDIDOS -->
					<div class="col-lg-1"></div>
						<div class="well col-lg-10" style="background-image: url('images/fondo.jpg');">
						
											<h3 style="color: #ffffff;">Redes Sociales</h3>
												<ul class="list-inline text-center">
													<li>
														<a href="#">
															<span class="fa-stack fa-lg">
																<i class="fa fa-circle fa-stack-2x"></i>
																<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
															</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span class="fa-stack fa-lg">
																<i class="fa fa-circle fa-stack-2x"></i>
																<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
															</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span class="fa-stack fa-lg">
																<i class="fa fa-circle fa-stack-2x"></i>
																<i class="fa fa-github fa-stack-1x fa-inverse"></i>
															</span>
														</a>
													</li>
												</ul>
											
											<p style="color: #ffffff;"><b>Copyright &copy; Gráfica No Convencional 2016 // Creado por: <a href="http://startbootstrap.com" style="color: #ffffff;"><i>VIPI DESARROLLO WEB</i></a>.</b></p> 
						</div>
					<div class="col-lg-1"></div>
					<!-- FIN MI HISTORICO ROWS; ESTADO PEDIDOS -->
				
				</div><!-- /.FIN DEL ROW -->
			</footer>
	</div>
	
	
	
	<!-- /.FIN FOOTER -->
	
	
	
	
	
	
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
