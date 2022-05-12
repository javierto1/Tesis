<?php 

include "../includes_admin/dbcon.php";

//include('dbcon.php');
// construimos el combo de provincias desde la base de datos

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<!-- Bootstrap Core CSS -->
    <script type="text/javascript" src="jquery-1.3.2.js"></script>
	
	<link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../css/jquery-ui.css" rel="stylesheet">
    <link href="../../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../../css/jquery.css" rel="stylesheet">
	<link href="../../css.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	

<?php 
include "../includes_admin/botonera_admin.php";
?>
</head>

<body>

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Nuevo <b>Trabajo</b> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						<div class="panel-body">
                            <div class="row">
								<form action="nuevo_trabajo_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        
										<div class="form-group input-group">
										<span class="input-group-addon">Trabajo</span>
                                           <select class="form-control" name="trabajo" id="trabajo" required>
														<option value="">--</option>
														<!-- Listar Paises -->
															<?php
															$query = "select * from producto"; 
															
															$query1= mysql_query($query); 
															while($row = mysql_fetch_array($query1)){
															?>
															<option value="<?php echo $row['id_producto'] ?>"><?php echo $row['denominacion'] ?></option>
															<?php
															}?>
										</select> 
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">Precio $</span>
												<input class="form-control" name="precio" type="number" required>
                                            <span class="input-group-addon">.00</span>
                                        </div>
										
									<br>
									<?php include "../includes_admin/modal.php"; ?>
									<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Guardar</button>
									<button type="reset" class="btn btn-default">Resetear</button>
									
								</form>
								</div>
							<!-- /.row -->
						</div>
						<!-- /.panelbody -->			
                    </div>
                    <!-- /.col-lg-12 -->
                
				</div>
				<!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
		</body>
		
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
</html>