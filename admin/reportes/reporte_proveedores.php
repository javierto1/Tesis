<HTML>
<?php  
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
//$id = $_POST['id']; 
include "../includes_admin/botonera_admin.php";
include "../includes_admin/dbcon.php";  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Proveedores</title>

	<!-- PARA QUE FUNCIONE LA BUSQUEDA POR FECHAS -->
	<script src="../js/jquery.js"></script>
	<script src="reportes/js/myjava_proveedor.js"></script>
	<script src="..../Usuarios/js/myjava1.js"></script>
	
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
                        <h1 class="page-header"><img src="../../images/iconos/Balance.png" height="70px" width="70px">Reporte <b>Proveedores</b><small></small><a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						<div class="panel-body">
                            
							<div align="center" class="col-sm-12">
										
									
									<section>
											<table border="0" align="center">
												<tr>
													<form>
													
														
													
													<td>
														&nbsp;&nbsp;&nbsp;&nbsp;Desde:&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													<td>
														<input class="form-control" type="date" id="bd-desde"/>
													</td>
													<td>
														&nbsp;&nbsp;&nbsp;&nbsp;Hasta:&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													<td>
														<input class="form-control" type="date" value="<?php echo $fecha=date('Y-m-d');?>" id="bd-hasta"/>
													</td>
													<td>
														&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													
													<td width="200">
														<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Búsqueda a PDF</a>
													</td>
													<td >
														<button class="btn btn-default btn-xs" type="reset">Borrar Filtro</a>
													</td>
													</form>
												</tr>
											</table>
										
									</section>
									<hr>
									<div class="panel panel-default">
										<div class="panel-body" id="agrega-registros"> </div>
									</div>
									
										
								
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

<?php	
include "../reportes/php/clientes/include_busqueda_cliente.php";  
?>
	
	
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
	
	
</HTML>