<?php
include_once "../includes_admin/botonera_admin.php";
include_once "../includes_admin/dbcon.php";  
include_once "../includes_admin/fecha_acomodada.php";
?>

<html>  
<head>  
<TITLE>Bandeja de Entrada:</TITLE>  

<!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    

</head>  

<body>
	<div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Responder <b><i>Mensaje:</i></b>
						<a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1>
						
						
                        <!-- /.panel-heading -->
                        <div class="panel-body">
								
							<div class="row">
							
								<div class="col-sm-12">
									
										<tbody>
											<?php
											
											$id_mensaje=(int) $_GET['id_mensaje'];
											$emisor= 58;
											//$emisor= ; LO CARGAMOS DE LA SESSION
											
											$query = "	SELECT 	 m.id_mensaje, m.emisor, m.receptor, m.asunto, m.mensaje, m.fecha_mensaje, m.estado,
																 dp.id, dp.apellido, dp.nombre, dp.username, dp.telefono
																 
														
														FROM 	mensajeria m,
																datos_personales dp
														
														WHERE   m.emisor = dp.id AND
																m.id_mensaje = '$id_mensaje'";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo '
											
											<div class="col-lg-6">
												<div class="panel panel-default">
													<div class="panel-heading">
														<span class=""><u>Emisor</u>: '.$registro['username'].'</span>
														<span class="pull-right"><u>Fecha</u>: <small>'.fechaNormal($registro['fecha_mensaje']).'</small></span>
													</div>
													<div class="panel-body">
														<span class=""><u>Asunto</u>: </span>'.$registro['asunto'].'<br><br>
														<span class=""><u>Mensaje</u>: </span> <p>'.$registro['mensaje'].'</p>
													</div>
													
												</div>
											</div>
											
											'?> <?php $estado=$registro['estado'];
											
											if ($estado==0) { echo '
											
											
											
											<form action="responder_mensaje_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
											
											<input type="hidden" name="emisor" value="'.$emisor.'"/>
											<input type="hidden" name="receptor" value="'.$registro['id'].'"/>
											<input type="hidden" name="respuesta_del" value="'.$id_mensaje.'"/>
											<input type="hidden" name="id_mensaje" value="'.$id_mensaje.'"/>
											
											<div class="well col-lg-6">
											<h5><b>Respuesta:</b></h5>
											<hr>
														<label for="comment">Asunto:</label>
														<div class="form-group input-group">
														<span class="input-group-addon">Asunto:</span>
														   <input class="form-control" name="asunto" value="Respuesta a: '.$registro['asunto'].'" type="text" required>
														</div>
														<div class="form-group input-group">
															<label for="comment">Mensaje:</label>
															<textarea class="form-control" rows="5" name="mensaje" id="comment" style="margin: 0px; height: 75px; width: 460px;"></textarea>
															
														</div>
														
													<hr>
													<button type="submit" class="btn btn-default">ENVIAR</button>
													<button href="javascript:history.go(-1);" type="button" class="btn btn-default" >CANCELAR</button>
											</div>
											</form>' ;}
											
											if ($estado==1) { 	$query = "	SELECT 	m.id_mensaje, m.emisor, m.receptor, m.asunto, m.mensaje, m.fecha_mensaje, m.estado, m.respuesta_del,
																					dp.id, dp.apellido, dp.nombre, dp.username, dp.telefono
																 
																				
																			FROM 	mensajeria m,
																					datos_personales dp
																				
																			WHERE   m.emisor = dp.id AND
																					
																					m.respuesta_del = $id_mensaje";
																	
																	
																	$result = mysql_query($query); 
							
																	while ($registro = mysql_fetch_array($result)){ 
																	
																	echo '
																	
																	
																	<div class="col-lg-6">
																	
																	<div class="alert alert-success alert-dismissable">
																		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																		Mensaje Respondido.
																	</div>
																	
																		<div class="panel panel-green">
																			<div class="panel-heading">
																				<span class=""><u>Emisor</u>: '.$registro['username'].'</span>
																				<span class="pull-right"><u>Fecha</u>: <small>'.fechaNormal($registro['fecha_mensaje']).'</small></span>
																			</div>
																			<div class="panel-body">
																				<span class=""><u>Asunto</u>: </span>'.$registro['asunto'].'<br><br>
																				<span class=""><u>Respuesta</u>: </span> <p>'.$registro['mensaje'].'</p>
																			</div>
																		</div>
																	</div> ';}?>
									
											
											<?php ; }} ?>
											
											
											
											
										</tbody>
										
									</table>
									
								</div>
								
							</div>
								
						</div>
                            <!-- /.table-responsive 
							<div class="well">
								<?php // echo "<a target='_blank' href='#' type='button' class='btn btn-outline btn btn-danger' data-toggle='modal' data-target='#myModalPedidosFechas'><i class='fa fa-th-list'></i> Exportar a PDF</a>";   ?>
							</div>-->
							
					</div> 
				</div> 
			</div>
	</div>
</body>
	<!-- jQuery -->
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
	
	<!-- Tooltip JavaScript -->
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
		
		