<?php  
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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Valor <b><i>Hora-Trabajo</i></b><?php $query = mysql_query ("select * from horas_hombre"); 
																																				 $result = mysql_num_rows($query); 
																																				 echo '<small> <span class="badge">'.$result.'</span></small>'; ?>
						<a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1>
						
						<div class="panel-body">
                            
							<div align="center" class="col-sm-12">
								<div class="btn-group pull-right">
									<a href='nuevo_trabajo.php' type="button" class="btn btn-success"><i class='fa fa-plus' aria-hidden='true' title='Agregar Trabajo'> </i>  Agregar Trabajo</a>
									</div>
							</div>
							<hr>
							<hr>
						
					
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Trabajos disponibles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Trabajo</th>
                                            <th>Precio</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
											//$rol=(int) $_GET['rol'];
											
											$query = "select * from horas_hombre "; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo " 
										<tr>
                                            <td>".$registro['id_trabajo']."</td>
                                            <td>".$registro['trabajo']."</td>
                                            <td> $ ".$registro['precio']."</td>
                                            <td>
												<a href='actualizar_precio_trabajo.php?id_trabajo=$registro[id_trabajo]'> <button type='button' class='btn btn-info btn-circle'><i class='fa fa-pencil' title='Editar'> </i> </button></a>
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
		