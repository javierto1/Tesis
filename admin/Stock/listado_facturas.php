<?php  
//$id = $_POST['id']; 
include_once "../includes_admin/botonera_admin.php";
include_once "../includes_admin/dbcon.php";
include_once "includes_facturas/include_ver_mas_factura.php";
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
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Listado de <b>Facturas</b><?php $query = mysql_query ("select * from facturas"); 
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
															<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 110px;">N° Factura</th>
														    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 60px;">Tipo</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;">Fecha</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 200px;">Proveedor</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 60px;">Lote</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 140px;">Total</th>
															<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 50px;">Acciones</th>
															

											</tr>
										</thead>
										<tbody>
										<?php
																						
											$query = "SELECT f.id_facturas, f.id_proveedor, f.tipo, f.numero, f.fecha, df.id_detalle, df.cantidad, df.id_facturas, df.material, df.tamano, df.precio_compracm2, df.lote, p.id_proveedor, p.nombre, p.apellido, m.id_materiales, m.denominacion 
													  FROM facturas f, detalle_facturas df, proveedor p, materiales m
													  WHERE f.id_facturas = df.id_facturas AND f.id_proveedor = p.id_proveedor AND df.material = m.id_materiales";
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 

											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['numero']."</td> 
                                            <td>".$registro['tipo']."</td>
											<td>".$registro['fecha']."</td>
											<td>".$registro['apellido'].", ".$registro['nombre']."</td>
											<td><a class='label label-default' type='button' data-toggle='tooltip' data-placement='top' title='".$registro['denominacion']."'>".$registro['lote']."</a></td>
                                            <td><p class='text-right'>$ ".$registro['precio_compracm2']."</p></td>
											<td>
												<a href='detalle_factura.php?id_detalle=".$registro['id_detalle']."' name='ver_mas' value='".$registro['id_detalle']."' type='button' class='btn btn-info btn-circle'><i class='fa fa-list-alt' title='Ver más...'> </i> </a>
											</td>
												
											
											
                                        </tr>
										
											"; } ?>
										
										</tbody>
										
									</table>
									
									</div>
								
								</div>
								
								</div>
                            <!-- /.table-responsive 
							
                            <div class="well">
								<?php //echo "<a href='http://noconvencional.comli.com/admin/Actualizar_operador/listado_operador_completo.php?rol=$rol' type='button' class='btn btn-outline btn-primary btn-lg btn-info'><i class='fa fa-th-list'></i> Ver listado completo</a>";   ?>
								
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
		