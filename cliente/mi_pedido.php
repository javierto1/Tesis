<!DOCTYPE html>
<html lang="en">
<?PHP
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
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
    <link href="css/mi_pedido.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
	<script src="js/jquery.js"></script>
	<script src="js/enviar_pedido.js"></script>

	<script>/*
	$(function(){ $('a[title]').tooltip(); $('.btn-submit').on('click', 
	function(e) {
	  
	 if ($('#' + formname)[0].checkValidity()) { /* Only works in Firefox/Chrome need polyfill for IE9, Safari. http://afarkas.github.io/webshim/demos/ */ 
	 	/*e.preventDefault(); 
	 	$('ul.nav li a[href="' + tabname + '"]').parent().removeClass('disabled'); 
	 	$('ul.nav li a[href="' + tabname + '"]').trigger('click'); } }); 
	 	$('ul.nav li').on('click', function(e) {
	 	if ($(this).hasClass('disabled')) { 
	 	 e.preventDefault(); return false; } }); });*/
/*
	$('#myTab a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')

		 }		*/

	/*$('#myTab a[href="#profile"]').tab('show') // Select tab by name*/
	//$('#myTab a:[href="#profile"]').tab('show') // Select first tab
	</script>




<script text="JavaScript"> 
<!-- 
//creamos la funcion la llamamos ver, la cual se va a encargar de todo cuando  
//sea llamada por los select al OnChange (al cambiar) 
   function ver(boton) 
   { 
   // creamos 1 variable por cada select a las cuales le pasamos como valor  
//el valor de su respectivo select pero antes transformamos la cadena string //contenida en un  valor numerico para poder realizar la suma posteriormente. 
     $select_a = Number(document.customForm.a.options[customForm.a.selectedIndex].value.split(',')[0]);
     $select_b = Number(document.customForm.b.options[customForm.b.selectedIndex].value.split(',')[0]);
     $select_c = Number(document.customForm.c.options[customForm.c.selectedIndex].value.split(',')[0]); 
     $select_d = Number(document.customForm.d.options[customForm.d.selectedIndex].value.split(',')[0]);
     $select_e = Number(document.customForm.e.options[customForm.e.selectedIndex].value.split(',')[0]);
     // cramos una variable donde guardaremos el valor sumado de las 
// dos variables creadas anteriormente 
     $valor = $select_a + $select_b + $select_c + $select_d + $select_e; 
     // aca mostramos el valor para ver si sumo bien .. jejej 
     // alert($valor);
      document.getElementById('nivel').value=$valor;
   } 
