<!DOCTYPE html>
<html lang="es">
<?php
include_once "includes_cliente/include_historico_pedido.php";
include_once "includes_cliente/include_ver_mas_pedido.php";
include "../admin/includes_admin/fecha_acomodada.php";	
include_once "includes_cliente/dbcon.php";
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
    <link href="css/blog-post.css" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link href="css/mis_pedidos.css" rel="stylesheet">
	
	
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
	
	
	<!-- JavaScript -->
	<script src="js/jquery.js"></script>
	<script src="js/paginacion.js"></script>
	<script src="js/myjava_historico_ver_mas.js"></script>
	
	
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
					<p class="lead">Sus <b>Trabajos Solicitados</b>:</p><hr>
				</div>
		</div>
		
		<?php	$id_cliente=$_SESSION['usuario'];
							$registro = mysql_query(" 	SELECT 	pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta, pc.fecha_pedido,
																p.denominacion,
																dp.id, dp.apellido, dp.nombre, dp.username,
																ep.id_estado, ep.denominacion as deno
																 
														 FROM 
																pedido_cliente pc,
																producto p,
																datos_personales dp,
																estado_pedido ep
																
														
														
														WHERE 	pc.id_cliente = dp.id AND 
																pc.id_producto = p.id_producto AND 
																pc.id_estado = ep.id_estado AND
																pc.id_cliente='$id_cliente'
																ORDER BY fecha_pedido DESC
																"); ?> 
		
					<!--<div class="registros" id="agrega-registros"></div>-->
		
                         
							
							
						
								
							<div class="row">
							
							<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
							   
								<div class="col-lg-1"></div>
								<div class="col-sm-10">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 220px;">Trabajo</th>
																	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 230px;">Porcentaje</th>
																	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 180px;">Estado Actual</th>
																	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Fecha</th>
																	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Precio Final</th>
																	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Acciones</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$rol=(int) $_GET['rol'];
											
											$query = "SELECT 	pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta, pc.fecha_pedido,
																p.denominacion,
																dp.id, dp.apellido, dp.nombre, dp.username,
																ep.id_estado, ep.denominacion as deno
																 
														 FROM 
																pedido_cliente pc,
																producto p,
																datos_personales dp,
																estado_pedido ep
																
														
														
														WHERE 	pc.id_cliente = dp.id AND 
																pc.id_producto = p.id_producto AND 
																pc.id_estado = ep.id_estado AND
																pc.id_cliente='$id_cliente'
																ORDER BY fecha_pedido DESC"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
												
												if($registro['deno']=="Pedido"){
											$Num="15%";	
											$msj="bar-danger";	
											}
											if($registro['deno']=="Confirmado"){
												$Num="25%";	
												$msj="bar-warning";
											}
											if($registro['deno']=="Elaboracion"){
												$Num="50%";
												$msj="bar-info";
											} 
											if($registro['deno']=="Terminado"){
												$Num="75%";
												$msj="bar-info";
											}
											if($registro['deno']=="Facturado"){
												$Num="100%";
												$msj="bar-success";
											} 
											if($registro['deno']=="Entregado"){
												$Num="100%";
												$msj="bar-success";
											} 
											if($registro['deno']=="Cerrado"){
												$Num="100%";
												$msj="bar-danger";
											} 
											if($registro['deno']=="Cancelado"){
												$Num="0%";
												$msj="bar-warning";
											} 	
											if($registro['deno']=="Bloqueado"){
												$Num="0%";
												$msj="bar-warning";
											} 															
											
											echo 
											"
											"
											?>
											<?php
											
											$estado=$registro['estado'];
											
											echo "<tr class='gradeA odd' role='row'>
                                            
											<td><i>".$registro['denominacion']."</i></td>
															<td>
																<div class='progress'>
																	<div class='progress progress-striped'>
																	  <div class='progress-bar progress-".$msj."' style='width: ".$Num."'><b> ".$Num." </b></div>
																	</div>
																	<span class='progress-completed pull-right'>60%</span>
																	
																	
																</div>
															</td>
															<td><span class='label label-primary'>".$registro['deno']."</span></td>
															<td><strong>".fechaNormal($registro['fecha_pedido'])."</strong></td>
															<td><strong><p class='text-right'>$ ".$registro['precio_vta']."</p></strong></td>
															
											
											
											<td> 
												<input type='hidden' name='bd-rol' id='bd-rol' value=".$rol."/>
												<a  data-toggle='tooltip' title='Ver más datos'><button type='button' name='ver_mas' value=".$registro['id_pedido']." id=".$registro['id']." class='btn btn-info btn-circle' data-toggle='modal' data-target='#myModalVerMas'><i class='fa fa-info-circle' title='Ver más...'> </i> </button></a>
												<a  data-toggle='tooltip' title='Historico'> <button type='button' name='historico' value=".$registro['id_pedido']." id=".$registro['id']." class='btn btn-warning btn-circle' data-toggle='modal' data-target='#myModalHistorico' title='Historico de pedido'><i class='fa fa-history' > </i> </button></a>
											</td></tr>";} 
											?>
										
										</tbody>
										
									</table>
									
									</div>
								
								</div>
								<div class="col-lg-1"></div>
								
							</div>
                            <!-- /.table-responsive -->
							
                        </div>
		
     <div class="row"><div class="col-lg-1"></div><div class="col-lg-10"><hr></div></div>	   
    </div><!-- FIN CONTAINER -->	
    <!-- /.container -->
	
	
	
	
	
	
	
	
	<!-- /INCLUDE FOOTER -->
	

	
	<?php include ("includes_cliente/footer_cliente.php"); ?>
	 
	
	
	<!-- /.FIN FOOTER -->
	
	<!-- jQuery -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	
	
	<!-- Tooltip JavaScript -->
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
	
</body>

</html>
