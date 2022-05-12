<!DOCTYPE html>
<html lang="en">
<?php 
//LO SACAMOS DE LA SESSION

include_once "includes_cliente/dbcon.php";
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}
 $query1="SELECT * from datos_personales WHERE id='$id_cliente'";
 $query=mysql_query($query1);
 $resultado = mysql_fetch_array($query);
 $nombre = $resultado[2];
 $apellido = $resultado[3];
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
    <link href="css/productos_index.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
 $(document).ready(function() {
 	 $("#info").load("consulta.php");
   var refreshId = setInterval(function() {
      $("#info").load('consulta.php?');
   }, 3000);
   $.ajaxSetup({ cache: false });
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
					<p class="lead">Bienvenido <b><?php echo $nombre.','.$apellido;?></b> al Sistema de "No convencional" encuentre promociones y descuentos!!</p><hr>
					<div id="info"><hr></div>
				</div>
				
		</div>
		
		
		
		<!-- TODO EL ROW (FILA) DE BANNER Y MIS PEDIDOS/ESTADO -->
        <div class="row">
            <!-- BANNER DATOS PERSONALES Y PEDIDOS ESTADO -->
			<div class="col-lg-1"></div>

				<div class="col-lg-8">
				  
					<!-- Preview Image -->
					
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/promo.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/promo2.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/horario.png" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                    </div>
				</div>           
			<div class="col-lg-2"></div>
			
			<div class="thumbnail col-lg-2 text-left">
								
								 <a class="text-center" href="mis_pedidos.php">
									<strong>Mis Pedidos:</strong>
									<i class="fa fa-angle-right"></i>
								</a>
								<?php
																						
											$query = "SELECT pc.id_cliente, pc.id_pedido, pc.id_estado, pc.fecha_pedido, ep.id_estado, ep.denominacion
														FROM estado_pedido ep, pedido_cliente pc WHERE 
													pc.id_cliente = '$id_cliente' AND
													pc.id_estado = ep.id_estado ORDER BY pc.id_pedido DESC LIMIT 3";
											$result = mysql_query($query); 
											$pedidos=mysql_num_rows($result);
											
											
	
											while ($registro = mysql_fetch_array($result)){
											
											if($registro['denominacion']=="Pedido"){
											$Num="15%";	
											$msj="bar-danger";	
											}
											if($registro['denominacion']=="Confirmado"){
												$Num="25%";	
												$msj="bar-warning";
											}
											if($registro['denominacion']=="Elaboracion"){
												$Num="50%";
												$msj="bar-info";
											} 
											if($registro['denominacion']=="Terminado"){
												$Num="75%";
												$msj="bar-info";
											}
											if($registro['denominacion']=="Facturado"){
												$Num="100%";
												$msj="bar-success";
											} 
											if($registro['denominacion']=="Entregado"){
												$Num="100%";
												$msj="bar-success";
											} 
											if($registro['denominacion']=="Cerrado"){
												$Num="100%";
												$msj="bar-danger";
											} 
											if($registro['denominacion']=="Cancelado"){
												$Num="0%";
												$msj="bar-warning";
											} 	
											if($registro['denominacion']=="Bloqueado"){
												$Num="0%";
												$msj="bar-warning";
											} 								

											?>
                                <div>
                                	<p>
                                        <strong>Pedido Nº :<?php echo $registro['id_pedido'];?></strong>
                                        <span class="pull-right text-muted"><?php echo $Num.$registro['denominacion'];?></span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-<?php echo $msj;?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $Num;?>">
                                            <span class="sr-only"><?php echo $Num;?> Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
								
								<hr>
								
								
                            <?php ;}

                                	if($pedidos==0){
												echo "</br>No tiene pedidos activos!";

											}
											
									?>
            </div>
			
			<div class="col-lg-1"></div>
			<!-- FIN BANNER DATOS PERSONALES Y PEDIDOS ESTADO -->
			
		</div>	
		
		<div class="row">
			
			<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<hr>
					<p class="lead">Productos, <b>Promociones</b> y más!!!</p>
				</div>
			<div class="col-lg-1"></div>
		</div>
	
		
		<div class="row">
			<div class="col-md-1"></div>
			
				<div class="col-md-10 thumbnail">
						
						<div id="Carousel" class="carousel slide">
						 
							<ol class="carousel-indicators">
								<li data-target="#Carousel1" data-slide-to="0" class="active"></li>
								<li data-target="#Carousel1" data-slide-to="1"></li>
								<li data-target="#Carousel1" data-slide-to="2"></li>
							</ol>
							 
							<!-- Carousel items -->
							<div class="carousel-inner">
								
									<div class="item active">
										<div class="row">
											<?php 
											$query="SELECT * FROM producto WHERE estado=1 limit 4";

										$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
												?>
										  <div class="col-md-3">
												<div class="thumbnail">
													<a href="mi_pedido.php?id_producto=<?php echo $registro['id_producto']?>">
													<img src="../admin/Productos/Img/<?php echo $registro['url'];?>" class="pequeña" alt="">
												</a>
													<div class="caption">
														<h4 class="pull-right">$<?php echo $registro['promo_precio'];?></h4>
														<h4><a href="mi_pedido.php?id_producto=<?php echo $registro['id_producto']?>"><?php echo $registro['denominacion'];?></a>
														</h4>
														<!--<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>-->
													</div>
													
												</div>
										  </div>										  
									<?php 
								};
								?>
										</div><!--.row-->
									</div><!--.item-->
							 
								<div class="item">
								<div class="row">
									
										<?php 
											$query="SELECT * FROM producto WHERE estado=1 limit 4";

										$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
												?>
										  <div class="col-md-3">
												<div class="thumbnail">
													<img src="images/tarjetas.png" alt="">
													<div class="caption">
														<h4 class="pull-right">$<?php echo $registro['promo_precio'];?></h4>
														<h4><a href="mi_pedido.php?id_producto=<?php echo $registro['id_producto']?>"><?php echo $registro['denominacion'];?></a>
														</h4>
														<!--<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>-->
													</div>
													
												</div>
										  </div>										  
									<?php 
								};
								?>
								  
								  
							
								</div><!--.row-->
							</div><!--.item-->
							
							 
						</div><!--.carousel-inner-->
						 
							<ul class="pager">
							  <li><a data-slide="prev" class="pull-left"  href="#Carousel">ANTERIOR</a></li>
							  <li><a data-slide="next" class="pull-right" href="#Carousel">SIGUIENTE</a></li>
							</ul>
						  
						</div><!--.Carousel-->
				</div>
				<div class="col-md-1"></div>
			</div>
		
		<div class="row">
			
			<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<hr>
					<p class="lead">Accesos <b>directos</b></p><hr>
				</div>
			<div class="col-lg-1"></div>
		</div>
		
		<div class="container">
			<div class="row">
					<div class="col-lg-1"></div>
					
					<div class="col-lg-10">
					
						<div class="col-lg-4 col-sm-3 text-center">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-user fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"></div>
											<div>Mis datos personales!</div>
										</div>
									</div>
								</div>
								<a href="mis_datos.php">
									<div class="panel-footer">
										<span class="pull-left">Ver datos</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>
						
						
						<div class="col-lg-4 col-sm-3 text-center">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-shopping-cart fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge">
															<?php $query = mysql_query ("select * from pedido_cliente WHERE id_cliente='$id_cliente'"); 
															$result = mysql_num_rows($query); 
															echo '<small> <span class="badge">'.$result.'</span></small>'; ?>
											</div>
											<div>Mis ordenes!</div>
										</div>
									</div>
								</div>
								<a href="mis_pedidos.php">
									<div class="panel-footer">
										<span class="pull-left">Ver ordenes</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>
						
						
						<div class="col-lg-4 col-sm-3 text-center">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-comments fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge">
														<?php $query = mysql_query ("select * from mensajeria WHERE receptor='$id_cliente'"); 
														$result = mysql_num_rows($query); 
														echo '<small> <span class="badge">'.$result.'</span></small>'; ?>
											</div>
											<div>Mis Mensajes!</div>
										</div>
									</div>
								</div>
								<a href="mis_mensajes.php#">
									<div class="panel-footer">
										<span class="pull-left">Ver Mensajes</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>
						
					</div>
					<div class="col-lg-1"></div>
					
			</div>
		</div>
		
	
		<div class="row">
			
				<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<hr>
						<p class="lead">Algúnos<b> consejos útiles:</b></p><hr>
					</div>
				<div class="col-lg-1"></div>
			</div>
			
			
			<div class="row">
						<div class="col-lg-1"></div>
							<div class="col-lg-10">				
											
											<div class="col-md-6">
													<div class="thumbnail">
														<img src="images/consejo_1.png" alt="">
														<div class="caption">
															
															<!--<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>-->
														</div>
													</div>
											</div>	
											
											<div class="col-md-6">
													<div class="thumbnail">
														<img src="images/consejo_2.png" alt="">
														<div class="caption">
															
															<!--<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>-->
														</div>
													</div>
											</div>	
											
											<div class="col-md-6">
													<div class="thumbnail">
														<img src="images/consejo_3.png" alt="">
														<div class="caption">
															
															<!--<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>-->
														</div>
													</div>
											</div>	
											
											<div class="col-md-6">
													<div class="thumbnail">
														<img src="images/consejo_4.png" alt="">
														<div class="caption">
															
															<!--<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>-->
														</div>
													</div>
											</div>
											
									  
									  
								
							</div><!--.row--><div class="col-lg-1"></div> <hr>
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
