<?php  
//$id = $_POST['id']; 
include "../includes_admin/botonera_admin.php";
 include "../includes_admin/dbcon.php";;   
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
                       
						 <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Control <b>Stock</b><?php $query = mysql_query ("select * from stock"); 
																																				 $result = mysql_num_rows($query); 
																																				 echo '<small> <span class="badge">'.$result.'</span></small>'; ?> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						
						<div class="panel-body">
						
						<div align="center" class="col-sm-12">
								<div class="btn-group pull-center ">
									<a href='cargar_stock.php' type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Stock (Factura compra)'> </i> Agregar Stock (Factura compra)</a>
									<a href="listado_facturas.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-list-alt' aria-hidden='true' title='Listado Facturas'> </i> Listado Facturas Compra</a>
									<a href="nivel_stock.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-bar-chart' aria-hidden='true' title='Balance de Stock'> </i> Balance de Stock</a>
									<a href="nuevo_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Material'> </i> Agregar Material</a>
									<a href="detalle_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true' title='Definir Material'> </i> Definir Material</a>	
								</div>
						</div>
						<hr>
                        <hr>   
							
						<div class="dataTable_wrapper">
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div>
								
								<div class="row">
								
									<div class="col-sm-12">
								
										<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
										<thead>
											<tr role="row">
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 220px;">Material</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260px;">Tamaño <small><b>CM2</b></small></th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 192px;">Stock Mínimo</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 144px;">Resto <small><b>CM2</b></small></th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 238px;">Precio Últ. Compra</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Acciones</th>
															

											</tr>
										</thead>
										<tbody>
										<?php
																						
											$query = "select s.id_item, s.total_tamanoCM2, s.precio_ultima_compracm2, s.stock_minimo, s.resto, d.denominacion from detalle_materiales d, stock s
													where s.id_item = d.id_item";
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 

											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['denominacion']."</td> 
                                            <td><p class='text-right'>".$registro['total_tamanoCM2']."</td>
											<td><p class='text-right'>".$registro['stock_minimo']."</p></td>
                                            <td><p class='text-right'>".$registro['resto']."</p></td>
											<td><p class='text-right'>$ ".$registro['precio_ultima_compracm2']."</p></td>
											
											<td><a href='actualizar_precio.php?id=".$registro['id_item']."''> <button type='button' class='btn btn-success btn-circle'><i class='fa fa-usd' title='Precio'> </i> </button></a>
												
												 </td>
												
											
											
                                        </tr>
										
											"; } ?>
										
										</tbody>
										
									</table>
									
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
		