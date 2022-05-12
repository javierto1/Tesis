<?php  
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
//$id =$_POST['id']; 
include "../includes_admin/botonera_admin.php";
include "../includes_admin/dbcon.php";  
?>
<html>  
<head>  


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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Proveedor de <?php	$rol=(int) $_GET['categoria']; 
																																			$consulta=mysql_query("select * from materiales where id_materiales ='$rol'");
																																			$producto=mysql_num_rows($consulta);
																																			
																																			if($producto ==0){
																																				
																																				header('Location: http://noconvencional.comli.com/admin/Usuarios/error_rol_inexistente.php');
																																			} else {
																																				 while ($productos =mysql_fetch_array($consulta)){
																																				 echo $productos['denominacion'];
																																				 }
																																			 }
																																			// if($rol == 1) {echo "Papel";
																																				// }elseif($rol == 2)	{echo "Laminado";}
																																					// else if($rol == 3)	{echo "Cartuchos";}
																																			// else{
																																				// header('Location: http://noconvencional.comli.com/admin/Usuarios/error_rol_inexistente.php');		
																																			// }
																																		
																																			?>
						</h1>
						<div class="panel-body">
                            <div align="center" class="col-sm-12">
								
							</div><hr>
							
						<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
								
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 220px;">Nombre</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Apellido</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 192px;">Razon Social</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Email</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Telefono</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Acciones</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$categoria=(int) $_GET['categoria'];;
											
											$query = "select p.id_proveedor, p.nombre, p.apellido, p.razon_social, p.mail, p.telefono from detalle_proveedor d, proveedor p
													where p.id_proveedor = d.id_proveedor and id_materiales='$categoria'"; 
											$result = mysql_query($query); 
											
											while ($registro = mysql_fetch_array($result)){ 
											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['nombre']."</td> 
                                            <td>".$registro['apellido']."</td>
                                            <td>".$registro['razon_social']."</td>
                                            <td>".$registro['mail']."</td>
											<td>".$registro['telefono']."</td>
											<td> <a href='ver_datos_completos.php?id_proveedor=$registro[id_proveedor]?categoria=$categoria'><button type='button' class='btn btn-success btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </button></a>
												
											</td>
											
												
											
											
                                     </tr>
										
										 	"; } ?>
										
										</tbody>
										
									</table>
									
									</div>
								<a href="javascript:history.go(-1);" type="submit" class="btn btn-default" name="B1">Volver</a>
								</div>
								
								</div>
                            <!-- /.table-responsive 
							
                            <div class="well">
								// <?php //echo "<a href='http://noconvencional.comli.com/admin/Actualizar_operador/listado_completo.php?rol=$rol' type='button' class='btn btn-outline btn-primary btn-lg btn-info'><i class='fa fa-th-list'></i> Ver listado completo</a>";   ?>
								
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
		