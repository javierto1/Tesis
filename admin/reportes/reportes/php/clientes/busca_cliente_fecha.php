<?php
						
						require('../../../../includes_admin/dbcon.php');
						require('../../../../includes_admin/fecha_acomodada.php');

						$desde = $_POST['desde'];
						$hasta = $_POST['hasta'];
						$rol = $_POST['rol'];
						
						//COMPROBAMOS QUE LAS FECHAS EXISTAN
						if(isset($desde)==false){
							$desde = $hasta;
						}

						if(isset($hasta)==false){
							$hasta = $desde;
						}

						//EJECUTAMOS LA CONSULTA DE BUSQUEDA

						$registro = mysql_query("SELECT * FROM datos_personales WHERE rol='$rol' AND fecha_alta BETWEEN '$desde' AND '$hasta' ORDER BY id ASC");

						//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

						echo '
								<div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Username</th>
                                            <th>Documento</th>
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
											<td>'.$registro2['username'].'</td>
											<td>'.$registro2['documento'].'</td>
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