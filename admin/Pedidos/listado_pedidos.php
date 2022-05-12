<?php  
include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
$id = $_POST['id']; 
include_once "../includes_admin/botonera_admin.php";
include_once "../includes_admin/dbcon.php";  
include_once "../includes_admin/fecha_acomodada.php";
include_once "includes_pedidos/include_historico_pedido.php";
include_once "includes_pedidos/include_ver_mas_pedido.php";

include_once "includes_pedidos/include_ver_senia_pedido.php";
include_once "../reportes/php/pedidos/include_busqueda_pedidos.php"; 
$_SESSION['usuario'];
?>
<html>  
<head>  


	<!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- PARA QUE FUNCIONE LA BUSQUEDA POR FECHAS Y VER MAS DATOS -->
	<script src="../js/jquery.js"></script>
	<script src="js/myjava1.js"></script>
	<script src="../reportes/js/myjava_pedido.js"></script>
	

</head>  

<body>
	<div id="page-wrapper">
            
		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Pedidos <?php	$estado=(int) $_GET['id_estado']; 
																																			if($estado==1) {echo "<b>Pendientes</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='1'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($estado==2)	{echo "<b>Confirmados</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='2'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($estado==3)	{echo "<b>en Elaboración</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='3'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($estado==4)	{echo "<b>Terminados</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='4'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($estado==5)	{echo "<b>Facturados</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='5'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php 
																																			if($estado==6)	{echo "<b>Entregados</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='6'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php 
																																			if($estado==7)	{echo "<b>Cerrados</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='7'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php 
																																			if($estado==9)	{echo "<b>Cancelados</b>";?>
																																					<?php   $query = mysql_query ("select * from pedido_cliente where id_estado='9'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($estado>=10)	{header('Location: http://noconvencional.comli.com/admin/Pedidos/listado_pedidos.php?id_estado=9');}
																																			if($estado>=11)	{header('Location: http://noconvencional.comli.com/admin/Usuarios/error_rol_inexistente.php');}

																																			else if ($estado!=0 & 1 & 2) {echo "ERROR";}																																	
																																				?>
						</h1>
						<div class="panel-body"> 
                            
							<div align="center" class="col-sm-12">
								<div class="btn-group ">
									
									<a href="listado_pedidos.php?id_estado=1" type="button" class="btn btn-outline btn-primary">Pedido 
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='1'"); 
										$result = mysql_num_rows($query); ?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									<a href="listado_pedidos.php?id_estado=2" type="button" class="btn btn-outline btn-primary">Confirmado
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='2'"); 
										$result = mysql_num_rows($query); ?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									<a href="listado_pedidos.php?id_estado=3" type="button" class="btn btn-outline btn-primary">Elaboracion 
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='3'"); 
										$result = mysql_num_rows($query); 
										?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									<a href="listado_pedidos.php?id_estado=4" type="button" class="btn btn-outline btn-primary">Terminado	
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='4'"); 
										$result = mysql_num_rows($query); ?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									<a href="listado_pedidos.php?id_estado=5" type="button" class="btn btn-outline btn-primary">Facturado	
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='5'"); 
										$result = mysql_num_rows($query); ?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									<a href="listado_pedidos.php?id_estado=6" type="button" class="btn btn-outline btn-primary">Entregado	
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='6'"); 
										$result = mysql_num_rows($query); ?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									<a href="listado_pedidos.php?id_estado=7" type="button" class="btn btn-outline btn-primary">Cerrado	
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='7'"); 
										$result = mysql_num_rows($query); ?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									
									<a href="listado_pedidos.php?id_estado=9" type="button" class="btn btn-outline btn-primary">Cancelado	
										<?php $query = mysql_query ("select * from pedido_cliente where id_estado='9'"); 
										$result = mysql_num_rows($query); ?> 
										<span class="label label-danger"><?php echo $result;?></span>
									</a>
									
								</div>
							</div>
							
							<hr>
							
							
							<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
										<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 30px;">#</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Cliente</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 260px;">Producto</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Solicitado</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 144px;">Estado</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Precio</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;">Acciones</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$estado=(int) $_GET['id_estado'];
																						
											$query = "	SELECT 	 pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta, pc.fecha_pedido, pc.senia, pc.fecha_senia,
																 p.id_producto, p.denominacion,
																 dp.id, dp.apellido, dp.nombre, dp.username,
																 ep.id_estado, ep.denominacion as deno
														FROM 
																pedido_cliente pc,
																producto p,
																datos_personales dp,
																estado_pedido ep
																
														WHERE	pc.id_cliente = dp.id AND 
																pc.id_producto = p.id_producto AND 
																pc.id_estado = ep.id_estado AND
																pc.id_estado='$estado'";
											
											
											$result = mysql_query($query); 
											
											
											
											while ($registro = mysql_fetch_array($result)){ 
											
											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['id_pedido']."</td> 
                                            <td>".$registro['apellido'].", ".$registro['nombre']."</td>
                                            <td>".$registro['denominacion']."</td>
                                            <td>".fechaNormal($registro['fecha_pedido'])."</td>
											<td>".$registro['deno']."</td>
											<td><p class='text-right'>$ ".$registro['precio_vta']."</p></td>
											<td> 
												<input type='hidden' id='bd-estado' name='id_estado' value='".$estado."'/>
												
												
												<button name='historico' value='".$registro['id_pedido']."'  type='button' class='btn btn-success btn-circle' data-toggle='modal' data-target='#myModal'><i class='fa fa-history' aria-hidden='true' title='Ver Historial de pedido'> </i> </button>
												<button name='ver_mas' value='".$registro['id_pedido']."' type='button' class='btn btn-info btn-circle' data-toggle='modal' data-target='#myModalVerMas'><i class='fa fa-list-alt' title='Ver más...'> </i> </button>
												<a href='siguiente_estado_pedido.php?id_pedido=$registro[id_pedido]&id_estado=$registro[id_estado]'><button type='button' class='btn btn-warning btn-circle'><i class='fa fa-exchange' title='Cambiar Estado'> </i> </button></a>
												
												";
												if($registro['id_estado']<=2){ 
												echo "<a href='cancelar_pedido_enviado.php?id_pedido=$registro[id_pedido]&id_estado=$registro[id_estado]'> <button type='button' class='btn btn-danger btn-circle'><i class='fa fa-times' title='Cancelar'> </i> </button></a>";
												}
												else { echo "";}
												"
												
											</td>
											
												
											
											
                                        </tr>
											
											"; }
											?>
										
										</tbody>
										
									</table>
									
									</div>
								
								</div>
								
								</div>
                            <!-- /.table-responsive -->
							
                            <div class="well">
								<?php echo "<a target='_blank' href='#' type='button' class='btn btn-outline btn btn-danger' data-toggle='modal' data-target='#myModalPedidosFechas'><i class='fa fa-th-list'></i> Exportar a PDF</a>";   ?>
							</div>
                        </div>
			
					</div> 
				</div> 
			</div>
		</div> 
		
		
		<!-- Modal -->
	<div id="myModalCargarSenia" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<form action="senia_pedidos/cargar_senia_pedidos.php" name="customForm" id="customForm" method="post" onsubmit="enviar()" enctype="multipart/form-data">
			<div class="modal-content">
		
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Cargar Seña:</h3>
				</div>
						<div class="modal-body">
													
															<label>Monto a señar</label>
															<input id="id_pedido" name="id_pedido" type="hidden" value="<?=$registro['id_pedido'];?>">
															<input id="senia" class="form-control" name="senia" type="number" value="<?=$registro['id_pedido'];?>" placeholder="Monto a señar" required/>
															<hr>
															<label>Medio de Pago</label>
															<input id="fecha_pago" class="form-control" name="fecha_pago" type="text" placeholder="EFECTIVO" value="EFECTIVO" disabled/>
															<hr>
															<label>Fecha de Pago</label>
																<input id="fecha_pago" class="form-control" name="fecha_pago" type="date" value="" required/>
															<hr>
															<button type="submit" class="btn btn-default">Guardar</button>
															<button type="reset" class="btn btn-default">Limpiar</button>
						</div>
			</div>
		</form>
	</div>	
	</div>	
		
		
		
		
		
		
		
		
		
	</div>



</body>
	<!-- jQuery -->
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
	
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
		