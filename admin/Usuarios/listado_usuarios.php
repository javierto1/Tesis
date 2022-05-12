<?php  
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
$id = $_POST['id']; 
include_once "../includes_admin/botonera_admin.php";
include_once "../includes_admin/dbcon.php"; 
include_once "../reportes/php/clientes/include_busqueda_cliente.php";   
include_once "includes_clientes/include_ver_mas_cliente.php";
?>
<html>  
<head>  

	<!-- PARA QUE FUNCIONE LA BUSQUEDA POR FECHAS -->
	<script src="../js/jquery.js"></script>
	<script src="../reportes/js/myjava.js"></script>
	<script src="js/myjava1.js"></script>
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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/><?php	$rol=(int) $_GET['rol']; 
																																			if($rol==1) {echo "<b>Operadores</b>";?>
																																					<?php   $query = mysql_query ("select * from datos_personales where rol='1'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($rol==2)	{echo "<b>Clientes</b>";?>
																																					<?php   $query = mysql_query ("select * from datos_personales where rol='2'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($rol==0)	{echo "<b>Administradores</b>";?>
																																					<?php   $query = mysql_query ("select * from datos_personales where rol='0'"); 
																																							$result = mysql_num_rows($query); 
																																							echo '<small> <span class="badge">'.$result.'</span></small>';} ?><?php  
																																			if($rol>=3)	{header('Location: http://noconvencional.comli.com/admin/Usuarios/error_rol_inexistente.php');}

																																			else if ($rol!=0 & 1 & 2) {echo "ERROR";}																																	
																																				?>
						<span class="pull-top">
									
										
											 
											<?php	$rol=(int) $_GET['rol'];
											if($rol==1) {echo "<tr><td width='200'><a href='nuevo_operador.php' type='button' class='btn btn-success pull-right'><i class='fa fa-user' aria-hidden='true' title='Agregar Nuevo Operador'> </i>  Agregar Operador</a></td></tr>";
														} 
											if($rol==2) {echo "<tr><td width='200'><a href='nuevo_cliente.php' type='button' class='btn btn-success pull-right'><i class='fa fa-user' aria-hidden='true' title='Agregar Nuevo Cliente'> </i>  Agregar Cliente</a></td></tr>";
														}
											
											?>
										
								</span>
						</h1>
						<div class="panel-body">
                         
							
							
						<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
							<div class="row">
								
								<div class="col-sm-12">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 220px;">Nombre</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Apellido</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 192px;">Documento</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Username</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 200px;">Acciones</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$rol=(int) $_GET['rol'];
											
											$query = "select * from datos_personales where rol='$rol'"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo 
											"
											"
											?>
											<?php
											
											$estado=$registro['estado'];
											
											if($registro['estado']=='bloqueado') {echo "<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' bgcolor='#F5A9A9'>".$registro['nombre']."</td> 
                                            <td bgcolor='#F5A9A9'>".$registro['apellido']."</td>
                                            <td bgcolor='#F5A9A9'>".$registro['documento']."</td>
                                            <td bgcolor='#F5A9A9'>".$registro['username']."</td>
											
											
											<td bgcolor='#F5A9A9'> 
												<input type='hidden' name='bd-rol' id='bd-rol' value='".$rol."'/>
												<a href='#' data-toggle='tooltip' title='Usuario Bloquedo!'><button type='button' class='btn btn-danger btn-circle'><b>B</b></button></a>
												<a href='ver_datos_completos.php?id=$registro[id]&rol=$rol'' data-toggle='tooltip' title='Ver más datos'><button name='ver_mas' value='".$rol."' id='".$registro['id']."' type='button' class='btn btn-info btn-circle' ><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
												<a href='actualizar_datos.php?id=$registro[id]&rol=$rol'> <button type='button' class='btn btn-warning btn-circle' data-toggle='tooltip' data-placement='top' title='Editar Datos Usuario'><i class='fa fa-pencil' > </i> </button></a>
												<a href='cambiar_estado.php?id=$registro[id]&estado=$registro[estado]&rol=$rol'><button type='button' class='btn btn-danger btn-circle' data-toggle='tooltip' data-placement='top' title='Desbloquear Usuario'><i class='fa fa-unlock' aria-hidden='true' ></i> </button></a>
											</td></tr>";} 
													
													
											if($registro['estado']=='desbloqueado') {echo "<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['nombre']."</td> 
                                            <td>".$registro['apellido']."</td>
                                            <td>".$registro['documento']."</td>
                                            <td>".$registro['username']."</td>
											 
											<td> 
												<a href='#' data-toggle='tooltip' title='Usuario Activo!'><button type='button' class='btn btn-default btn-circle'><b>A</b></button></a>
												<a href='ver_datos_completos.php?id=$registro[id]&rol=$rol'' data-toggle='tooltip' title='Ver más datos'><button name='ver_mas' value='".$rol."' id='".$registro['id']."' type='button' class='btn btn-info btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
												<a href='actualizar_datos.php?id=$registro[id]&rol=$rol'> <button type='button' class='btn btn-warning btn-circle' data-toggle='tooltip' data-placement='top' title='Editar Datos Usuario'><i class='fa fa-pencil' > </i> </button></a>
												<a href='cambiar_estado.php?id=$registro[id]&estado=$registro[estado]&rol=$rol'><button type='button' class='btn btn-danger btn-circle' data-toggle='tooltip' data-placement='top' title='Bloquear Usuario'><i class='fa fa-lock' aria-hidden='true' ></i> </button></a>
											</td></tr>";}}?>
										
										</tbody>
										
									</table>
									
									</div>
								
								</div>
								
							</div>
                            <!-- /.table-responsive -->
							
                            <div class="well">
								<?php echo "<a target='_blank' type='button' class='btn btn-outline btn btn-danger' data-toggle='modal' data-target='#myModal'><i class='fa fa-th-list'></i> Exportar a PDF</a>";   ?>
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
	
		