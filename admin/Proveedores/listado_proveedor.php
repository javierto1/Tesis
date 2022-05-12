<?php  
$id = $_POST['id']; 
include "../includes_admin/botonera_admin.php";
include "../includes_admin/dbcon.php";  
include "../reportes/php/proveedores/include_busqueda_proveedor.php";  
?>
<html>  
<head>  
<TITLE>Listado Proveedor</TITLE>  

	<!-- PARA QUE FUNCIONE LA BUSQUEDA POR FECHAS -->
	<script src="../js/jquery.js"></script>
	<script src="../reportes/js/myjava_proveedor.js"></script>
	
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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/><b>Proveedores</b><?php $query = mysql_query ("select * from proveedor"); 
																																				 $result = mysql_num_rows($query); 
																																				 echo '<small> <span class="badge">'.$result.'</span></small>'; ?>
						<div class="btn-group pull-right">
									<a href="nuevo_proveedor.php" type="button" class="btn btn-success"><i class='fa fa-plus' aria-hidden='true' title='Agregar Nuevo Operador'> </i>  Agregar Proveedor</a>
									
								</div>
						</h1>
						<div class="panel-body">
                            
							
							
						<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
								
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 220px;">Nombre</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Apellido</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 238px;">Razon Social</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 192px;">CUIT/CUIL</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">E-mail</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Telefono</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Acciones</th>
											</tr>
										</thead>
										<tbody>
										<?php
											//$rol=(int) $_GET['rol'];
											
											$query = "select * from proveedor "; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['nombre']."</td> 
                                            <td>".$registro['apellido']."</td>
                                            <td>".$registro['razon_social']."</td>
                                            <td>".$registro['cuit']."</td>
                                            
											<td>".$registro['mail']."</td>
											<td>".$registro['telefono']."</td>
											
											<td> <a href='ver_datos_completos.php?id_proveedor=$registro[id_proveedor]'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
												 <a href='actualizar_proveedor.php?id_proveedor=$registro[id_proveedor]'> <button type='button' class='btn btn-warning btn-circle'><i class='fa fa-pencil' title='Editar'> </i> </button></a>
												 
											</td>
											
												
											
											
                                        </tr>
										
											"; } ?>
										
										</tbody>
										
									</table>
									
									</div>
								
								</div>
								
								</div>
                           <div class="well">
								<?php echo "<a target='_blank' type='button' class='btn btn-outline btn btn-danger' data-toggle='modal' data-target='#myModalProveedor'><i class='fa fa-th-list'></i> Exportar a PDF</a>";   ?>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
		