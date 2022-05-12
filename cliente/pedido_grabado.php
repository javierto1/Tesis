
<!DOCTYPE html>
<html lang="en">
<?PHP
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}
$pedido=$_POST['id_pedido'];
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
    <link href="css/mi_pedido.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
	<script src="js/jquery.js"></script>
	<script src="js/enviar_pedido.js"></script>
	<?php	include ("includes_cliente/dbcon.php"); ?>


	<script>
	$(function(){ $('a[title]').tooltip(); $('.btn-submit').on('click', function(e) {
	 var formname = $(this).attr('name'); var tabname = $(this).attr('href'); 
	 if ($('#' + formname)[0].checkValidity()) { /* Only works in Firefox/Chrome need polyfill for IE9, Safari. http://afarkas.github.io/webshim/demos/ */ 
	 	e.preventDefault(); 
	 	$('ul.nav li a[href="' + tabname + '"]').parent().removeClass('disabled'); 
	 	$('ul.nav li a[href="' + tabname + '"]').trigger('click'); } }); 
	 	$('ul.nav li').on('click', function(e) { if ($(this).hasClass('disabled')) { 
	 	 e.preventDefault(); return false; } }); });
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
		
		<div class="row">
			<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<p class="lead"><b>Su predido fue procesado:</b></p><hr>
				</div>
		</div>
		
		
		<div class="row">
				<div class="col-lg-1"></div>
					<div class="col-lg-10">
					<?php
					
													$query = mysql_query("SELECT * from pedido_cliente WHERE id_pedido='$pedido'"); 
													
													while($row = mysql_fetch_array($query)){

														$id_pedido =$row["id_producto"];

														}

													
													?>
					
					
						<section>
										<div class="board"> <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>--> 
											<div class=""> 
												<ul class="nav nav-tabs" id="myTab">
													<div class="liner"></div>
													<li class="disabled"> <a href="#home" data-toggle="tab" title="Seleccionar Caracteristicas"> <span class="round-tabs one"> <i class="glyphicon glyphicon-th-list"></i> </span> </a></li>
													<li class="disabled"><a href="#profile" data-toggle="tab" title="Confirmar Caracteristicas"> <span class="round-tabs two"> <i class="glyphicon glyphicon-zoom-in"></i> </span> </a> </li>
													<li class="disabled"><a href="#messages" data-toggle="tab" title="Confirmar Pedido"> <span class="round-tabs three"> <i class="glyphicon glyphicon-check"></i> </span> </a></li> 
													<li class="active"><a href="#doner" data-toggle="tab" title="Terminado"> <span class="round-tabs five"> <i class="glyphicon glyphicon-ok"></i> </span> </a> </li>
												</ul>
											</div>


											<div class="tab-content">
												
												<div class="tab-pane fade in active" id="doner"> 
								<div class="text-center"> 
									<?php
									
									if (isset($id_pedido)) {
										echo '
														<i class="img-intro icon-checkmark-circle"></i>
														<h3>Su producto fue registrado exitosamente con el Nº : <strong>'.$pedido.'</strong><h3>	<br>														
															<i class="fa fa-check-square-o fa-5x" aria-hidden="true"></i><br>
															<a href="mis_pedidos.php">ir a mis pedidos</a>';
                                    
								}else{
									echo'
										<i class="img-intro icon-checkmark-circle"></i>
										<h3>Lo lamentamos! algo salio mal.. Comunicate con un operador!<h3>	<br>
									<i class="fa fa-ban fa-5x" aria-hidden="true"></i>';
								}

								
								?>	
										
								</div>	
																				
													</div> 

												</div> 

												<div class="clearfix">
												</div>
											</div> 
										</div> 
						</section>
					</div>
					
					
					<div class="col-lg-1"></div>
					
			</div>
	
		<br><br><br><br><br><br>
	<div class="row"><div class="col-lg-1"></div><div class="col-lg-10"><hr></div></div>		
	</div><!-- FIN CONTAINER -->	
    <!-- /.container -->
	
	<?php include ("includes_cliente/footer_cliente.php"); ?>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>


</body>

</html>
