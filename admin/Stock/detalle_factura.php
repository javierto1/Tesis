<?php  
//$id = $_POST['id']; 
include_once "../includes_admin/botonera_admin.php";
include_once "../includes_admin/dbcon.php";

?>
<html>  
<head>  
<TITLE>Muestra los resultados de una consulta MySQL.</TITLE>  
	
	<!-- PARA QUE FUNCIONE LA BUSQUEDA POR FECHAS Y VER MAS DATOS -->
	<script src="../js/jquery.js"></script>
	<script src="js/myjava1.js"></script>
	<script src="../reportes/js/myjava_pedido.js"></script>

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
						<h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Detalle de <b>Factura</b><a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1> 
	
	<?php  
	$id_detalle =(int) $_GET['id_detalle']; 
	//$id_detalle =183; 
																						
										$query = "	SELECT	df.id_detalle, df.cantidad, df.id_facturas as id_factura_variable, df.material, df.tamano, df.precio_compracm2, df.lote,
															f.id_facturas, f.id_proveedor, f.tipo, f.numero, f.fecha,
															m.id_materiales, m.denominacion,
															p.id_proveedor, p.nombre, p.apellido, p.razon_social, p.mail, p.telefono, p.calle, p.numero as n, p.barrio 
															
													FROM 	detalle_facturas df, facturas f, materiales m, proveedor p
																
																
													WHERE 	df.id_facturas = f.id_facturas AND
															df.material = m.id_materiales AND
															f.id_proveedor = p.id_proveedor AND
															df.id_detalle='$id_detalle'";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											$id_facturas = $registro['id_factura_variable'];
											
											echo '
													

                       
						<div class="panel panel-default">
							<div class="panel-heading">
								Factura Tipo: '.$registro['tipo'].' // Nº: '.$registro['numero'].'<small> // Fecha: '.$registro['fecha'].'</small></b>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
											
											<tr>
												<td colspan="3"> <h4><b>Proveedor:</b></h4> </td>
											</tr>
											<tr>
												<td>Nombre: <b>'.$registro['apellido'].', '.$registro['nombre'].'</b></td>
												<td>Razón Social: <b>'.$registro['razon_social'].'</b></td>
												<td>Teléfono:<b>'.$registro['telefono'].'</b></td>
											</tr>
											<tr>
												<td>Dirección: <b> '.$registro['calle'].' '.$registro['n'].'</b></td>
												<td>Barrio: <b>'.$registro['barrio'].'</b></td> 
												<td>E-mail: <b>'.$registro['mail'].'</b></td> 
											</tr>
											
											'?>
											<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
																	<th>Material</th>
																	<th>Cantidad</th>
																	<th>Tamaño</th>
																	<th>Lote</th>
																	<th>Precio</th>
													</tr>
												</thead>
												<tbody>
												<?php 	//$id_facturas= $_GET['id_facturas'];
														
														$query = "	SELECT 	df.id_detalle, df.cantidad, df.id_facturas, df.material, df.tamano, df.precio_compracm2, df.lote,
																			m.id_materiales, m.denominacion
																			
																	FROM 	detalle_facturas df, materiales m
																	
																	WHERE 	df.material = m.id_materiales AND
																			id_facturas=$id_facturas"; 
														$result = mysql_query($query); 
	
														while ($registro = mysql_fetch_array($result)){ 
														echo "
														 
														<tr class='gradeA odd' role='row'>
                                            
															<td class='sorting_1' >".$registro['denominacion']."</td> 
															<td><b>x</b> ".$registro['cantidad']."</td>
															<td>".$registro['tamano']." <b>cm2</b></td>
															<td>".$registro['lote']."</td>
															<td>$ ".$registro['precio_compracm2']."</td>
														</tr>
															
															
															
															";}} ?>
												</tbody>
											</table>
											</div>
										<!-- /.table-responsive -->
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
	
	
   
		