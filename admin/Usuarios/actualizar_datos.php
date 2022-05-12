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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
<script type="text/javascript" src="jquery-1.3.2.js"></script>

<link href="css.css" media="screen" rel="stylesheet" type="text/css" />
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

<?php  
	$id = $_GET['id']; 

    $query = "select * from datos_personales WHERE id='$id'"; 
    $result = mysql_query($query); 

while ($registro = mysql_fetch_array($result)){ 

echo '

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Actualizar <b>'.$registro['apellido'].', '.$registro['nombre'].'</b>';?>
																																<?php		$rol=(int) $_GET['rol']; 
																																			if($rol==1) {echo "<small><i>(Operador)</i></small>";} 
																																			if($rol==2)	{echo "<small><i>(Cliente)</i></small>";}
																																			if($rol==0)	{echo "<small><i>(Administrador)</i></small>";}
																																			if($rol>=3)	{header('Location: http://noconvencional.comli.com/admin/Actualizar_operador/error_rol_inexistente.php');}

																																			else if ($rol!=0 & 1 & 2) {echo "ERROR";}?><?php echo ' <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> VOLVER </i> </a></h1> 
						
										<div class="panel-body">
                            <div class="row">
                            <form action="actualizar_datos_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        <label>Datos personales</label>
										<div class="form-group input-group">
                                            <input type="hidden" value="'.$registro['id'].'" name="id">
											 <input type="hidden" value="'.$registro['rol'].'" name="rol">
											<span class="input-group-addon">Nombre</span> <input class="form-control" value="'.$registro['nombre'].'" placeholder="Nombre" name="nombre" id="nombre" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Apellido</span> <input class="form-control" value="'.$registro['apellido'].'" placeholder="Apellido" name="apellido" id="apellido" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Documento</span> <input class="form-control" value="'.$registro['documento'].'" placeholder="DNI" name="documento" required>
                                        </div>
										<label>Documento Tipo</label>
										<div class="form-group input-group">
										
                                            <span class="input-group-addon">Tipo</span> <select class="form-control" name="tipo_documento" required>
												<option value="'.$registro['tipo_documento'].'">'.$registro['tipo_documento'].'</option>
												<option value=""></option>
												<option>DNI</option>
                                                <option>LIBRETA DE ENROLAMIENTO</option>
                                                <option>PASAPORTE</option>
                                                <option>DU</option>
												<option>LIBRETA CIVICA</option>
											</select>
										<span class="input-group-addon">Nº</span> <input class="form-control" value="'.$registro['documento'].'" placeholder="DNI" name="documento" required>
                                        
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">E-mail</span> <input class="form-control" value="'.$registro['mail'].'" id="inputEmail" placeholder="E-mail" name="mail" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Telefono</span> <input class="form-control" value="'.$registro['telefono'].'" placeholder="Telefono" name="telefono">
                                        </div>
										
																		
										
										<div class="form-group">
										
											<div class="form-group input-group">
                                           <span class="input-group-addon">Provincia</span> <select class="form-control" name="provincia" >
                                                <option value="'.$registro['provincia'].'">'.$registro['provincia'].'</option>
												<option>BUENOS AIRES</option>
                                                <option>CAPITAL FEDERAL</option>
                                                <option>CATAMARCA</option>
                                                <option>CHACO</option>
                                                <option>CHUBUT</option>
												<option>CORDOBA</option>
												<option>CORRIENTES</option>
												<option>ENTRE RIOS</option>
												<option>FORMOSA</option>
												<option>JUJUY</option>
												<option>LA PAMPA</option>
												<option>LA RIOJA</option>
												<option>MENDOZA</option>
												<option>MISIONES</option>
												<option>NEUQUEN</option>
												<option>RIO NEGRO</option>
												<option>SALTA</option>
												<option>SAN JUAN</option>
												<option>SAN LUIS</option>
												<option>SANTA CRUZ</option>
												<option>SANTA FE</option>
												<option>SANTIAGO DEL ESTERO</option>
												<option>TIERRA DEL FUEGO</option>
												<option>TUCUMAN</option>
                                            </select>
                                        </div>
										</div>
																					
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Ciudad</span><input class="form-control" value="'.$registro['ciudad'].'" placeholder="Ciudad" name="ciudad" id="ciudad" onblur="upperCase()" required>
                                        </div> 
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Barrio</span><input class="form-control" placeholder="Barrio" value="'.$registro['barrio'].'" name="barrio" id="barrio" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Calle</span><input class="form-control" placeholder="Calle" value="'.$registro['calle'].'" name="calle" id="calle" onblur="upperCase()" required><span class="input-group-addon">Nº</span><input class="form-control" placeholder="N°" value="'.$registro['numero'].'" name="numero" required><span class="input-group-addon">CP</span><input class="form-control" placeholder="CP" value="'.$registro['codigo_postal'].'" name="codigo_postal" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Dpto</span> <select class="form-control" name="dpto" required>
												<option value="'.$registro['dpto'].'">'.$registro['dpto'].'º Piso</option>
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
											<span class="input-group-addon">Letra</span>
											<select class="form-control" name="letra" required>
												<option value="'.$registro['letra'].'">'.$registro['letra'].'</option>
                                                <option>-</option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												<option value="D">D</option>
												<option value="E">E</option>
											</select>
											<span class="input-group-addon">Nº</span><input class="form-control" placeholder="N°" value="'.$registro['n'].'" name="n" required>
                                        </div>
										  
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6"><label>Cuenta y Permisos</label><br>
										<div class="form-group input-group">
                                            <span class="input-group-addon">Usuario</span><input class="form-control" id="disabledInput" name="username" type="email" value="'.$registro['username'].'" placeholder="Correo Electrónico" disabled "/><div id="Info"></div>
											<input type="hidden" value="'.$registro['username'].'" name="username">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Contraseña</span><input type="password" class="form-control" placeholder="Contraseña" id="pwd" value="'.$registro['password'].'" name="password" required>
                                        </div>                                  
                                        
										<div class="form-group">
                                                <label for="disabledSelect">Rol</label>
												'; } ?><?php $rol=(int) $_GET['rol']; 
												if($rol==1) {echo "<input class='form-control' id='disabledInput' type='text' placeholder='Operador' value='' name='rol' disabled=''>";} 
												if($rol==2)	{echo "<input class='form-control' id='disabledInput' type='text' placeholder='Cliente' value='' name='rol' disabled=''>";}
												if($rol==0)	{echo "<input class='form-control' id='disabledInput' type='text' placeholder='Administrador' value='' name='rol' disabled=''>";}
												if($rol>=3)	{header('Location: http://noconvencional.comli.com/admin/Usuarios/error_rol_inexistente.php');}?>
										</div>
								   
								   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								<?php include "../includes_admin/modal.php"; ?>
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
		
	<!-- Convertir a Mayúscula -->
	<script type="text/javascript">
	function upperCase() {
	   var x=document.getElementById("nombre").value
	   document.getElementById("nombre").value=x.toUpperCase()
	   
	   var x=document.getElementById("apellido").value
	   document.getElementById("apellido").value=x.toUpperCase()
	   
	   var x=document.getElementById("barrio").value
	   document.getElementById("barrio").value=x.toUpperCase()
	   
	   var x=document.getElementById("ciudad").value
	   document.getElementById("ciudad").value=x.toUpperCase()
	   
	   var x=document.getElementById("calle").value
	   document.getElementById("calle").value=x.toUpperCase()
	}
	</script>	
	
	<!-- jQuery -->
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
		
        <!-- /#page-wrapper -->