<?php
						
						require('../../../../includes_admin/dbcon.php');
						require('../../../../includes_admin/fecha_acomodada.php');

						$desde = $_POST['desde'];
						$hasta = $_POST['hasta'];
						//$estado = $_POST['estado'];
						$estado= 5;
						//COMPROBAMOS QUE LAS FECHAS EXISTAN
						if(isset($desde)==false){
							$desde = $hasta;
						}

						if(isset($hasta)==false){
							$hasta = $desde;
						}

						//EJECUTAMOS LA CONSULTA DE BUSQUEDA

						$registro = mysql_query("SELECT 		pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta, pc.fecha_pedido,
																p.denominacion,
																dp.id, dp.apellido, dp.nombre, dp.username,
																ep.id_estado, ep.denominacion as deno
															 
						FROM 
																pedido_cliente pc,
																producto p,
																datos_personales dp,
																estado_pedido ep
																
						WHERE 									fecha_pedido BETWEEN '$desde' AND '$hasta' AND
																pc.id_cliente = dp.id AND 
																pc.id_producto = p.id_producto AND 
																pc.id_estado = ep.id_estado AND
																pc.id_estado >'4' AND pc.id_estado!='9'
																ORDER BY id_pedido ASC");

						//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

						echo '
								<div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Apellido, Nombre</th>
                                            <th>Producto</th>
                                            <th>Estado</th>
                                            <th>Fecha Pedido</th>
											<th>Monto Final</th>
                                        </tr>
                                    </thead>							
															';
						if(mysql_num_rows($registro)>0){
							while($registro2 = mysql_fetch_array($registro)){
								echo '
									<tbody>
										<tr>
											<td>'.$registro2['apellido'].', '.$registro2['nombre'].'</td>
											<td>'.$registro2['denominacion'].'</td>
											<td>'.$registro2['deno'].'</td>
											<td>'.fechaNormal($registro2['fecha_pedido']).'</td>
											<td>$'.$registro2['precio_vta'].'</td>
										</tr>
                                    </tbody>';
							}
						}else{
							echo '<td>No se encontro resultados</td>';
						}
						echo '</table>
                            </div>
                            <!-- /.table-responsive -->
									';
						?>