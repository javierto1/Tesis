<?php
						
						require('../../../../includes_admin/dbcon.php');
						require('../../../../includes_admin/fecha_acomodada.php');

						$desde = $_POST['desde'];
						$hasta = $_POST['hasta'];

						//COMPROBAMOS QUE LAS FECHAS EXISTAN
						if(isset($desde)==false){
							$desde = $hasta;
						}

						if(isset($hasta)==false){
							$hasta = $desde;
						}

						//EJECUTAMOS LA CONSULTA DE BUSQUEDA

						$registro = mysql_query("SELECT * FROM proveedor WHERE fecha_alta BETWEEN '$desde' AND '$hasta' ORDER BY fecha_alta ASC");

						//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

						echo '
								<div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                           <th>Nombre</th>
                                            <th>Razón Social</th>
											<th>CUIT/CUIL</th>
                                            <th>E-mail</th>
											<th>Teléfono</th>
											<th>Fecha Alta</th>
                                        </tr>
                                    </thead>							
															';
						if(mysql_num_rows($registro)>0){
							while($registro2 = mysql_fetch_array($registro)){
								echo '
									<tbody>
										<tr>
											<td>'.$registro2['apellido'].', '.$registro2['nombre'].'</td>
											<td>'.$registro2['razon_social'].'</td>
											<td>'.$registro2['cuit'].'</td>
											<td>'.$registro2['mail'].'</td>
											<td>'.$registro2['telefono'].'</td>
											<td>'.fechaNormal($registro2['fecha_alta']).'</td>
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