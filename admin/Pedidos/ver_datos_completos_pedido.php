<?php 
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
include "../../includes_admin/botonera_admin.php";

//$id= '6';
include "../../includes_admin/dbcon.php";
?>
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />

<?php  
	$id_pedido = $_GET['id_pedido']; 
	$estado=(int) $_GET['id_estado'];
																						
											$query = "select pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta,
															 p.denominacion,
															 dp.id, dp.apellido, dp.nombre, dp.username, dp.mail, dp.telefono, dp.telefono, dp.fecha_alta, dp.barrio, dp.documento, dp.tipo_documento, dp.calle, dp.numero,
															 ep.id_estado, ep.denominacion as deno
															 
													 from 
															pedido_cliente pc,
															producto p,
															datos_personales dp,
															estado_pedido ep
															
													where 	pc.id_cliente = dp.id AND 
															pc.id_producto = p.id_producto AND 
															pc.id_estado = ep.id_estado AND
															pc.id_pedido='$id_pedido'";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											echo '

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Pedido Nº: '.$registro['id_pedido'].' de  <b>'.$registro['apellido'].', '.$registro['nombre'].'</b><a href="http://noconvencional.comli.com/admin/Pedidos/listado_pedidos.php?id_estado='.$registro['id_estado'].'" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								Detalle Pedido
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
										
											<tr>
												<td colspan="4"> <h4><b>Detalle Cliente</b></h4> </td>
											</tr>
											
											<tr>
												<td>Nombre: <b>'.$registro['nombre'].'</b></td>
												<td>Apellido: <b>'.$registro['apellido'].'</b></td>
												<td>E-mail/Usuario: <b>'.$registro['mail'].'</b></td>
												<td>Telefono: <b>'.$registro['telefono'].'</b></td>
											</tr>
											<tr>
												<td>Tipo Documento: <b>'.$registro['tipo_documento'].' N°: <b><i>'.$registro['documento'].'</i></b></b></td>
												<td>N°: <b>'.$registro['documento'].'</b></td>
												<td>Calle: <b>'.$registro['calle'].'</b></td>
												<td>N°: <b>'.$registro['numero'].'</b></td>
											</tr>
											
											<tr>
												<td colspan="4"> <h4><b>Detalle Pedido</b></h4> </td>
											</tr>
											<tr>
												<td>Producto: <b>'.$registro['denominacion'].'</b></td>
												<td><b>Precio Final:</b> $<b>'.$registro['precio_vta'].'</b></td>
												<td><b>Archivo:</b> <a href="../../cliente/images/pedido/'.$registro['url'].'">												
												</a></td>
											<tr>
												<td colspan="4"> <h4> <small><b>Caracteristicas:</b></small></h4> </td>
											</tr>
											 '?>
												
												<?php 
												$id_pedido = $_GET['id_pedido']; 
												
												//$query = "select dpr.id_proveedor,dpr.id_materiales,m.id_materiales,m.denominacion from detalle_proveedor dpr, materiales m where dpr.id_materiales = m.id_materiales AND dpr.id_proveedor='$id_proveedor'"; 
												$query = "select dp.id_pedido,dp.id_especifica,dp.id_tipo,e.id_especifica,e.codigo,e.denominacion,t.id_tipo,t.des_especifica 
														  FROM detalle_pedido dp, especifica e, tipo t
														  WHERE dp.id_especifica = e.id_especifica AND dp.id_tipo = t.id_tipo AND dp.id_pedido='$id_pedido'"; 
													
														$result1 = mysql_query($query); 
	
													while ($registro1 = mysql_fetch_array($result1)){ 
													echo '
												<td>'.$registro1['des_especifica'].': <small><i>(COD:'.$registro1['codigo'].') </small></i> <b>'.$registro1['denominacion'].'</b> </td>'; }?><?php echo'
												
												
											</tr>
											
										</tbody>
									</table>
								</div>
                            <!-- /.table-responsive -->
							</div>
                        
						</div>
						
						<div class="well">
								<a target="_blank" href="#" type="button" class="btn btn-outline btn btn-danger"><i class="fa fa-th-list"></i> Exportar a PDF</a>							</div>
						
						
                    </div>
                                
								
                </div>
                           
							<br>
								
			</div>
										
        </div>
               
'; 
}
?>
	<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../../dist/js/sb-admin-2.js"></script>
		
        <!-- /#page-wrapper -->