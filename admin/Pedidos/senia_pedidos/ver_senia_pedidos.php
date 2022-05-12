<?php
						
						include('../../includes_admin/dbcon.php');
						include_once "../../includes_admin/fecha_acomodada.php";

						$id_pedido = $_GET['id_pedido'];
						//$id_pedido = 14;

						//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

						
																						
										 $query = " select  pc.id_pedido, pc.precio_vta, pc.fecha_pedido, pc.senia, pc.fecha_senia
															
													FROM 	pedido_cliente pc
													
													WHERE 	pc.id_pedido='$id_pedido'";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo '	<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													  <h4 class="modal-title">Pedido Nº: '.$registro['id_pedido'].'<small> (El Pedido se solicitó el: <em>'.fechaNormal($registro['fecha_pedido']).'</em>)</small></h4>
													</div>
													<div class="modal-body">
											
											<div>
														
														<div class="table-responsive">
															<table class="table table-hover">
																<thead>
																	<tr>
																		<th>Cobrador:</th>
																		<th>Medio de Pago:</th>
																		<th>Fecha de Pago:</th>
																		<th>Monto de Pedido:</th>
																		<th>Monto de Seña:</th>
																		<th>Saldo:</th>
																	</tr>
																</thead>
																	
												';}
                            				
										
						//EJECUTAMOS LA CONSULTA DE BUSQUEDA

						$registro = mysql_query("	SELECT  pc.id_pedido, pc.precio_vta, pc.fecha_pedido, pc.senia, pc.fecha_senia, pc.id_cobrador,
															dp.id, dp.nombre, dp.apellido
															
													FROM 	
															pedido_cliente pc,
															datos_personales dp
															
													WHERE 	pc.id_cobrador = dp.id AND
															pc.id_pedido='$id_pedido'");
						
						if(mysql_num_rows($registro)>0){
							while($registro2 = mysql_fetch_array($registro)){
								$senia=$registro2['senia'];
								$saldo=0;
								$precio_vta=$registro2['precio_vta'];
								
								$saldo1=($precio_vta - $senia);
								
								echo '
													<tbody>
														<tr>
															<td>'.$registro2['apellido'].', '.$registro2['nombre'].'</td>
															<td>EFECTIVO</td>
															<td>'.fechaNormal($registro2['fecha_senia']).'</td>
															<td>$'.$registro2['precio_vta'].'</td>
															<td>$'.$registro2['senia'].'</td>
															<td><b>$'.$saldo1.'</b></td>
															
															
														</tr>
														
													
																		';}
						}else{
							echo '<td>No tiene seña</td>';
						}
						echo '</table>
						</tbody>
						</div>
						
					<!-- FINAL MODAL BODY -->	
						
        </div>
        </div>
		</div>	
';
						?>
						