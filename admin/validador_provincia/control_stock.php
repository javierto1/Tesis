<?php  
//$id = $_POST['id']; 
include "includes_admin/botonera_admin.php";
include('../includes_admin/dbcon.php');   
?>
<html>  
<head>  
<TITLE>Muestra los resultados de una consulta MySQL.</TITLE>  

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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Listado Operador</h1>
						<div class="panel-body">
                            
							
						<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
								
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 220px;">Material</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Tamaño cm2</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 238px;">Precio Compra</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 192px;">Precio Venta</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Cantidad Comprada</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Cantidad Restante</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Fecha Compra</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Fecha Compra</th>

											</tr>
										</thead>
										<tbody>
										<?php
											$rol=(int) $_GET['rol'];
											
											$query = "select * from stock"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['material']."</td> 
                                            <td>".$registro['tamanoCM2']."</td>
                                            <td>".$registro['precio_compracm2']."</td>
                                            <td>".$registro['precio_ventacm2']."</td>
                                            <td>".$registro['cantidad']."</td>
											<td>".$registro['cantidad_hoy']."</td>
											td>".$registro['fehca_compra']."</td>
											<td><a href='actualizar_operador.php?id=$registro[id]'> <button type='button' class='btn btn-info btn-circle'><i class='fa fa-pencil-square-o' title='Editar'> </i> </button></a>
												 <button type='button' class='btn btn-success btn-circle'><i class='fa fa-check' title='Desbloquear'> </i> </button>
												 <a href='cambiar_estado.php?id=$registro[id]&estado=$registro[estado]&rol=$rol'><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-exchange' title='Cambiar Estado'> </i> </button></a>
											</td>
												
											
											
                                        </tr>
										
											"; } ?>
										
										</tbody>
										
									</table>
									
									</div>
								
								</div>
								
								</div>
                            <!-- /.table-responsive -->
							
                            <div class="well">
								<?php //echo "<a href='http://noconvencional.comli.com/admin/Actualizar_operador/listado_operador_completo.php?rol=$rol' type='button' class='btn btn-outline btn-primary btn-lg btn-info'><i class='fa fa-th-list'></i> Ver listado completo</a>";   ?>
								
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
		