<?php 
include "../includes_admin/botonera_admin.php";

//$id= '6';
include "../includes_admin/dbcon.php";
?>
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="../morris/morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>	
 
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
 <link rel="stylesheet" href="../morris/morris.css">
  
<?php  
	$id_proveedor = $_GET['id_proveedor']; 
	
    $query = "select * from proveedor WHERE id_proveedor='$id_proveedor'"; 
    $result = mysql_query($query); 

while ($registro = mysql_fetch_array($result)){ 

echo '

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Proveedor <b>'.$registro['apellido'].', '.$registro['nombre'].' </b> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a> </h1>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								Datos del Proveedor:
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
											<tr>
												<td>Nombre: <b>'.$registro['nombre'].'</b></td>
												<td>Apellido: <b>'.$registro['apellido'].'</b></td>
												<td>Razon Social: <b>'.$registro['razon_social'].'</b></td>
											</tr>
											<tr>
												<td>Cuit/Cuil: <b>'.$registro['cuit'].'</b></td>
												<td>E-mail: <b>'.$registro['mail'].'</b></td>
												<td></td>
											</tr>
											<tr>
												<td>Telefono: <b>'.$registro['telefono'].'</b></td>
												<td>Calle: <b>'.$registro['calle'].'</b></td>
												<td>Numero: <b>'.$registro['numero'].'</b></td>
											</tr>
											<tr>
												<td>Barrio: <b>'.$registro['barrio'].'</b></td>
												<td>Ciudad: <b>'.$registro['ciudad'].'</b></td>
												<td>Provincia: <b>'.$registro['provincia'].'<small> (CP:'.$registro['codigo_postal'].')</small></b></td>
											</tr>
											<tr>
												<td colspan="4"> <h4><b>Con nosotros:</b></h4> </td>
											</tr>
											<tr>
												<td>Fecha Alta: <b>'.$registro['fecha_alta'].'</b></td>
												<td>Materiales que provee: '?>
												
												<?php $query = "select dpr.id_proveedor,dpr.id_materiales,m.id_materiales,m.denominacion from detalle_proveedor dpr, materiales m where dpr.id_materiales = m.id_materiales AND dpr.id_proveedor='$id_proveedor'"; 
													$result = mysql_query($query); 
	
													while ($registro = mysql_fetch_array($result)){ 
													echo '
													
													 <i class="fa fa-circle"> <b> '.$registro['denominacion'].' </b> </i> ';}} ?>
													
												</td>
												
											</tr>
											
										</tbody>
									</table>
								</div>
                            <!-- /.table-responsive -->
							</div>
                        
						</div>
						
                    </div>
                                
								
                </div>
                         
							<br>
								
								
			</div>
										
        </div>
               

	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
		
        <!-- /#page-wrapper -->