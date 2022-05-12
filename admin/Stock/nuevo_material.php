<?php 

 include_once "../includes_admin/dbcon.php";

//include('dbcon.php');?>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
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
<script src="../js/jquery-1.7.2.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script><!--add div-->
<script>  
$(function(){
	$("#btn_enviar").click(function(){
		var url = "agregar_material_enviado.php"; // El script a dónde se realizará la petición.
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



// //$("#info").html('<img src="loader.gif"/>').fadeOut(1000);

// </script>


<!--<script type="text/javascript" src="validar.js"></script>
	<script type="text/javascript" src="valform.js"></script> CON VALIDACION NO GRABA!!!!~~~~~~~~~~~~~~~~~~~~~~~~~ASDASDCZXCWEFCA!! -->
<?php 
include "../includes_admin/botonera_admin.php";
?>
</head>

<body>

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
																										

                <div class="row">


                    <div class="col-lg-12">
                        
						<h1 class="page-header"><img src="../../images/iconos/Mas.png" height="70px" width="70px"/>Añadir <b>Categoria Material</b> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						<div align="center" class="col-sm-12">
								<div class="btn-group pull-center ">
									<a href='cargar_stock.php' type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Stock (Factura compra)'> </i> Agregar Stock (Factura compra)</a>
									<a href="listado_facturas.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-list-alt' aria-hidden='true' title='Listado Facturas'> </i> Listado Facturas Compra</a>
									<a href="nivel_stock.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-bar-chart' aria-hidden='true' title='Balance de Stock'> </i> Balance de Stock</a>
									<a href="nuevo_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Material'> </i> Agregar Material</a>
									<a href="detalle_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true' title='Definir Material'> </i> Definir Material</a>	
								</div>
						</div><hr><hr><hr>
									<div class="col-lg-10">
															
																		
																<form class="form-inline" id="formulario" method="post" action="">
																	<label>Nuevo Material</label>
																	<div class="form-group">
																	   	 	
																	    	<p class="form-control-static"> </p>
																	</div>
																	<div class="form-group">
																	    	<label for="material" class="sr-only">Nombre Material</label>
																	   	 	<input type="text" onblur="upperCase()" class="form-control" id="material" name="material" placeholder="Ejemplo: Papel">
																	 </div>
																		  
																		  <input type="submit" class="btn btn-default" id="btn_enviar" value="Cargar">	
																		  	
																		  <div id="info"></div><div id="ok"></div>
																</form>				
																		<BR>
															
									</div>	
									<div class="col-lg-10">	
												<div class="panel panel-default">
													<div class="panel-heading">
													<span class="glyphicon glyphicon-asterisk"> </span> <b><i>RECUERDE!</i></b> 
													</div>
													<div class="panel-body" id="contenido">
														<h5><u> CATEGORIAS DE MATERIALES YA REGISTRADOS: </u> </h5>
														<?php include "../includes_admin/dbcon.php";
														  $query = mysql_query("SELECT * FROM materiales order by id_materiales DESC "); 
														  while($row = mysql_fetch_array($query)){ ?>
														  <b> 
															<?php echo $row['denominacion'] ?> 
														  </b> 
														  <span class="glyphicon glyphicon-option-horizontal"> </span> 
														  	<?php }; ?>
														  	<hr>
														  	<BR>
														  	<I>
																<small> 
																Primero debe añadir una categoria para luego agregar el detalle del mismo! Ejemplo: <b>Categoria:</b> Papel. <b>Detalle:</b> Papel ilustracion 150 G . 
																</small>
															</I>
														  	<br>
														 													
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

    <script type="text/javascript">
function upperCase() {
   var x=document.getElementById("material").value
   document.getElementById("material").value=x.toUpperCase()
  }
  
  </script>	

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

</html>