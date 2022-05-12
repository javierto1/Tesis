<?php
						
						include('../../includes_admin/dbcon.php');
						include_once "../../includes_admin/fecha_acomodada.php";

						$id_pedido = $_GET['id_pedido'];
						

						//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

						
																						
										 $query = " select  pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.fecha_pedido,
															p.denominacion
															
													FROM 	pedido_cliente pc,
															producto p
													
													WHERE 	pc.id_producto = p.id_producto AND
															id_pedido='$id_pedido'";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo '	<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													  <h4 class="modal-title">Histórico de pedido Nº: '.$registro['id_pedido'].' - '.$registro['denominacion'].' - <small>(Se solicitó: <em>'.fechaNormal($registro['fecha_pedido']).'</em>)</small></h4>
													</div>
													<div class="modal-body">
											
											<div>
														
														<div class="table-responsive">
															<table class="table table-hover">
																<thead>
																	<tr>
																		<th>Estado: </th>
																		<th>Fecha de estado: </th>
																		<th>Realizado por: </th>
																	</tr>
																</thead>
											
												 
												';}
                            				
										
						//EJECUTAMOS LA CONSULTA DE BUSQUEDA

						$registro = mysql_query("	SELECT 	hp.id_pedido, hp.fecha, hp.id_estado, hp.operador,
															ep.id_estado, ep.denominacion,
															dp.id, dp.username, dp.nombre, dp.apellido, dp.rol
						
													FROM 	historico_pedido hp, estado_pedido ep, datos_personales dp
													
													WHERE 	hp.id_estado = ep.id_estado AND 
															hp.operador = dp.id AND
															hp.id_pedido = '$id_pedido' ORDER BY id DESC");
						
						if(mysql_num_rows($registro)>0){
							while($registro2 = mysql_fetch_array($registro)){
								echo '
													<tbody>
														<tr>
															<td>'.$registro2['denominacion'].'</td>
															<td>'.$registro2['fecha'].'</td>
															<td>'.$registro2['apellido'].','.$registro2['nombre'].'</td>
															
														</tr>
														
													
																		';}
						}else{
							echo '<td>No tiene historico</td>';
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
						