<HTML>
<?php  
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
//$id = $_POST['id']; 
//include "../../includes_admin/botonera_admin.php";
include "../../includes_admin/dbcon.php";  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda</title>
<link href="css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>

<body>
	<div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Reporte Usuarios
						</h1>
						<div class="panel-body">
                            
							<div align="center" class="col-sm-12">
									
									
										
										<section>
											<table border="0" align="center">
												<tr>
													<td width="335">
														<input class="form-control" type="text" placeholder="Busca un producto por: Nombre o Tipo" id="bs-prod"/>
													</td>
													<td>
														<input class="form-control" type="date" id="bd-desde"/>
													</td>
													<td>
														Hasta&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													<td>
														<input class="form-control" type="date" id="bd-hasta"/>
													</td>
													<td width="100">
														<button id="nuevo-producto" class="btn btn-primary">Nuevo</button>
													</td>
													<td width="200">
														<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a>
													</td>
												</tr>
											</table>
										
										</section>
									
									
							<div class="col-lg-12" id="agrega-registros"></div>
								<center>
									<ul class="pagination" id="pagination"></ul>
								</center>
							<hr>
							<hr>

						

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
	<script>

	function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
	}
	</script>
	
</HTML>