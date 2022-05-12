
<?php  
	include('../includes_cliente/dbcon.php');
	include('../../admin/includes_admin/fecha_acomodada.php');
	
	$id_pedido =(int) $_GET['id_pedido']; 
	
																						
											$query = "select pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta,
															 p.denominacion,
															 dp.id, dp.apellido, dp.nombre, dp.username, dp.mail, dp.telefono, dp.telefono, dp.fecha_alta, dp.barrio, dp.documento, dp.tipo_documento, dp.calle, dp.numero,
															 ep.id_estado, ep.denominacion as deno
															 
													 from 
															pedido_cliente pc,
															producto p,
															datos_personales dp,
															estado_pedido ep
															
													where 	pc.id_cliente = dp.id AND 
															pc.id_producto = p.id_producto AND 
															pc.id_estado = ep.id_estado AND
															pc.id_pedido='$id_pedido'";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo '
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													  <h4 class="modal-title">Pedido Nº: '.$registro['id_pedido'].' de  <b>'.$registro['apellido'].', '.$registro['nombre'].'</b></h4>
													</div>
													<div class="modal-body">

                       
						<div class="panel panel-default">
							<div class="panel-heading">
								Detalle Pedido
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
										
											<tr>
												<td colspan="4"> <h4><b>Detalle Pedido</b></h4> </td>
											</tr>
											<tr>
												<td colspan="2">Producto: <b>'.$registro['denominacion'].'</b></td>
												<td><b>Precio Final:</b> $<b>'.$registro['precio_vta'].'</b></td>
											<tr>
												<td colspan="4"> <h4> <small><b>Caracteristicas:</b></small></h4> </td>
											</tr>
											 '?>
												
												<?php 
												$id_pedido = $_GET['id_pedido']; 
												
												//$query = "select dpr.id_proveedor,dpr.id_materiales,m.id_materiales,m.denominacion from detalle_proveedor dpr, materiales m where dpr.id_materiales = m.id_materiales AND dpr.id_proveedor='$id_proveedor'"; 
												$query = "select dp.id_pedido,dp.id_especifica,dp.id_tipo,e.id_especifica,e.codigo,e.denominacion,t.id_tipo,t.des_especifica 
														  FROM detalle_pedido dp, especifica e, tipo t
														  WHERE dp.id_especifica = e.id_especifica AND dp.id_tipo = t.id_tipo AND dp.id_pedido='$id_pedido'"; 
													
														$result1 = mysql_query($query); 
	
													while ($registro1 = mysql_fetch_array($result1)){ 
													echo '
												<td>'.$registro1['des_especifica'].': <small><i>(COD:'.$registro1['codigo'].')<br> </small></i> <b>'.$registro1['denominacion'].'</b> </td>'; }?><?php echo'
												
												
											</tr>
											
										</tbody>
									</table>
								</div>
                            <!-- /.table-responsive -->
							</div>
                        
						</div>
						
						
                                
								
                </div>
                           
							<br>
								
			</div>
										
        </div>
               
'; 
}
?>
