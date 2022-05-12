<?php 

 include "../includes_admin/dbcon.php";

//include('dbcon.php');?>

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
<script src="../js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="myjava.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function() {	
	$('#buscar_proveedor').blur(function(){
		
		$('#info').html('<div align="center"><img src="loader.gif" alt="" /></div>').fadeOut(1000);

		var buscar_proveedor = $(this).val();		
		var dataString = 'buscar_proveedor='+buscar_proveedor;
		
		$.ajax({
            type: "POST",
            url: "check_proveedor.php",
            data: dataString,
            success: function(data) {
				$('#info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    

function quitar_detalle(id_detalle){
		//var id_detalle = $("#id_detalle").val();;
		var dataString = 'id_detalle='+id_detalle;
	
	 		$.ajax({
				type: 'POST',
				data: dataString,
				url: 'quitar_detalle.php',
				success: function(data){
					$('#contenidoRegistro').html(data);
					$('#mensaje').html('<p class="alert alert-info">Elemento Eliminado Correctamente!</p>');
				}
			});
		
	};

</script>

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
                        
                        <h1 class="page-header"><img src="../../images/iconos/Mas.png" height="70px" width="70px"/>Cargar Factura de <b>Proveedor</b> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
								<div align="center" class="col-sm-12">
								<div class="btn-group pull-center ">
									<a href='cargar_stock.php' type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Stock (Factura compra)'> </i> Agregar Stock (Factura compra)</a>
									<a href="listado_facturas.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-list-alt' aria-hidden='true' title='Listado Facturas'> </i> Listado Facturas Compra</a>
									<a href="nivel_stock.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-bar-chart' aria-hidden='true' title='Balance de Stock'> </i> Balance de Stock</a>
									<a href="nuevo_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Material'> </i> Agregar Material</a>
									<a href="detalle_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true' title='Definir Material'> </i> Definir Material</a>	
								</div>
								</div>
								<hr><hr>
								<hr>   						<div class="row">
																	<form action="" name="formulario" id="formulario" method="post" enctype="multipart/form-data"  class="form-inline">
																	<div class="col-lg-12">                                        
																		<div class="form-group col-lg-12">
								                                            <h3>Ingrese el <b>CUIT o CUIL</b> del proveedor <small>(Sin guiones):</small> <input  class="form-control" placeholder="Buscar Proveedor" name="buscar_proveedor" type="numeric" id="buscar_proveedor" required>
																			</h3>
																			
																			<br>
																			
																			<div>
																				<div class="col-lg-11" id="info"></div>
								                                            </div>

																		</div>
																	</div>																
																
															</div>
					</div>
   
					<div class="row"> <!-- Modulo carga de facturas e items-->
								
                                    
										<div class="col-lg-12">
											
											<br>
											<div class="form-group col-lg-5">

												<strong><p class="text-center text-info bg-primary">Nº Factura</p></strong>
													<input class="form-control" placeholder="N°" name="numero" id="numero" type="number" required>
											</div>
											<div class="form-group col-lg-3">
												<strong><p class="text-center text-info bg-primary">Tipo</p></strong>
													<select class="form-control" name="tipo" id="tipo" type="text" required>
														<option>--</option>
														<option>A</option>
														<option>B</option>
														<option>C</option>
													</select>
											</div>
											
											<div class="form-group col-lg-3">
												<strong><p class="text-center text-info bg-primary">Fecha</p></strong>
													<input class="form-control" type="date" name="bday" id="bday">
											</div>
											
											
										</div>
							 

                            <div id="stylized">
									
									
									<div id="div_1" class="form-group col-lg-12">
									<h4>Detalle de Factura</h4>
								<table id="producto" name="producto" class="table-condensed">
									<tr>
										<td><strong><p class="text-center text-info bg-primary">Cantidad</p></strong></td>
										<td><strong><p class="text-center text-info bg-primary">Material</p></strong></td>
										<td><strong><p class="text-center text-info bg-primary">Tamaño</p></strong></td>
										<td><strong><p class="text-center text-info bg-primary">Precio</p></strong></td>
										<td><strong><p class="text-center text-info bg-primary">Lote</p></strong></td></tr>
										<tr>
									<td>

										<input  class="form-control col-lg-1" type="text"  placeholder="Cantidad"  name="cantidad" id="cantidad"/>
									</td>
									 <td>
									 	<select class="form-control col-lg-2" name="materiales" id="materiales" required>
														<option value="0">--</option>
														<!-- Listar Paises -->
															<?php
															$query = "select * from detalle_materiales"; 
													$query1= mysql_query($query); 
															while($row = mysql_fetch_array($query1)){
															?>
																	<option value="<?php echo $row['id_item'] ?>">
																	<?php echo $row['denominacion'] ?>
																	</option>
																	<?php
																									}
																		?>
													</select> 
									</td><td>
													<select class="form-control col-lg-2" name="tamano" id="tamano" type="text" required>
														<option value="0">--</option>
														<option value="6175">65 x 95</option>
														<option value="7344">72 x 102</option>
														<option value="4900">70 x 70</option>
														<option value="6300">70 x 90</option>
														<option value="8000">80 x 100</option>
													</select>
									</td><td>
									    <input  class="form-control col-lg-3" type="text"   placeholder="Precio unitario" name="precio" id="precio"/>
									</td><td>
									    <input  class="form-control col-lg-3" type="text"   placeholder="Lote" name="lote" id="lote"/>
									</td><td>
									    <input type="button" class="btn btn-primary" id="cargarStock" name="cargarStock"  value="Cargar" />
									    
									</td>
								</tr>
							</table>
								<div id="contenidoRegistro"></div>
                										<br />
                					<div id="contenidoRegistro"></div>
										<div align="center" id="mensaje" class="col-lg-11"></div>  		
									    									 
									<div class="spacer"></div>
									
										
									
								</div> 

							
						


						<div class="panel-body">
           		<div class="col-lg-12">
                    								
					</form>				
			
										<button type="reset" class="btn btn-default">Limpiar</button>
										
										<!--<input id="button" type="submit" value="Enviar" style=" margin-left:565px;" />-->
		
				</div>
							
						</div>
						<!-- /.panelbody -->			
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