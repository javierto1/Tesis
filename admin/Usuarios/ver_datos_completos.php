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
 
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
 <link rel="stylesheet" href="../morris/morris.css">
			 <script>
			 
			  $(function () {
			 
			  Morris.Donut({
			  element: 'graph',
			  data: [
									<?php   
									  $id = $_GET['id'];        
								  $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='1' and id_cliente='$id'"); 
								  $result = mysql_num_rows($query); 
								  ?>
				{value: <?php echo $result;?>, label: 'PEDIDO'},
									  
									  <?php   
											  
								  $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='3'and id_cliente='$id'"); 
								  $result = mysql_num_rows($query); 
								  ?>
				{value: <?php echo $result;?>, label: 'ELABORACION'},
									<?php   
											 
								  $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='6'and id_cliente='$id'"); 
								  $result = mysql_num_rows($query); 
								  ?>
				{value: <?php echo $result;?>, label: 'ENTREGADO'},
									  
									<?php   
											
								$query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='9'and id_cliente='$id'"); 
								$result = mysql_num_rows($query); 
								?>
				{value: <?php echo $result;?>, label: 'CANCELADO'}
			  ],
			  formatter: function (x) { return x + "U."}
			}).on('click', function(i, row){
			  console.log(i, row);
			});
			});
			  </script>

<?php  
		$id = $_GET['id']; 
		$rol=(int) $_GET['rol'];
		//echo $rol;
		$query = "select * from datos_personales WHERE id='$id'"; 
		$result = mysql_query($query); 

		while ($registro = mysql_fetch_array($result)){ 

		echo '

		<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Ficha de <b>'.$registro['apellido'].', '.$registro['nombre'].'</b>';?>
																																<?php		$rol=(int) $_GET['rol']; 
																																			if($rol==1) {echo "<small><i>(Operador)</i></small>";} 
																																			if($rol==2)	{echo "<small><i>(Cliente)</i></small>";}
																																			if($rol==0)	{echo "<small><i>(Operador)</i></small>";}
																																			if($rol>=3)	{header('Location: http://noconvencional.comli.com/admin/Actualizar_operador/error_rol_inexistente.php');}

																																			else if ($rol!=0 & 1 & 2) {echo "ERROR";}?><?php echo ' <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1> 
						
										
										
						<div class="panel panel-default">
							<div class="panel-heading">
								Datos Personales
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
											<tr>
												<td>Nombre: <b>'.$registro['nombre'].'</b></td>
												<td>Apellido: <b>'.$registro['apellido'].'</b></td>
												<td>Telefono: <b>'.$registro['telefono'].'</b></td>
												<td>E-mail/Usuario: <b>'.$registro['mail'].'</b></td>
												
											</tr>
											<tr>
												<td>Tipo Documento: <b>'.$registro['tipo_documento'].'</b></td>
												<td>N°: <b>'.$registro['documento'].'</b></td>
												<td>Provincia: <b>'.$registro['provincia'].'</b></td>
												<td>Ciudad: <b>'.$registro['ciudad'].'</b></td>
											</tr>
											<tr>
												<td>Barrio: <b>'.$registro['barrio'].'</b>      <small>   CP: <b> '.$registro['codigo_postal'].'</small></b> </td>
												<td>Calle: <b>'.$registro['calle'].'</b></td>
												<td>N°: <b>'.$registro['numero'].'</b></td>
												<td>Dpto: <b>'.$registro['dpto'].'° '.$registro['letra'].' '.$registro['n'].'</b></td>
												
											</tr>
											<tr>
												<td colspan="4"> <h4><b>Cuenta</b></h4> </td>
											</tr>
											<tr>
												<td>Usuario: <b>'.$registro['username'].'</b></td>
												<input type="hidden" id="pwd" value="'.$registro['password'].'" name="password">
												<td>Contraseña: <i class="fa fa-circle"></i> <i class="fa fa-circle"></i> <i class="fa fa-circle"></i> <i class="fa fa-circle"></i></td>
												<td>Fecha Alta: <b>'.$registro['fecha_alta'].'</b></td>
												'; }?><?php $rol=(int) $_GET['rol']; 
												if($rol==1) {echo "<td>Rol: <b>Operador</b></td>";} 
												if($rol==2)	{echo "<td>Rol: <b>Cliente</b></td>";}
												if($rol==0)	{echo "<td>Rol: <b>Administrador</b></td>";}
												if($rol>=3)	{header('Location: http://noconvencional.comli.com/admin/Usuarios/error_rol_inexistente.php');}?>
											</tr>
										</tbody>
									</table>
								</div>
                            <!-- /.table-responsive -->

							</div>
                        
						</div>
						
                    </div>
                                
								
                </div>
                
				<?php $rol=(int) $_GET['rol']; 
							if($rol==2) {echo '<div class="panel panel-default">
							<div class="panel-heading">
								Historico Pedidos Por Cliente
							</div>
                           
                            <div id="graph" ></div>								
                        
                </div>';} ?>
				
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