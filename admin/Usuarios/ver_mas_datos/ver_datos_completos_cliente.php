
<?php  	
		include "../../includes_admin/dbcon.php";
		
		$id = $_GET['id']; 
		$rol=(int) $_GET['rol'];
		
		//echo $rol;
		$query = "select * from datos_personales WHERE id='$id'"; 
		$result = mysql_query($query); 

		while ($registro = mysql_fetch_array($result)){ 

		echo '
			<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Datos Completos de: <b>'.$registro['apellido'].', '.$registro['nombre'].'</b></h4>
			</div>
			<div class="modal-body">
							
							
						<div class="panel panel-default">
							<div class="panel-heading">
								Datos Personales
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
											<tr>
												<td>Nombre: <b>'.$registro['apellido'].', '.$registro['nombre'].'</b></td>
												<td colspan="2">E-mail/Usuario: <b>'.$registro['mail'].'</b></td>
												<td>Telefono: <b>'.$registro['telefono'].'</b></td>
												<td></td>
											</tr>
											<tr>
												<td><b>'.$registro['tipo_documento'].' N°: <b><i>'.$registro['documento'].'</i></b></b></td>
												<td>Provincia: <b>'.$registro['provincia'].'</b></td>
												<td colspan="2">Ciudad: <b>'.$registro['ciudad'].'</b></td>
												<td></td>
											</tr>
											<tr>
												<td>Barrio: <b>'.$registro['barrio'].'</b><small> CP: <b> '.$registro['codigo_postal'].'</small></b> </td>
												<td>Calle: <b>'.$registro['calle'].' '.$registro['numero'].'</b></td>
												<td>Dpto: <b>'.$registro['dpto'].'° '.$registro['letra'].' '.$registro['n'].'</b></td>
												<td></td>
												
											</tr>
											<tr>
												<td colspan="4"> <h4><b>Cuenta</b></h4> </td>
											</tr>
											<tr>
												<td>Usuario: <b>'.$registro['username'].'</b></td>
												<input type="hidden" id="pwd" value="'.$registro['password'].'" name="password">
												<td>Fecha Alta: <b>'.$registro['fecha_alta'].'</b></td>
												'; }?><?php $rol=(int) $_GET['rol']; 
												if($rol==1) {echo "<td>Rol: <b>Operador</b></td>";} 
												if($rol==2)	{echo "<td>Rol: <b>Cliente</b></td>";}
												if($rol==0)	{echo "<td>Rol: <b>Administrador</b></td>";}
												if($rol>=3)	{header('Location: http://noconvencional.comli.com/admin/Usuarios/error_rol_inexistente.php');}?><?php echo"
											</tr>
										</tbody>
									</table>
								</div>
                            <!-- /.table-responsive -->

							</div>
                        
						</div>
						
                    
                <div class='panel panel-default'>
							<div class='panel-heading'>
								Historico Pedidos del Cliente
							</div>
                           
                            <div id='graph'></div>								
                        
                </div>
				</div>
                                
								
                </div>
               ";?>