//--> 
</script> 
	<?php	include ("includes_cliente/dbcon.php"); ?>
	
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
					<p class="lead">Seleccione <b>caracteristicas:</b></p><hr>
				</div>
		</div>
		
		
		<div class="row">
				<div class="col-lg-1"></div>
					<div class="col-lg-10">
					<?php
					$total=0;
													$id_producto= $_GET['id_producto'];
													
													
													$query = mysql_query("SELECT * from producto WHERE id_producto='$id_producto' and estado='1' "); 
													$res= mysql_num_rows($query);
													//echo $res;
													if(empty($res)){												
														echo "<script type='text/javascript'>alert('NO');</script>";
														header('Location: error_rol_inexistente.php');}
													
													while($row = mysql_fetch_array($query)){
															
														
													?>
					
					
						<section>
										<div class="board"> <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>--> 
											<div class=""> 
												<ul class="nav nav-tabs" id="myTab">
													<div class="liner"></div>
													<li class="active"> <a href="#home" data-toggle="tab" title="Seleccionar Caracteristicas" role="tab"> <span class="round-tabs one"> <i class="glyphicon glyphicon-th-list"></i> </span> </a></li>
													<li class="disabled"><a href="#profile" data-toggle="tab" title="Confirmar Caracteristicas" role="tab"> <span class="round-tabs two"> <i class="glyphicon glyphicon-zoom-in"></i> </span> </a> </li>
													<li class="disabled"><a href="#messages" data-toggle="tab" title="Confirmar Pedido" role="tab"> <span class="round-tabs three"> <i class="glyphicon glyphicon-check"></i> </span> </a></li> 
													<li class="disabled"><a href="#" data-toggle="tab" title="Terminado" role="tab"> <span class="round-tabs four"> <i class="glyphicon glyphicon-ok"></i> </span> </a> </li>
													<li><img src="nc.png" class="img-responsive" alt="Cinque Terre"></li>
												</ul>
											</div>
											<div class="tab-content">
												<div id="falta" name="falta"></div>
												<div class="tab-pane fade in active" id="home">
												

												
												<div class="row well"><div class="col-lg-1"></div>
													<div class="col-lg-10">
														
													<div class="row">
														<div class="col-lg-1"></div>
															<div class="col-lg-10">
																<p class="lead"><b><?php echo $row['denominacion'] ;}  ?></b></p><hr>
															</div>
													</div>
														
														
														
																<form name="customForm" id="customForm" method="post" action="grabar_pedido.php" enctype="multipart/form-data" >
																		
																		
																		<div class="col-sm-6 col-lg-6 col-md-6" id="precio">
																			
																				<label><b>CANTIDAD</b></label>
																				<select class="form-control" name="a" required onChange="javascript:ver()">
																					<option value=""></option>
																					
																						<!-- Listar Colores -->
																						<?php
																						$id_producto= $_GET['id_producto'];
																						
																						$query = mysql_query("SELECT d.id_especifica, e.denominacion, e.precio FROM detalle_producto d, especifica e 
																											   WHERE d.id_especifica= e.id_especifica AND id_producto='$id_producto' AND id_tipo=3"); 
																						
																						while($row = mysql_fetch_array($query)){
																						?>
																						<option value="<?php echo $row['precio'] ?>,<?php echo $row['id_especifica'] ?>">
																						<?php echo $row['denominacion'] ?>
																						</option>
																						
																						<?php
																						
																						}
																						?>
																				</select>
																				<input class="form-control" style="visibility:hidden" type="numeric" name="tipo1" id="tipo1"  value="3" >  
																			
																		
																			
																				<label>	<b>MODULO(TAMAÑO)</b></label>
																				<select class="form-control" name="b" required onChange="javascript:ver()">
																					<option value=""></option>
																					
																						<!-- Listar Materiales -->
																						<?php
																						$id_producto= $_GET['id_producto'];
																						
																						$query = mysql_query("SELECT d.id_especifica, e.denominacion, e.precio FROM detalle_producto d, especifica e 
																											   WHERE d.id_especifica= e.id_especifica AND id_producto='$id_producto' AND d.id_tipo=5"); 
																						
																						while($row = mysql_fetch_array($query)){
																						?>
																						<option value="<?php echo $row['precio'] ?>,<?php echo $row['id_especifica'] ?>" >
																						<?php echo $row['denominacion'] ?>
																						</option>
																						
																						<?php
																						
																						}
																						?>
																				</select>
																				<input class="form-control" style="visibility:hidden" type="numeric" name="tipo2" id="tipo2"  value="5" >
																			
																		
																			
																				<label><b>SOPORTE(MATERIAL)</b></label>
																				<select class="form-control" name="c" required onChange="javascript:ver()">
																					<option value=""></option>
																					
																						<!-- Listar Cantidades -->
																						<?php
																						$id_producto= $_GET['id_producto'];
																						
																						$query = mysql_query("SELECT d.id_especifica, e.denominacion, e.precio FROM detalle_producto d, especifica e 
																											   WHERE d.id_especifica= e.id_especifica AND id_producto='$id_producto' AND d.id_tipo=2"); 
																										
																						while($row = mysql_fetch_array($query)){
																						?>
																						<option value="<?php echo $row['precio'] ?>,<?php echo $row['id_especifica'] ?>">
																						<?php echo $row['denominacion'] ?>
																						</option>
																						
																						<?php
																						
																						}
																						?>
																				</select>
																				<input class="form-control" style="visibility:hidden" type="numeric" name="tipo3" id="tipo3"  value="2" >
																			
																		
																			
																				<label><b>IMPRESION</b></label>
																				<select class="form-control" name="d" required onChange="javascript:ver()">
																					<option value="0">--</option>
																						<!-- Listar Terminacion -->
																						<?php
																						$id_producto= $_GET['id_producto'];
																						
																						$query = mysql_query("SELECT d.id_especifica, e.denominacion, e.precio FROM detalle_producto d, especifica e 
																											   WHERE d.id_especifica= e.id_especifica AND id_producto='$id_producto' AND d.id_tipo=1"); 
																						
																						while($row = mysql_fetch_array($query)){
																						?>
																						<option value="<?php echo $row['precio'] ?>,<?php echo $row['id_especifica'] ?>">
																						<?php echo $row['denominacion'] ?>
																						</option>
																						
																						<?php
																						
																						}
																						?>
																				</select>
																				<input class="form-control" style="visibility:hidden" type="numeric" name="tipo4" id="tipo4"  value="1" >
																				
																				
																				
																				<label><b>TERMINACION</b></label>
																				<select class="form-control" name="e" required onChange="javascript:ver()">
																					<option value="0">--</option>
																						<!-- Listar Terminacion -->
																						<?php
																						$id_producto= $_GET['id_producto'];
																						
																						$query = mysql_query("SELECT d.id_especifica, e.denominacion, e.precio FROM detalle_producto d, especifica e 
																											   WHERE d.id_especifica= e.id_especifica AND id_producto='$id_producto' AND d.id_tipo=4"); 
																						
																						while($row = mysql_fetch_array($query)){
																						?>
																						<option value="<?php echo $row['precio'] ?>,<?php echo $row['id_especifica'] ?>">
																						<?php echo $row['denominacion'] ?>
																						</option>
																						
																						<?php
																						
																						}
																						?>
																				</select>
																				<input class="form-control" style="visibility:hidden" type="numeric" name="tipo[]" id="tipo"  value="4" >
																			
																			
																			<input class="form-control" style="visibility:hidden" type="numeric" name="id_producto" id="id_producto"  value="<?php echo $id_producto;?>" >
																			
																		</div>
																		
																		<div class="well col-sm-4 col-lg-4 col-md-4 pull-right">
																				<h3>Detalle Pedido:</h3>
																				<hr>																																							
																				<label>Precio: <strong>
																				 $<input type="text" id="nivel" name="nivel" class="form-control col-lg-2" disabled></strong></label> 
																				<hr>
																				<!--<button type="button" onclick="profile()" class="btn-submit btn btn-success pull-right"> CONFIRMAR </button>-->
																				<a href="#profile" data-toggle="tab" class="btn-submit btn btn-success pull-right" role="tab">Siguiente<a/>

																			
																				<fieldset>
																					
																					<!--<button type="button" name="cotizar" id="cotizar" class="btn-submit btn btn-warning"> COTIZAR </button>-->
																					
																					<a href="javascript:history.go(-1);" class="btn btn-default "> VOLVER </a>
																				</fieldset>
																				
																			

																				
																				
																		</div>
																											
															
																	<br>
																	
																
															
																										
													</div>
													<!-- /.col-lg-12 -->
												</div>
												<!-- /.row -->
												
													
											</div>
											<div class="tab-pane fade" id="profile" role="tabpanel">
													<h3 class="head text-center">Seleccione y cargue el archivo con su diseño</h3>
													<p class="narrow text-center"> Recuerde que los archivos con diseños tienen que ser JPG o PNG y no deben pesar mas de 10 mb.</p>
													<p class="narrow text-center"> El nombre del archivo debe ser su nomnre completo.</p>
													
														
															<div class="form-group">

					                                        <input type="hidden" name="MAX_FILE_SIZE" value="999000"> 
					   	
															   	<label><strong>Seleccione su Archivo</strong></label>
															   	
															   	<input name="userfile" type="file" class="btn btn-info form-control"> 
															   
															   	<br><br>
															<div>
																<div class="col-md-4">
																<a href="#home" data-toggle="tab" class="btn btn-default "> VOLVER </a>
																</div>
														<button type="button" href="#messages" name="profile_form" id="profile_form" class="btn-submit btn btn-success"> Generar Pedido <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></button>

															<div class="col-md-4 pull-right" id="boton_siguiente"></div>
														</div>
														</div>											
										</div>


												<div class="tab-pane fade" id="messages">
													<h3 class="head text-center">Tu Pedido <?php echo $_SESSION['nombre'];?></h3>
													<p class="narrow text-center"> <b>Antes de confirmar tu pedido, verifica que todo sea correcto !!</b></p>
																<div id="respuesta1" name="respuesta1" > </div>
													
														<fieldset>
															<div class="col-md-4">
															<a href="index.php" class="btn-submit btn btn-danger"> Cancelar </a>
															</div>
															<div>
															<input type="submit" value="Confirmar Pedido" class="btn-submit btn btn-success">	

															</div>		

															</fieldset>
													</form>

												</div> 


												<div class="tab-pane fade" id="doner"> 
													<div class="text-center"> 
														<i class="img-intro icon-checkmark-circle"></i>
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
	
		<br><br><br><br><br><br><br><br>
	<div class="row"><br><hr>
															<br><div class="col-lg-1"><hr></div><div class="col-lg-10"><hr></div></div>		
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
