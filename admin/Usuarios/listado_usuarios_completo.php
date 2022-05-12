<?php  
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
$id = $_POST['id']; 
//include "../includes_admin/botonera_admin.php";
include "../includes_admin/dbcon.php";  
?>
<html>  
<head>  
<TITLE>Muestra los resultados de una consulta MySQL.</TITLE>  

<!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<!-- Bootstrap Core CSS -->
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

</head>  

<body>
	
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Listado Operador - <i>Grafica No Convencional</i>  </h1> 
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
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 238px;">Email</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 192px;">Documento</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Username</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Estado</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Calle</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Nro</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Dpto</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">CP</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Barrio</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Ciudad</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Provincia</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$rol= $_GET['rol'];
											
											$query = "select * from datos_personales where rol='$rol'"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['nombre']."</td> 
                                            <td>".$registro['apellido']."</td>
                                            <td>".$registro['mail']."</td>
                                            <td>".$registro['documento']."</td>
                                            <td>".$registro['username']."</td>
											<td>".$registro['estado']."</td>
											<td>".$registro['calle']."</td>
											<td>".$registro['numero']."</td>
											<td>".$registro['dpto']."</td>
											<td>".$registro['codigo_postal']."</td>
											<td>".$registro['barrio']."</td>
											<td>".$registro['ciudad']."</td>
											<td>".$registro['provincia']."</td>
											
                                        </tr>
										
										"; } ?>
										
										
										
										</tbody>

									</table>
									<i class="fa fa-print">
									<input type="button" name="imprimir" value="Imprimir P&aacute;gina" onclick="window.print();">
									</i>
									</div>
								
								</div>
								
								</div>
                            <!-- 
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>/.table-responsive -->
                        </div>
						<a href="<?=$_SERVER["HTTP_REFERER"]?>" type="submit" class="btn btn-default" name="B1">Volver</a>
			
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
		