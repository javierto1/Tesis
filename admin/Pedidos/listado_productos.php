<?php  
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }

$id_cliente=$_SESSION['usuario'];
$id = $_POST['id']; 
include "../includes_admin/botonera_admin.php";
include "../includes_admin/dbcon.php";  
?>
<html>  
<head>  
<TITLE>Hora trabajo Hombre</TITLE>  

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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Listado Productos</h1>
						
						<div class="panel-body">
                            <div align="center" class="col-sm-12">
								<span class="pull-top">
									
										<a class="button button-pill button-royal" href="http://noconvencional.comli.com/admin/Productos/nuevo_producto.php">
											<img src="../../images/iconos/Mas.png" height="35px" width="35px">Agregar Producto
										</a>
										
										
								</span>
							</div>
							<hr>
						
					
					<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
										<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">Codigo</th>
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
											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            <td class='sorting_1' >".$registro['codigo']."</td>
											<td class='sorting_1' >".$registro['denominacion']."</td> 
											
                                           
                                            
											<td> <a href='editar_producto.php?id_producto=$registro[id_producto]'><button type='button' class='btn btn-success btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
												 <a href='editar_producto.php?id_producto=$registro[id_producto]'> <button type='button' class='btn btn-info btn-circle'><i class='fa fa-pencil' title='Editar'> </i> </button></a>
												 <a href='cambiar_estado.php?id=$registro[id]&estado=$registro[estado]&rol=$rol'><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-trash' title='Cambiar Estado'> </i> </button></a>
												
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
								<?php //echo "<a href='http://noconvencional.comli.com/admin/Usuarios/listado_usuarios_completo.php?rol=$rol' type='button' class='btn btn-outline btn-primary btn-lg btn-info'><i class='fa fa-th-list'></i> Ver listado completo</a>";   ?>
								
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
		