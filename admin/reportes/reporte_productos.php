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
<title>Reporte Productos</title>

	<!-- PARA QUE FUNCIONE LA BUSQUEDA POR FECHAS -->
	<script src="js/jquery.js"></script>
	<script src="js/myjava.js"></script>
	
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
                        <h1 class="page-header"><img src="../../images/iconos/Balance.png" height="70px" width="70px">Reporte <b>Productos</b><small> <i></i></small><a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						<div class="panel-body">
                            
							<h4><b>Seleccione la categoria que desea realizar el reporte...</b></h4>
								<div class="row">
								<hr>
											<div class="col-lg-3 col-md-3">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<div class="row">
															<div class="col-xs-3">
																<i class="fa fa-tasks fa-5x"></i>
															</div>
															<div class="col-xs-9 text-right">
																<div class="huge">
																	<?php								
																		$query = mysql_query ("SELECT * from producto WHERE categoria='3'"); 
																		$result = mysql_num_rows($query); 
																		echo $result;
																	?>
																	 
																</div>
																<div>TARJETAS</div>
															</div>
														</div>
													</div>
													<a href="javascript:reporte3PDF();">
														<div class="panel-footer">
															<span class="pull-left"><b>Generar Reporte...</b></span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
														</div>
													</a>
												</div>
											</div>
											
											<div class="col-lg-3 col-md-3">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<div class="row">
															<div class="col-xs-3">
																<i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
															</div>
															<?php								
																		$query = mysql_query ("select * from producto WHERE categoria='1' "); 
																		$result = mysql_num_rows($query); 
																		//$contar = mysql_fetch_assoc $result;
																		?>
																		
																													 
															<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $result;?></div>
																<div>CARPETAS</div>
															</div>
														</div>
													</div>
													<a href="javascript:reporte1PDF();">
														<div class="panel-footer">
															<span class="pull-left"><b>Generar Reporte...</b></span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
														</div>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<div class="row">
															<div class="col-xs-3">
																 <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
															</div>
															<?php								
																		$query = mysql_query ("select * from producto WHERE categoria='6'"); 
																		$result = mysql_num_rows($query); 
																		//$contar = mysql_fetch_assoc $result;
																		?>
																		
															<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $result;?></div>
																<div>IMANES</div>
															</div>
														</div>
													</div>
													<a href="javascript:reporte6PDF();">
														<div class="panel-footer">
															<span class="pull-left"><b>Generar Reporte...</b></span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
														</div>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<div class="row">
															<div class="col-xs-3">
																 <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
															</div>
															<?php								
																		$query = mysql_query ("select * from producto WHERE categoria='5'"); 
																		$result = mysql_num_rows($query); 
																		//$contar = mysql_fetch_assoc $result;
																		?>
																		 
															<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $result;?></div>
																<div>CARTAS/MENU</div>
															</div>
														</div>
													</div>
													<a href="javascript:reporte5PDF();">
														<div class="panel-footer">
															<span class="pull-left"><b>Generar Reporte...</b></span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
														</div>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<div class="row">
															<div class="col-xs-3">
																 <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
															</div>
															<?php								
																		$query = mysql_query ("select * from producto WHERE categoria='4'"); 
																		$result = mysql_num_rows($query); 
																		//$contar = mysql_fetch_assoc $result;
																		?>
																		
															<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $result;?></div>
																<div>HOJAS MEMBRETADAS</div>
															</div>
														</div>
													</div>
													<a href="javascript:reporte4PDF();">
														<div class="panel-footer">
															<span class="pull-left"><b>Generar Reporte...</b></span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
														</div>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<div class="row">
															<div class="col-xs-3">
																<i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
															</div>
															<div class="col-xs-9 text-right">
																<div class="huge">
																<?php								
																		$query = mysql_query ("select * from producto WHERE categoria='7'"); 
																		$result = mysql_num_rows($query); 
																		echo $result;
																	?>
																	
																</div>
																<div>VOLANTES</div>
															</div>
														</div>
													</div>
													<a href="javascript:reporte7PDF();">
														<div class="panel-footer">
															<span class="pull-left"><b>Generar Reporte...</b></span>
															<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
															<div class="clearfix"></div>
														</div>
													</a>
												</div>
											</div>
								</div>
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
	
	<script>
	function reporte1PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var categoria = '1';
	window.open('../reportes/reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta+'&categoria='+categoria);
	}
	</script>
		<script>
	function reporte2PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var categoria ='2';
	window.open('../reportes/reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta+'&categoria='+categoria);
	}
	</script>
	<script>
	function reporte3PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var categoria = '3';
	window.open('../reportes/reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta+'&categoria='+categoria);
	}
	</script>
	<script>
	function reporte4PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var categoria = '4';
	window.open('../reportes/reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta+'&categoria='+categoria);
	}
	</script>
	<script>
	function reporte5PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var categoria = '5';
	window.open('../reportes/reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta+'&categoria='+categoria);
	}
	</script>
	<script>
	function reporte6PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var categoria = '6';
	window.open('../reportes/reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta+'&categoria='+categoria);
	}
	</script>
	<script>
	function reporte7PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var categoria = '7';
	window.open('../reportes/reportes/php/productos/productos_pdf.php?desde='+desde+'&hasta='+hasta+'&categoria='+categoria);
	}
	</script>
</HTML>