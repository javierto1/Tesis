
<?php  
	include "../../includes_admin/dbcon.php";
	
	$id_detalle =(int) $_GET['id_detalle']; 
	//$id_detalle =183; 
																						
										$query = "	SELECT	df.id_detalle, df.cantidad, df.id_facturas as id_factura_variable, df.material, df.tamano, df.precio_compracm2, df.lote,
															f.id_facturas, f.id_proveedor, f.tipo, f.numero, f.fecha,
															m.id_materiales, m.denominacion,
															p.id_proveedor, p.nombre, p.apellido, p.razon_social, p.mail, p.telefono, p.calle, p.numero as n, p.barrio 
															
													FROM 	detalle_facturas df, facturas f, materiales m, proveedor p
																
																
													WHERE 	df.id_facturas = f.id_facturas AND
															df.material = m.id_materiales AND
															f.id_proveedor = p.id_proveedor AND
															df.id_detalle='$id_detalle'";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											$id_facturas = $registro['id_factura_variable'];
											
											echo '
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													  <h4 class="modal-title">Factura Tipo: '.$registro['tipo'].' // Nº: '.$registro['numero'].'<small> // Fecha: '.$registro['fecha'].'</small></b></h4>
													</div>
													<div class="modal-body">

                       
						<div class="panel panel-default">
							<div class="panel-heading">
								Detalle Factura
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
											
											<tr>
												<td colspan="3"> <h4><b>Proveedor:</b></h4> </td>
											</tr>
											<tr>
												<td>Nombre: <b>'.$registro['apellido'].', '.$registro['nombre'].'</b></td>
												<td>Razón Social: <b>'.$registro['razon_social'].'</b></td>
												<td>Teléfono:<b>'.$registro['telefono'].'</b></td>
											</tr>
											<tr>
												<td>Dirección: <b> '.$registro['calle'].' '.$registro['n'].'</b></td>
												<td>Barrio: <b>'.$registro['barrio'].'</b></td> 
												<td>E-mail: <b>'.$registro['mail'].'</b></td> 
											</tr>
											
											'?>
											<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
																	<th>Material</th>
																	<th>Cantidad</th>
																	<th>Tamaño</th>
																	<th>Lote</th>
																	<th>Precio</th>
													</tr>
												</thead>
												<tbody>
												<?php 	//$id_facturas= $_GET['id_facturas'];
														
														$query = "	SELECT 	df.id_detalle, df.cantidad, df.id_facturas, df.material, df.tamano, df.precio_compracm2, df.lote,
																			m.id_materiales, m.denominacion
																			
																	FROM 	detalle_facturas df, materiales m
																	
																	WHERE 	df.material = m.id_materiales AND
																			id_facturas=$id_facturas"; 
														$result = mysql_query($query); 
	
														while ($registro = mysql_fetch_array($result)){ 
														echo "
														 
														<tr class='gradeA odd' role='row'>
                                            
															<td class='sorting_1' >".$registro['denominacion']."</td> 
															<td><b>x</b> ".$registro['cantidad']."</td>
															<td>".$registro['tamano']." <b>cm2</b></td>
															<td>".$registro['lote']."</td>
															<td>$ ".$registro['precio_compracm2'].",00</td>
														</tr>
															
															
															
															";}} ?>
												</tbody>
											</table>
											</div>
										<!-- /.table-responsive -->
							</div>
                        
						</div>
						
						
                                
								
                </div>
	</div>
