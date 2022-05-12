<?php 

include "../includes_admin/dbcon.php";

//include('dbcon.php');

$sql = mysql_query("SELECT * FROM provincia");
    while($sql_p = mysql_fetch_row($sql))
    {
     $combo_provincias.= "<option value='".$sql_p[0]."'>".$sql_p[1]."</option>";
    } 
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
<script type="text/javascript" charset="utf-8">
	  $(document).ready(function() {
	  // Parametros para el combo
	   $("#provincia").change(function () {
	      $("#provincia option:selected").each(function () {
	        elegido=$(this).val();
	        $.post("../validador_provincia/combo_ciudad.php", { elegido: elegido }, function(data){
	        $("#ciudad").html(data);
	      });     
	     });
	   });    
	});
	</script>


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
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Nuevo Proveedor <small><i>(Persona Juridica)</i></small></h1>
						
						<div class="panel-body">
                            <div class="row">
								<form id="formid" method="post" action="nuevo_proveedor_enviado.php">
									<div id="ok"></div>
									<div class="col-lg-6">
                                        
										<div class="form-group col-lg-12">
                                            <label>Datos personales</label>
                                            <input class="form-control" placeholder="Nombre" name="nombre" type="text" required>
										</div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Apellido" name="apellido" type="text" required>
                                        </div>
										
										<div class="form-group col-lg-12">
											<label>Material</label>
											<select class="form-control" name="id_categorias" id="id_categorias" type="select" required>
												<option value="0">--</option>
												<!-- Listar Paises -->
												<?php
												$query = mysql_query("SELECT * FROM categorias"); 
												while($row = mysql_fetch_array($query)){
												?>
												<option value="<?php echo $row['id_categorias'] ?>">
												<?php echo $row['tipo'] ?>
												</option>
												<?php
													}
												?>  
											</select>
										</div>
										
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Razon Social" name="razon_social" id="razon_social" type="text" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="CUIT" name="cuit" type="number" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="CUIL" name="cuil" type="number" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="E-mail" name="mail" type="email" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Telefono" name="telefono" type="tel" required>
                                        </div>
										
										<div class="form-group col-lg-12">
											<div class="control-group">
												<label class="control-label" for="provincia">Provincia</label>
												<div class="controls">
																<select class="form-control"  name="provincia" id="provincia" type="select" required>
																	<option value="0">Seleccione...</option>
																	<?php  echo $combo_provincias;?>
																</select>
												</div>
											</div>
										</div>
																					
                                        <div class="form-group col-lg-12">
											<div class="control-group">
												<label class="control-label" for="ciudad">Ciudad</label>
												<div class="controls">
													<select class="form-control"  name="ciudad" id="ciudad" required>
													</select>
												</div>
											</div>
										</div> 
										<div class="form-group col-lg-12">
                                            <input class="form-control" placeholder="Barrio" name="barrio" type="text" required>
                                        </div>
										
										<div class="form-group col-lg-6">
                                            <input class="form-control" placeholder="Calle" name="calle" type="text" required>
                                        </div>
										<div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="N°" name="numero" type="number" required>
											<input type="hidden" value="1" name="tipo">
                                        </div>
										<div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="Codigo Postal" name="codigo_postal" type="number" required>
                                        </div>
										
									</div>
							
							</div>
										<!--<button type="submit" class="btn btn-default">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>-->
										<br>
										<button type="submit" class="btn btn-default">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>
										<a href="javascript:history.go(-1);" type="submit" class="btn btn-default" name="B1">Volver</a>
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