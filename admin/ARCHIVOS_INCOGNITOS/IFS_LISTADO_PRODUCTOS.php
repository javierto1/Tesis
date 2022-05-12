<?php
											$rol=(int) $_GET['rol'];
											
											$query = "select * from producto"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											$estado=$registro['estado'];
											
											if($estado=='1') 
															{echo "<tr role='row' class='danger'>";} 
													if($estado=='0')
															{echo "<tr role='row' class='gradeA odd'>";}
											echo "</tr>
													<td class='sorting_1'>".$registro['codigo']."</td>
													<td>".$registro['denominacion']."</td>
													<td>";
										
											if($estado=='1') 
														{echo "	<a href='#' data-toggle='tooltip' title='Producto Bloquedo!'><button type='button' class='btn btn-danger btn-circle'><b>B</b></button></a>
																<a href='ver_datos_completos_producto.php?id_producto=$registro[id_producto]'  data-toggle='tooltip' title='Ver más datos'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
																<a href='editar_producto.php?id_producto=$registro[id_producto]' data-toggle='tooltip' title='Editar Producto'> <button type='button' class='btn btn-warning btn-circle'><i class='fa fa-pencil' title='Editar'> </i> </button></a>
																<a href='cambiar_estado.php?id_producto=$registro[id_producto]&estado=$registro[estado]' data-toggle='tooltip' title='Desbloquear Producto'><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-unlock' aria-hidden='true' title='Cambiar Estado'> </i> </button></a>";} 
											if($estado=='0')
														{echo "	<a href='#' data-toggle='tooltip' title='Producto Disponible!'><button type='button' class='btn btn-default btn-circle'><b>D</b></button></a>
																<a href='ver_datos_completos_producto.php?id_producto=$registro[id_producto]' data-toggle='tooltip' title='Ver más datos'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
																<a href='editar_producto.php?id_producto=$registro[id_producto]' data-toggle='tooltip' title='Editar Producto'> <button type='button' class='btn btn-warning btn-circle'><i class='fa fa-pencil' title='Editar'> </i> </button></a>
																<a href='cambiar_estado.php?id_producto=$registro[id_producto]&estado=$registro[estado]' data-toggle='tooltip' title='Bloquear Producto'><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-lock' aria-hidden='true' title='Cambiar Estado'> </i> </button></a>";} 
											echo "</td>";} ?>