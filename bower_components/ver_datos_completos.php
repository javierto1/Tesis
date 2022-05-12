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

<?php  
	$id = $_GET['id']; 
	$rol=(int) $_GET['rol'];
	echo $rol;
    $query = "select * from datos_personales WHERE id='$id'"; 
    $result = mysql_query($query); 

while ($registro = mysql_fetch_array($result)){ 

echo '

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Administrar.png" height="70px" width="70px"/>Ficha Completa</h1>
						
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
												
												
												
											</tr>
											<tr>
												<td colspan="3"> <h4><b>Cuenta</b></h4> </td>
											</tr>
											<tr>
												<td>Usuario: <b>'.$registro['username'].'</b></td>
												<input type="hidden" id="pwd" value="'.$registro['password'].'" name="password">
												<td>Contraseña: <i class="fa fa-circle"></i> <i class="fa fa-circle"></i> <i class="fa fa-circle"></i> <i class="fa fa-circle"></i></td>
												<input type="hidden" value="'.$registro['rol'].'" name="rol">
												<td>Rol: <b>Operador</b></td>
												<td>Fecha Alta: <b>'.$registro['fecha_alta'].'</b></td>
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
								<a href="http://noconvencional.comli.com/admin/Usuarios/listado_usuarios.php?rol='.$registro['rol'].'" type="submit" class="btn btn-default" name="B1">Volver</a>
								
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