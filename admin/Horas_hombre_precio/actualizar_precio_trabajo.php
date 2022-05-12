<?php 
include "../includes_admin/botonera_admin.php";
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }

//$id= '6';
include "../includes_admin/dbcon.php";
?>
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />

<?php  
	$id = $_GET['id_trabajo']; 
	

    $query = "select * from horas_hombre WHERE id_trabajo='$id'"; 
    $result = mysql_query($query); 

while ($registro = mysql_fetch_array($result)){ 

echo '
<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Actualizar <b>Precio</b> <small><i>('.$registro['trabajo'].')</i></small> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1> 
						
										<div class="panel-body">
                            <div class="row">
                            <form action="actualizar_precio_trabajo_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        <label>Editar Campos:</label>
										<div class="form-group input-group">
                                            <input type="hidden" value="'.$registro['id_trabajo'].'" name="id_trabajo">
											 
											<span class="input-group-addon">Trabajo</span> 
												<input class="form-control" value="'.$registro['trabajo'].'" DISABLED>
												<input type="hidden" value="'.$registro['trabajo'].'" name="trabajo" id="trabajo">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Precio $</span>
												<input class="form-control" value="'.$registro['precio'].'" name="precio" type="number" required>
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                </div>
                               
							'?><?php include "../includes_admin/modal.php"; ?><?php echo '	
                            </div>
                            <!-- /.row (nested) -->
							<br>
								
								
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Actualizar</button>
                                <button type="reset" class="btn btn-default">Resetear</button>
								
                                    </form>
						</div>
										
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
		<!-- jQuery -->
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