<?php 
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
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
 
  
<?php  
	$id_producto =(int) $_GET['id_producto']; 
	//$estado=(int) $_GET['id_estado'];
																						
											$query = "select * from producto where id_producto = '$id_producto'"; 
														
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo '

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Producto <b>N°: '.$registro['id_producto'].'</b><a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1>
						
						
						<div class="panel panel-default">
							<div class="panel-heading">
								Detalle Producto
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
										
											<tr>
												<td colspan="4"> <h4><b>Detalle Producto</b></h4> </td>
											</tr>
											<tr>
												<td>Código: <b>'.$registro['codigo'].'</b></td>
												<td>Denominación: <b>'.$registro['denominacion'].'</b></td>
											</tr>	
											<tr>
												<td colspan="4"> <h4> <small><b>Caracteristicas posibles:</b></small></h4> </td>
											</tr>
											<td colspan="4">
											 '?>
												
												<?php 
												$id_pedido = $_GET['id_pedido']; 
												
												//$query = "select dpr.id_proveedor,dpr.id_materiales,m.id_materiales,m.denominacion from detalle_proveedor dpr, materiales m where dpr.id_materiales = m.id_materiales AND dpr.id_proveedor='$id_proveedor'"; 
												$query = "select dp.id_producto,dp.id_tipo,dp.id_especifica,e.id_especifica,e.id_caracter,e.codigo,e.denominacion,t.id_tipo,t.des_especifica 
														  FROM detalle_producto dp, especifica e, tipo t
														  WHERE dp.id_especifica = e.id_especifica AND e.id_caracter = t.id_tipo AND dp.id_producto='$id_producto'"; 
													
														$result1 = mysql_query($query); 
	
													while ($registro1 = mysql_fetch_array($result1)){ 
													echo '
												<button type="button"class="btn btn-xs btn-default"><small><i>(COD:'.$registro1['codigo'].') </small></i> <b>'.$registro1['denominacion'].'</b></button> '; }?><?php echo'
												 
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
                 
								
			</div>
										
        </div>
               
'; 
}
?>
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
		
        <!-- /#page-wrapper -->