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
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Nuevo <b>Proveedor</b> <small><i>(Persona Fisica)</i></small> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						<div class="panel-body">
                            <div class="row">
								<form id="formid" method="post" action="nuevo_proveedor_enviado.php">
									<div id="ok"></div>
									<div class="col-lg-6">
                                        
										<div class="form-group col-lg-12">
                                            <label>Datos personales</label>
                                            <input class="form-control" placeholder="Nombre" name="nombre" type="text" id="nombre" onblur="upperCase()" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Apellido" name="apellido" type="text" id="apellido" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Razon Social" name="razon_social" id="razon_social" type="text" id="razon_social" onblur="upperCase()" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="CUIT" name="cuit" type="number" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="CUIL" name="cuil" type="number" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="E-mail" name="mail" type="email" id="email" onblur="upperCase()" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Telefono" name="telefono" type="number" required>
                                        </div>
										
										<div class="form-group col-lg-12">
                                            <label>Materiales que provee:</label><br>
											<?php
											$query = "select * from materiales"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="material[]" value="<?php echo $registro['id_materiales'] ?>"><?php echo $registro["denominacion"];?>
                                            </label>
                                            <?php; } ?>
											<input type="hidden" name="tipo[]" id="tipo"  value="1"> 
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
													<select class="form-control"  name="ciudad" id="ciudad" type="select" required>
													</select>
												</div>
											</div>
										</div> 
										<div class="form-group col-lg-12">
                                            <input class="form-control" placeholder="Barrio" name="barrio" type="text" id="barrio" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group col-lg-6">
                                            <input class="form-control" placeholder="Calle" name="calle" type="text" id="calle" onblur="upperCase()" required>
                                        </div>
										<div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="N°" name="numero" type="number" required>
											<input type="hidden" value="0" name="tipo">
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
	
	<!-- Convertir a Mayúscula -->
	<script type="text/javascript">
	function upperCase() {
	   var x=document.getElementById("nombre").value
	   document.getElementById("nombre").value=x.toUpperCase()
	   
	   var x=document.getElementById("apellido").value
	   document.getElementById("apellido").value=x.toUpperCase()
	   
	   var x=document.getElementById("razon_social").value
	   document.getElementById("razon_social").value=x.toUpperCase()
	   
	   var x=document.getElementById("email").value
	   document.getElementById("email").value=x.toUpperCase()
	   
	   var x=document.getElementById("barrio").value
	   document.getElementById("barrio").value=x.toUpperCase()
	   
	   var x=document.getElementById("calle").value
	   document.getElementById("calle").value=x.toUpperCase()
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