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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Bandeja de <b><i>Entrada:</i></b><?php $query = mysql_query ("select * from mensajeria WHERE estado='0'"); 
																																				 $result = mysql_num_rows($query); 
																																				 echo '<small> <span class="badge">'.$result.'</span></small>'; ?>
						<a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1>
						
						<div class="panel-body">
                            
						
					
					
                        <!-- /.panel-heading -->
                        <div class="panel-body">
								



							<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
										<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 30px;">#</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 200px;">Emisor</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 260px;">Asunto</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 160px;">Fecha</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Acciones</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$estado=(int) $_GET['id_estado'];
																						
											$query = "	SELECT 	 m.id_mensaje, m.emisor, m.receptor, m.asunto, m.mensaje, m.fecha_mensaje, m.estado,
																 dp.id, dp.apellido, dp.nombre, dp.username, dp.telefono
																 
														
														FROM 	mensajeria m,
																datos_personales dp
														
														WHERE   m.emisor = dp.id AND 
																dp.rol='2' 
																
														 
														ORDER BY fecha_mensaje DESC
														
														LIMIT 5";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											$estado=$registro['estado'];
											
											if ($estado==0) { echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['id_mensaje']."</td> 
                                            <td>".$registro['apellido'].", ".$registro['nombre']."</td>
                                            <td>".$registro['asunto']."</td>
                                            <td>".fecha_horaNormal($registro['fecha_mensaje'])." </td>
											
											<td> 
													<a href='responder_mensaje.php?id_mensaje=$registro[id_mensaje]'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-reply' title='Responder'> </i> </button></a>
													<a href='marcar_como_respondido_enviado.php?id_mensaje=$registro[id_mensaje]&estado=$registro[estado]'><button type='button' class='btn btn-warning btn-circle'><i class='fa fa-reply-all' title='Marcar como Respondido'> </i> </button></a>
													<a href='archivar_mensaje_enviado.php?id_mensaje=$registro[id_mensaje]'> <button type='button' class='btn btn-danger btn-circle'><i class='fa fa-archive' title='Archivar'> </i> </button></a>
											</td>";}
											
											if ($estado==1) { echo "
											
											<td class='sorting_1' >".$registro['id_mensaje']."</td> 
                                            <td>".$registro['apellido'].", ".$registro['nombre']."</td>
                                            <td>".$registro['asunto']."</td>
                                            <td>".fecha_horaNormal($registro['fecha_mensaje'])." </td>
											
											<td> 
													<a href='responder_mensaje.php?id_mensaje=$registro[id_mensaje]'><button type='button' class='btn btn-success btn-circle'><i class='fa fa-check-square-o' title='Mensaje Respondido'> </i> </button></a>
													<a href='marcar_como_respondido_enviado.php?id_mensaje=$registro[id_mensaje]&estado=$registro[estado]'><button type='button' class='btn btn-warning btn-circle'><i class='fa fa-reply-all' title='Marcar como Respondido'> </i> </button></a>
													<a href='archivar_mensaje_enviado.php?id_mensaje=$registro[id_mensaje]'> <button type='button' class='btn btn-danger btn-circle'><i class='fa fa-archive' title='Archivar'> </i> </button></a>
											</td>";}
																			?>
										</tr>
											
											<?php ; } ?>
										
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
		
		