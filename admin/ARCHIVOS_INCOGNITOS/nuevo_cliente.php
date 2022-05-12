<?php 

include "dbcon.php";

//include('dbcon.php');
// construimos el combo de provincias desde la base de datos
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
    <script type="text/javascript" src="jquery-1.3.2.js"></script>
	
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../css/jquery.css" rel="stylesheet">
	<link href="../css.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
	
<script type="text/javascript">
$(document).ready(function() {	
	$('#username').blur(function(){
		
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

		var username = $(this).val();		
		var dataString = 'username='+username;
		
		$.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
				$('#Info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    
</script>

<!-- SCRIPT PARA PROVINCIAS Y SUS LOCALIDADES FILTRADAS -->
<script type="text/javascript" charset="utf-8">
	  $(document).ready(function() {
	  // Parametros para el combo
	   $("#provincia").change(function () {
	      $("#provincia option:selected").each(function () {
	        elegido=$(this).val();
	        $.post("validador_provincia/combo_ciudad.php", { elegido: elegido }, function(data){
	        $("#ciudad").html(data);
	      });     
	     });
	   });    
	});
	</script>

<!-- SCRIPT PARA PROVINCIAS Y SUS LOCALIDADES FILTRADAS -->


<!--<script type="text/javascript" src="valida_envia.js"></script>  -->



<!--<script type="text/javascript" src="validar.js"></script>
	<script type="text/javascript" src="valform.js"></script> CON VALIDACION NO GRABA!!!!~~~~~~~~~~~~~~~~~~~~~~~~~ASDASDCZXCWEFCA!! -->
<?php 
include "includes_admin/botonera_admin.php";
?>
</head>

<body>

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../images/iconos/Agregar.png" height="70px" width="70px"/>Nuevo Cliente</h1>
						
						<div class="panel-body">
                            <div class="row">
								<form action="nuevo_cliente_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        <div class="form-group col-lg-12">
                                            <label>Datos personales</label>
                                            <input class="form-control" placeholder="Nombre" name="nombre" type="text" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Apellido" name="apellido" type="text" required>
                                        </div>
										<div class="form-group col-lg-4">
                                            <label>Documento Tipo</label>
                                            <select class="form-control " name="documento" type="text" required>
												<option></option>
												<option>DNI</option>
                                                <option>Libreta de Enrolamiento</option>
                                                <option>Pasaporte</option>
                                                <option>DU</option>
                                            </select>
                                        </div>
										
										<div class="form-group col-lg-8" >
                                            <label>Número</label>
                                            <input class="form-control" placeholder="Número" name="dni" id="dni" type="number" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Telefono" name="telefono" type="tel" required>
                                        </div>
										
										<div class="form-group col-lg-12">
											<div class="control-group">
												<label class="control-label" for="provincia">Provincia</label>
												<div class="controls">
																<select class="form-control"  name="provincia" id="provincia" required>
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
                                        </div>
										<div class="form-group col-lg-3">
                                            
                                            <input class="form-control" placeholder="Codigo Postal" name="codigo_postal" type="number" required>
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Departamento</label>
                                            <select class="form-control " name="dpto" type="text" required>
												<option></option>
												<option>Planta Baja</option>
                                                <option>1° Piso</option>
                                                <option>2° Piso</option>
                                                <option>3° Piso</option>
                                                <option>4° Piso</option>
                                                <option>5° Piso</option>
												<option>6° Piso</option>
												<option>7° Piso</option>
												<option>8° Piso</option>
												<option>9° Piso</option>
												<option>10° Piso</option>
												<option>11° Piso</option>
												<option>12° Piso</option>
												<option>13° Piso</option>
												<option>14° Piso</option>
												<option>15° Piso</option>
												<option>16° Piso</option>
												<option>17° Piso</option>
												<option>18° Piso</option>
												<option>19° Piso</option>
												<option>20° Piso</option>
											</select>
                                        </div>
										
										<div class="form-group col-lg-3" >
                                            <label>Letra</label>
                                            <select class="form-control " name="dpto" type="text" required>
                                                <option></option>
												<option>A</option>
												<option>B</option>
												<option>C</option>
												<option>D</option>
												<option>F</option>
											</select>
                                        </div>
										<div class="form-group col-lg-3" >
                                            <label>Nº</label>
                                            <select class="form-control " name="dpto" type="number" required>
                                                <option></option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
                                        </div>
  								
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
										<label>Cuenta y Permisos</label>
										<div class="form-group">
                                            
                                            <input id="username" class="form-control" name="username" type="text" value="" placeholder="Correo Electronico" /><div id="Info"></div>
                                        </div>
										<div class="form-group">
                                            
                                            <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="password" type="password" required>
                                        </div>
										                                        
                                        <div class="form-group">
                                                <label for="disabledSelect">Rol</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="Cliente" name="rol" disabled="">
                                                <input class="form-control" style="visibility:hidden" type="text" placeholder="Operador" name="rol" id="rol" value="2">

                                            </div>
								   
										
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
								</div>
								<!-- /.row (nested) -->
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
		
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</html>