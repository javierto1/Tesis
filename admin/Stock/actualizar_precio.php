<?php 

include "../includes_admin/dbcon.php";

//include('dbcon.php');

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../css/jquery-ui.css" rel="stylesheet">
    <link href="../../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../../css/jquery.css" rel="stylesheet">
	<link href="../../css.css" media="screen" rel="stylesheet" type="text/css" />
	
<!-- Custom CSS -->
<link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>

<!--<script type="text/javascript" src="valida_envia.js"></script>  -->
<script src="jquery-1.7.2.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript" src="validar.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
<!-- SCRIPT PARA PROVINCIAS Y SUS LOCALIDADES FILTRADAS -->

<!--<script type="text/javascript" src="validar.js"></script>
	<script type="text/javascript" src="valform.js"></script> CON VALIDACION NO GRABA!!!!~~~~~~~~~~~~~~~~~~~~~~~~~ASDASDCZXCWEFCA!! -->
<?php 
include "../includes_admin/botonera_admin.php";
?>

<script>  

$(function(){

 $("#btn_enviar").click(function(){
 	var url = "actualizar_precios_material_enviado.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data){
               $('#info').html(data); // Mostrar la respuestas del script PHP.
           }
         });
 
    return false; // Evitar ejecutar el submit del formulario.
 });
});

$(function(){

 $("#btn").click(function(){
 	var url = "actualizar_todo.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data){
               $('#info').html(data); // Mostrar la respuestas del script PHP.
           }
         });
 
    return false; // Evitar ejecutar el submit del formulario.
 });
});



//$("#info").html('<img src="loader.gif"/>').fadeOut(1000);

</script>
</head>

<body>

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"><?php
															$id=$_GET['id'];
															

															$query = "select s.id_stock, s.precio_ultima_compracm2, s.venta, d.denominacion, d.id_item from stock s, detalle_materiales d WHERE s.id_item = $id and d.id_item = $id"; 
													$query1= mysql_query($query); 
															while($row = mysql_fetch_array($query1)){

															?>
                        <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Actualizar Precio<small><i> de <?php echo $row['denominacion'] ?></i></small><a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1>
                        
						
						
                            
								<form id="formulario" class="form-group" method="post" action="#">
									
								<div class="col-lg-6">
									<div class="panel panel-default">
										<div class="panel-heading">
										<span class="glyphicon glyphicon-usd"> </span> <b><i>ACTUALIZAR PRECIO MATERIAL</i></b> 
										</div>	
										<div class="panel-body">
											<div class="form-group">
											
												<h4>Material : <strong><?php echo $row['denominacion'] ?></strong></h4>
														<input class="form-control"  id="material"  name="material" value="<?php echo $row['id_item'] ?>" type="hidden">
												
											  
											</div>
											<div class="form-group">
												<h4>Precio de compra <small><b>CM2</b></small>: <strong> $ <?php echo $row['precio_ultima_compracm2'] ?></strong></h4>
												
												<input class="form-control"  id="preciocompra"  name="preciocompra" value="<?php echo $row['precio_ultima_compracm2'] ?>" type="hidden">
												

											</div>

											<div class="form-group">
												<h4>Precio de venta <small><b>CM2</b></small>: <strong> $ <?php echo $row['venta']?></strong></h4>
												
												<input id="precio" name="precio" class="form-control" value="<?php echo $row['venta']?>" type="hidden">
												
												<?php
													}
												?>

											</div>

											<div class="form-group has-success">
												
												<h4>Aumento: </h4>
												<select class="form-control col-lg-2" name="sumar" id="sumar" type="text" required>
													
															<option value="0">--</option>
															<option value="5">5%</option>
															<option value="10">10%</option>
															<option value="15">15%</option>
															<option value="20">20%</option>
															<option value="25">25%</option>
															<option value="30">30%</option>
															<option value="35">35%</option>
															<option value="40">45%</option>
															<option value="45">45%</option>
															<option value="50">50%</option>
															<option value="55">55%</option>
															<option value="60">60%</option>
															<option value="65">65%</option>
															<option value="70">70%</option>
															<option value="75">75%</option>
															<option value="80">80%</option>
															<option value="85">85%</option>
															<option value="90">90%</option>
															<option value="95">95%</option>
															<option value="100">100%</option>
															<option value="125">125%</option>
															<option value="150">150%</option>
															<option value="200">250%</option>
														
														</select>
															
																
											</div>
																
											
											<div class="col-lg-6">
												<BR>
												<input type="button" class="btn btn-primary" id="Actualizar" onclick="Actualizar()" value="Cancelar">
												<input type="button" class="btn btn-primary" id="btn_enviar" value="Actualizar">
												<div id="info"></div>
											</div>
										</div>
										
										
										
									</div>
								</div>																							
											
										
										<div class="col-lg-6">
										
											<div class="panel panel-default">
												<div class="panel-heading">
													<span class="glyphicon glyphicon-asterisk"> </span> <b><i>ACTUALIZAR TODOS LOS PRECIOS DE VENTA</i></b> 
												</div>
												<div class="panel-body">
													<div class="alert alert-danger">
													  <strong>Cuidado!</strong>Tenga en cuenta que todos los precios de todos los productos se actualizarán!.
													</div>
													
											<h4>Aumento: </h4>			  
                                        	<select class="form-control" name="sumartodo" id="sumartodo" type="text" required>
														<option value="0">--</option>
														<option value="5">5%</option>
														<option value="10">10%</option>
														<option value="15">15%</option>
														<option value="20">20%</option>
														<option value="25">25%</option>
														<option value="30">30%</option>
														<option value="35">35%</option>
														<option value="40">45%</option>
														<option value="45">45%</option>
														<option value="50">50%</option>
														<option value="55">55%</option>
														<option value="60">60%</option>
														<option value="65">65%</option>
														<option value="70">70%</option>
														<option value="75">75%</option>
														<option value="80">80%</option>
														<option value="85">85%</option>
														<option value="90">90%</option>
														<option value="95">95%</option>
														<option value="100">100%</option>
														<option value="125">125%</option>
														<option value="150">150%</option>
														<option value="200">250%</option>
													</select>
													<BR>
													<input type="button" class="btn btn-danger btn-md col-lg-4" id="btn" value="Actualizar Todos">
							</form>
                                        </div>
                                        
														 													
												</div>
												
											</div>
										</div>
										
									</div>	
							</div>
										
										<br>
										
										
								
							</div>
							<!-- /.row -->
						</div>
						<!-- /.panelbody -->			
					</div>
                    <!-- /.col-lg-12 -->
                
				</div>
				
			</div>
							
		</div>
				
</body>
		
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
</html>