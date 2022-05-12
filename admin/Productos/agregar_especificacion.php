<?php 

include "../includes_admin/dbcon.php";

//include('dbcon.php');

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../css/jquery-ui.css" rel="stylesheet">
    <link href="../../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../../css/jquery.css" rel="stylesheet">
	<link href="../../css.css" media="screen" rel="stylesheet" type="text/css" />
	
<!-- Custom CSS -->
<link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>

<!--<script type="text/javascript" src="valida_envia.js"></script>  -->
<script src="jquery-1.7.2.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript" src="validar.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
<!-- SCRIPT PARA PROVINCIAS Y SUS LOCALIDADES FILTRADAS -->

<!--<script type="text/javascript" src="validar.js"></script>
	<script type="text/javascript" src="valform.js"></script> CON VALIDACION NO GRABA!!!!~~~~~~~~~~~~~~~~~~~~~~~~~ASDASDCZXCWEFCA!! -->
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
                        <h1 class="page-header"><img src="../../images/iconos/Mas.png" height="70px" width="70px"/>Nueva <b>Especificación</b><a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						<div class="panel-body">
                            <div class="row">
								<form id="formid" method="post" action="agregar_especificacion_enviado.php">
									
									<div class="col-lg-12">
										<div class="panel-heading">
											
											
										<label>SELECCIONE TIPO DE ESPECIFICIDAD:</label>
										<div class="form-group">
										
                                        <?php include "../includes_admin/dbcon.php";
														  $query = mysql_query("SELECT * FROM tipo"); 
														  while($rows = mysql_fetch_array($query)){ ?>
											<label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="<?php echo $rows['id_tipo'] ; ?>" checked=""> <a type="button" class="btn btn-outline btn-default btn-sm"> <?php echo $rows['des_especifica'] ;?> </a></input>
                                            </label> <?php }; ?>
															
                                            
                                        </div>
										<hr>
										
										</div>
									</div>
									<div class="col-lg-10">
                                        
										<div class="form-group col-lg-3">
											<label>CÓDIGO</label>
                                            <input class="form-control" placeholder="CÓDIGO" id="fname" onblur="upperCase()" name="codigo" type="text" required>
                                        </div>
										
										<div class="form-group col-lg-4">
											<label>DENOMINACIÓN</label>
											<input class="form-control" placeholder="DENOMINACIÓN" id="fname1" onblur="upperCase()" name="denominacion" id="denominacion" type="text" required>
										</div>
										<div class="form-group col-lg-3">
											<label>PRECIO</label>
											<input class="form-control" placeholder="PRECIO" name="precio" id="precio" type="number" required>
										</div>
										<br>
										<div class="col-lg-10">
											<div class="panel panel-default">
												<div class="panel-heading">
													<span class="glyphicon glyphicon-asterisk"> </span> <b><i>RECUERDE!</i></b> 
												</div>
												<div class="panel-body">
													<p><small><u> ÚLTIMOS CÓDIGOS REGISTRADOS SEGÚN TIPO DE ESPECIFICIDAD: </u> </small></p>
													
													<b> 
															<small class="text-muted">IMPRESIÓN:</SMALL> 
													</B>
													<?php include "../includes_admin/dbcon.php";
														  $query = mysql_query("SELECT * FROM especifica WHERE id_caracter='1' ORDER BY id_especifica DESC limit 5"); 
														  while($row = mysql_fetch_array($query)){ ?>
														  <B><?php echo $row['codigo'] ?> - <?php }; ?> </B>
														  
														  <BR>
														<b> 
															<small class="text-muted">SOPORTE:</SMALL> 
														</b>
													<?php include "../includes_admin/dbcon.php";
														  $query1 = mysql_query("SELECT * FROM especifica WHERE id_caracter='2' ORDER BY id_especifica DESC limit 5"); 
														  while($row1 = mysql_fetch_array($query1)){ ?>
														  <?php echo $row1['codigo'] ?> - <?php }; ?>
														  <BR>	
														  
														<b> 
															<small class="text-muted">CANTIDAD:</SMALL>
														</b>  
													<?php include "../includes_admin/dbcon.php";
														  $query2 = mysql_query("SELECT * FROM especifica WHERE id_caracter='3' ORDER BY id_especifica DESC limit 5"); 
														  while($row2 = mysql_fetch_array($query2)){ ?>
														  <?php echo $row2['codigo'] ?> - <?php }; ?>
														  
														  <BR>	
														  
														<b> 
															<small class="text-muted">TERMINACIÓN:</SMALL>
														</b>
													<?php include "../includes_admin/dbcon.php";
														  $query3 = mysql_query("SELECT * FROM especifica WHERE id_caracter='4' ORDER BY id_especifica DESC limit 5"); 
														  while($row3 = mysql_fetch_array($query3)){ ?>
														  <?php echo $row3['codigo'] ?> - <?php }; ?>  
														 
														  <BR>
														  
														<b> 
															<small class="text-muted">MÓDULO:</SMALL>  
														</b>
													<?php include "../includes_admin/dbcon.php";
														  $query3 = mysql_query("SELECT * FROM especifica WHERE id_caracter='5' ORDER BY id_especifica DESC limit 5"); 
														  while($row3 = mysql_fetch_array($query3)){ ?>
														   <?php echo $row3['codigo'] ?> - <?php }; ?>
														  
														  <BR>
												</div>
												<?php include "../includes_admin/modal.php"; ?>
											</div>
										</div>
										
									</div>	
							</div>
										<!--<button type="submit" class="btn btn-default">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>-->
										<br>
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
				
			</div>
							
		</div>
				
</body>
	<!-- Convertir a Mayúscula -->
	<script type="text/javascript">
	function upperCase() {
	   var x=document.getElementById("fname").value
	   document.getElementById("fname").value=x.toUpperCase()
	   
	   var x=document.getElementById("fname1").value
	   document.getElementById("fname1").value=x.toUpperCase()
	}
	</script>		
	
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
</html>