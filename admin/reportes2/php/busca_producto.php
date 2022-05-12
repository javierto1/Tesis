
<?php
						include('conexion.php');

						$dato = $_POST['dato'];

						//EJECUTAMOS LA CONSULTA DE BUSQUEDA


						$registro = mysql_query("SELECT * FROM datos_personales WHERE rol='2' AND nombre LIKE '%$dato%' OR documento LIKE '%$dato%' ORDER BY id ASC");

						//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

						echo '
								<div class="dataTable_wrapper">
										<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
											<div class="row">
								
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
															<thead>
									
																<tr role="row">
																		<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 260px;">Nombre</th>
																		<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 150px;">Username</th>
																		<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 150px;">Documento</th>
																		<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Fecha Alta</th>
																		<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 144px;">Fecha Alta</th>
																</tr>
															</thead>							
															';
						if(mysql_num_rows($registro)>0){
														while($registro2 = mysql_fetch_array($registro)){
														echo '
															<tr>
																<td>'.$registro2['apellido'].', '.$registro2['nombre'].'</td>
																<td>'.$registro2['username'].'</td>
																<td>'.$registro2['documento'].'</td>
																<td>'.fechaNormal($registro2['fecha_alta']).'</td>
																<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
															</tr>';
																										}
														}
														else{echo '<tr><td colspan="6">No se encontraron resultados</td></tr>';}
											echo '</div></div></div></div></table>';?>