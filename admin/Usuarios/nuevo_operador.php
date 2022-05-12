<?php


include_once ("../seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//	exit();
//}

include_once "../includes_admin/dbcon.php";
// construimos el combo de provincias desde la base de datos
$sql = mysql_query("SELECT * FROM provincia");
    while($sql_p = mysql_fetch_row($sql))
    {
     $combo_provincias.= "<option value='".$sql_p[0]."'>".$sql_p[1]."</option>";
    } 
	
?>


	<link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../css/jquery-ui.css" rel="stylesheet">
    <link href="../../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../../css/jquery.css" rel="stylesheet">
	<link href="../../css.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<script src="../sha256-min.js"></script>
			<script src="/../sha256-min.js"></script>
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
<script type="text/javascript">
function enviar() {
    
    document.getElementById("password").value=hex_sha256(document.getElementById("password").value);
    
         
   }
   </script>
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
<?php 
include_once "../includes_admin/botonera_admin.php";
?>
<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Nuevo <b>Operador</b><a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
										<div class="panel-body">
                            <div class="row">
                            <form action="nuevo_operador_enviado.php" name="customForm" id="customForm" method="post" onsubmit="enviar()" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        
										<div class="form-group col-lg-12">
                                            <label>Cuenta de Usuario</label>
                                            <input id="username" class="form-control" name="username" type="email" value="" placeholder="Correo Electrónico" required "/><div id="Info"></div>
                                        </div>
										
										<div class="form-group col-lg-12">
                                            
                                            <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" type="password" required>
                                        </div>
										                                        
                                        <div class="form-group col-lg-12">
                                                
                                                <input class="form-control" type="text" placeholder="Operador" name="rol" disabled="">
                                                <input type="hidden" placeholder="Operador" name="rol" id="rol" value="1">
                                        </div>
										
										<div class="form-group col-lg-12">
                                            <label>Datos personales</label>
                                            <input class="form-control" placeholder="Nombre" name="nombre" id="nombre" onblur="upperCase()" type="text" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            
                                            <input class="form-control" placeholder="Apellido" name="apellido" id="apellido" onblur="upperCase()" type="text" required>
                                        </div>
										<div class="form-group col-lg-4">
                                            <label>Documento Tipo</label>
                                            <select class="form-control " name="tipo_documento" type="text" required>
												<option value="">--</option>
												<option>DNI</option>
                                                <option>LIBRETA DE ENROLAMIENTO</option>
                                                <option>PASAPORTE</option>
                                                <option>DU</option>
												<option>LIBRETA CIVICA</option>
                                            </select>
                                        </div>
										
										<div class="form-group col-lg-8" >
                                            <label>Número</label>
                                            <input class="form-control" placeholder="Número" name="documento" id="documento" type="number" required>
                                        </div>
										<div class="form-group col-lg-12">
                                            <label>Teléfono</label>
                                            <input class="form-control" placeholder="Telefono" name="telefono" type="tel" required>
                                        </div>
										
										
  								
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
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
                                            <label>Barrio</label>
                                            <input class="form-control" placeholder="Barrio" name="barrio" id="barrio" onblur="upperCase()" type="text" required>
                                        </div>
										
										<div class="form-group col-lg-6">
                                            <label>Calle</label>
                                            <input class="form-control" placeholder="Calle" name="calle" id="calle" onblur="upperCase()" type="text" required>
                                        </div>
										<div class="form-group col-lg-3">
                                            <label>Número</label>
                                            <input class="form-control" placeholder="N°" name="numero" type="number" required>
                                        </div>
										<div class="form-group col-lg-3">
                                            <label>CP</label>
                                            <input class="form-control" placeholder="Codigo Postal" name="codigo_postal" type="number" required>
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Departamento</label>
                                            <select class="form-control " name="dpto" type="text" required>
												<option value="">--</option>
												<option>Planta Baja</option>
                                                <option value="1">1° Piso</option>
                                                <option value="2">2° Piso</option>
                                                <option value="3">3° Piso</option>
                                                <option value="4">4° Piso</option>
                                                <option value="5">5° Piso</option>
												<option value="6">6° Piso</option>
												<option value="7">7° Piso</option>
												<option value="8">8° Piso</option>
												<option value="9">9° Piso</option>
												<option value="10">10° Piso</option>
												<option value="11">11° Piso</option>
												<option value="12">12° Piso</option>
												<option value="13">13° Piso</option>
												<option value="14">14° Piso</option>
												<option value="15">15° Piso</option>
												<option value="16">16° Piso</option>
												<option value="17">17° Piso</option>
												<option value="18">18° Piso</option>
												<option value="19">19° Piso</option>
												<option value="20">20° Piso</option>
											</select>
                                        </div>
										
										<div class="form-group col-lg-3">
                                            <label>Letra</label>
                                            <input class="form-control" placeholder="Letra" name="letra" type="text">
                                        </div>
										<div class="form-group col-lg-3">
                                            <label>N°</label>
                                            <input class="form-control" placeholder="Número" name="n" type="number">
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
										
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
		<!-- jQuery -->
	
	<!-- Convertir a Mayúscula -->
	<script type="text/javascript">
	function upperCase() {
	   var x=document.getElementById("nombre").value
	   document.getElementById("nombre").value=x.toUpperCase()
	   
	   var x=document.getElementById("apellido").value
	   document.getElementById("apellido").value=x.toUpperCase()
	   
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
		
        <!-- /#page-wrapper -->
