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
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<script src="js/jquery.js"></script>

		
	<!-- Custom CSS -->
    
	<link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
    <script src="uikit/js/uikit.min.js"></script>
	<script src="uikit/components/slideset.js"></script>
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
	<script type="text/javascript">
	function filtrar(cat){
		
		var dataString = 'cat='+cat;
	
	 		$.ajax({

	 			type: 'POST',
				data: dataString,
				url: 'filtro.php',
				success: function(data){
					$('#filtro').html(data);
					
				}
			});
		
	};	
	
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
		<!-- BOTONERA-->
			<?php include("includes_cliente/botonera_cliente.php"); ?>
		 <!-- FIN BOTONERA-->

		
		
		
		<div class="row">
			<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<p class="lead">Seleccione su <b>producto adecuado:</b></p><hr>
				</div>
		</div>
		
		
		
			
		
		<!--  COMIENZA PRODUCTOS  -->
		<div class="container">
				<div class="col-lg-1"></div>
				
					<div class="col-lg-10" align="center">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#todos" data-toggle="tab" aria-expanded="true">TODOS 
						  <span class="label label-default">
						  					<?php								
											$query1 = mysql_query ("SELECT * from producto where estado='1'"); 
											$result1 = mysql_num_rows($query1); 
											echo $result1;
											?>
									</span></a></a></li>
						  <?php 
						  		$query="SELECT DISTINCT c.id_cat, c.denominacion as pp, p.id_producto, p.denominacion, p.categoria, p.url, p.estado, p.descripcion 
														FROM producto p, cat_productos c WHERE 
													p.estado = 1 AND c.id_cat = p.categoria GROUP BY c.id_cat";	
												
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
												$categoria=$registro['id_cat'];
												?>
						  <li class=""><a href="#filtro" name="filtrar" id="filtrar" onclick="filtrar($cat=<?php echo $registro['id_cat'];?>)" data-toggle="tab" aria-expanded="false"><?php echo $registro['pp'];?> <span class="label label-default">
						  					<?php								
											$query1 = mysql_query ("SELECT * from producto where estado='1' and categoria=$categoria"); 
											$result1 = mysql_num_rows($query1); 
											echo $result1;
											?>
									</span></a></li>
						  <?php 
								};
								?>
						  
						</ul>
							
						<div class="col-lg-12" align="center"><br></div>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="todos">
								
									<?php 
									$query="SELECT * from producto where estado='1'";	
												
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
												
												?>
									<!-- TH2 -->
									<div class="col-sm-col-lg-6 col-md-3">
										<div class="thumbnail">
											<div class="caption">
												<div class="offer offer-danger">
													
													<div class="offer-content">
														<h4 class="pull-right text-danger">$<b><?php echo $registro['promo_precio'];?></b></h4>
														<h4><b><?php echo $registro['denominacion'];?></b></h4>
														<a href="mi_pedido.php?id_producto=<?php echo $registro['id_producto'];?>" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														<!--<a href="#" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" >VER MÁS!</a>-->
													</div>
													<hr>
												</div>
											</div>
											
											<img src="../admin/Productos/Img/<?php echo $registro['url'];?>" alt="..." width="304" height="236" class="img-thumbnail">
											
											<b><?php echo $registro['denominacion'];?></b>
										   
										</div>
									

									<!-- TH2 -->
									</div>
								<?php 
								};
								?>

							</div>
							
							<div class="tab-pane fade" id="filtro" name="filtro">
								
							<!-- TH2 -->
							
									
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
     
		
		
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">CARTAS PRESENTACION</h4>
		  </div>
		<div class="modal-body">
			
			
			<div class="row">

				<div class="well col-md-8">
					<img class="img-responsive" src="images/cartas.jpg" alt="">
				</div>

				<div class="col-md-4">
					<h3>DESCRIPCION:</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
					<h3>CARACTERISTICAS:</h3>
					<ul>
						<li>Lorem Ipsum</li>
						<li>Dolor Sit Amet</li>
						<li>Consectetur</li>
						<li>Adipiscing Elit</li>
					</ul>
					<button type="button" class="btn btn-danger" >PEDIR!</button>
					
					<button type="button" class="btn btn-default" data-dismiss="modal">VOLVER</button>
				</div>

			</div>
		</div>
		
		
		
		  <div class="modal-footer">
			
		  </div>
		</div>

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
