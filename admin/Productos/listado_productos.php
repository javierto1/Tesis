<?php  
$id = $_POST['id']; 
include "../includes_admin/botonera_admin.php";
include "../includes_admin/dbcon.php";  
include "../reportes/php/productos/include_busqueda_producto.php";   
?>
<html>  
<head>  
<TITLE>Listado Productos</TITLE>  
	
	<script src="../reportes/js/jquery.js"></script>
	<script src="../reportes/js/myjava_producto.js"></script>
	
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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/><b>Productos</b><?php $query = mysql_query ("select * from producto"); 
																																				 $result = mysql_num_rows($query); 
																																				 echo '<small> <span class="badge">'.$result.'</span></small>'; ?></h1>
						
						<div class="panel-body">
                            
							<div align="center" class="col-sm-12">
								<div class="btn-group ">
									<a href="nuevo_producto.php" type="button" class="btn btn-success"><i class='fa fa-plus' aria-hidden='true' title='Agregar Producto'> </i>  Agregar Producto</a>
									<a href="agregar_especificacion.php" type="button" class="btn btn-success"><i class='fa fa-plus' aria-hidden='true' title='Agregar Especificacion'> </i>  Agregar Especificacion</a>
									<a href="control_precios.php" type="button" class="btn btn-success"><i class='fa fa-plus' aria-hidden='true' title='Agregar Especificacion'> </i> Controlar Precios</a>
									
								</div>
							</div>
							
							
							
							<hr>
							<hr>
						
					
					<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
										<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">Codigo</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 200px;">Producto</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 50px;">Acciones</th>
											</tr>			
										</thead>
										<tbody>
										<?php
											$rol=(int) $_GET['rol'];
											
											$query = "select * from producto"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo 
											"
											"
											?>
											<?php
											
											$estado=$registro['estado'];
											
											if($registro['estado']=='0') {echo "
                                            
											<tr class='gradeA odd' role='row'>
                                            <td class='sorting_1' bgcolor='#F5A9A9' >".$registro['codigo']."</td>
											<td bgcolor='#F5A9A9' >".$registro['denominacion']."</td>
											
											
											
											<td bgcolor='#F5A9A9'>
												<a href='#' data-toggle='tooltip' title='Producto Bloquedo!'><button type='button' class='btn btn-danger btn-circle'><b>B</b></button></a>
												<a href='ver_datos_completos_producto.php?id_producto=$registro[id_producto]'  data-toggle='tooltip' title='Ver más datos'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
												<a href='editar_producto.php?id_producto=$registro[id_producto]' data-toggle='tooltip' title='Editar Producto'> <button type='button' class='btn btn-warning btn-circle'><i class='fa fa-pencil' title='Editar'> </i> </button></a>
												<a href='cambiar_estado.php?id_producto=$registro[id_producto]&estado=$registro[estado]' data-toggle='tooltip' title='Desbloquear Producto'><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-unlock' aria-hidden='true' title='Cambiar Estado'> </i> </button></a>
												
											
											</td></tr>";} 
													
													
											if($registro['estado']=='1') {echo "
										
										<tr class='gradeA odd' role='row'>
                                            
											
											<td class='sorting_1' >".$registro['codigo']."</td>
											<td class='sorting_1' >".$registro['denominacion']."</td>
											
											
											<td>
												<a href='#' data-toggle='tooltip' title='Producto Disponible!'><button type='button' class='btn btn-default btn-circle'><b>D</b></button></a>
												<a href='ver_datos_completos_producto.php?id_producto=$registro[id_producto]' data-toggle='tooltip' title='Ver más datos'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
												<a href='editar_producto.php?id_producto=$registro[id_producto]' data-toggle='tooltip' title='Editar Producto'> <button type='button' class='btn btn-warning btn-circle'><i class='fa fa-pencil' title='Editar'> </i> </button></a>
												<a href='cambiar_estado.php?id_producto=$registro[id_producto]&estado=$registro[estado]' data-toggle='tooltip' title='Bloquear Producto'><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-lock' aria-hidden='true' title='Cambiar Estado'> </i> </button></a>
											</td>
										</tr>";}}?>
										
										</tbody>
										
									</table>
									
									</div>
								
								</div>
								
								</div>
                            <!-- /.table-responsive -->
							
                            <div class="well">
								<?php echo "<a target='_blank' href='javascript:reportePDF();' type='button' class='btn btn-outline btn btn-danger'><i class='fa fa-th-list'></i> Exportar a PDF</a>";   ?>
							</div>			
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
	