<?php					include('../../includes_admin/dbcon.php');
						include_once "../../includes_admin/fecha_acomodada.php";

						$id_pedido = $_GET['id_pedido'];
						$id_operador = $_GET['id_operador'];
						$fecha_pago = date('Y-m-d');
						$fecha_pago1 = $_GET['fecha_pago'];
						$medio_pago = $_GET['medio_pago'];
						$senia = $_GET['senia'];
						
						//echo 'ID_pedido: '.$id_pedido.'ID_operador: '.$id_operador.'Fecha: '.$fecha_pago.'Medio: '.$medio_pago.'seña: '.$senia.'fecha1: '.$fecha_pago1 ;
						
						mysql_select_db($mysql_database, $conexion);  
						
						//$qry1=mysql_query ("INSERT INTO pagos_pedido(id_pedido,id_operador,fecha_pago,medio_pago,senia) VALUES ('{$id_pedido}','{$id_operador}','{$fecha_pago}','{$medio_pago}','{$senia}')", $conexion);
						echo '
						<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													  <h4 class="modal-title">Histórico de pedido Nº: '.$registro['id_pedido'].' - '.$registro['denominacion'].' - <small>(Se solicitó: <em>'.fechaNormal($registro['fecha_pedido']).'</em>)</small></h4>
						</div>
													<div class="modal-body">
													<form action="senia_pedidos/cargar_senia_pedidos.php" name="customForm" id="customForm" method="post" onsubmit="enviar()" enctype="multipart/form-data">
														<div class="form-group col-lg-12">
															<h3>Pedido N°24</h3><hr>
															<label>Monto a señar</label>
															<input id="id_pedido" name="id_pedido" type="hidden" value="14">
															<input id="senia" class="form-control" name="senia" type="number" value="" placeholder="Monto a señar" required>
															<label>Medio de Pago</label>
															<select class="form-control " name="medio_pago" type="text" required="">
																							<option>EFECTIVO</option>
																							<option>TARJETA DE CREDITO</option>
																							<option>TARJETA DE DEBITO</option>
																							<option>DEPOSITO BANCARIO</option>
																							<option>CHEQUE</option>
																							
															</select>
															<label>Fecha de Pago</label>
																<input id="fecha_pago" class="form-control" name="fecha_pago" type="date" value="" required>
															<hr>
															<button type="submit" class="btn btn-default">Guardar</button>
															<button type="reset" class="btn btn-default">Limpiar</button>
														</div> 
													</form>
														<div>
															
														</div>
													</div>
						</div>
		</div>	
';?>
						