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
<script type="text/javascript">
$(document).ready(function() {	
	$('#username').blur(function(){
		
		$('#Info').html('<img src="../loader.gif" alt="" />').fadeOut(1000);

		var username = $(this).val();		
		var dataString = 'username='+username;
		
		$.ajax({
            type: "POST",
            url: "../check_username_availablity.php",
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

?>
<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Actualizar <?php		$rol=(int) $_GET['rol']; 
																																			if($rol==1) {echo "Operador";} 
																																			if($rol==2)	{echo "Cliente";}
																																			if($rol==0)	{echo "Administrador";}
																																			if($rol>=3)	{header('Location: http://noconvencional.comli.com/admin/Actualizar_operador/error_rol_inexistente.php');}

																																			else if ($rol!=0 & 1 & 2) {echo "ERROR";}?><?php echo '</h1>
						
										<div class="panel-body">
                            <div class="row">
                            <form action="actualizar_datos_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        <label>Datos personales</label>
										<div class="form-group input-group">
                                            <input type="hidden" value="'.$registro['id'].'" name="id">
											 <input type="hidden" value="'.$registro['rol'].'" name="rol">
											<span class="input-group-addon">Nombre</span> <input class="form-control" value="'.$registro['nombre'].'" placeholder="Nombre" name="nombre">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Apellido</span> <input class="form-control" value="'.$registro['apellido'].'" placeholder="Apellido" name="apellido">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Documento</span> <input class="form-control" value="'.$registro['documento'].'" placeholder="DNI" name="dni">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">E-mail</span> <input class="form-control" value="'.$registro['mail'].'" id="inputEmail" placeholder="E-mail" name="mail">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Telefono</span> <input class="form-control" value="'.$registro['telefono'].'" placeholder="Telefono" name="telefono">
                                        </div>
										
										
										
										
										<div class="form-group">
										
											<div class="form-group input-group">
                                           <span class="input-group-addon">Provincia</span> <select class="form-control" name="provincia" >
                                                <option value="'.$registro['id'].'">'.$registro['provincia'].'</option>
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
                                            <span class="input-group-addon">Ciudad</span><input class="form-control" value="'.$registro['ciudad'].'" placeholder="Ciudad" name="ciudad">
                                        </div> 
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Barrio</span><input class="form-control" placeholder="Barrio" value="'.$registro['barrio'].'" name="barrio">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Calle</span><input class="form-control" placeholder="Calle" value="'.$registro['calle'].'" name="calle"><span class="input-group-addon">Nº</span><input class="form-control" placeholder="N°" value="'.$registro['numero'].'" name="numero"><span class="input-group-addon">CP</span><input class="form-control" placeholder="CP" value="'.$registro['codigo_postal'].'" name="codigo_postal">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Dpto</span> <select class="form-control" value="'.$registro['dpto'].'" name="dpto">
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
											<span class="input-group-addon">Letra</span><select class="form-control" name="dpto">
                                                <option>-</option>
												<option>A</option>
												<option>B</option>
												<option>C</option>
												<option>D</option>
												<option>F</option>
											</select>
                                        </div>
										  
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6"><label>Cuenta y Permisos</label><br>
										<div class="form-group input-group">
                                            <span class="input-group-addon">Usuario</span><input id="username" class="form-control" name="username" type="text" value="'.$registro['username'].'" placeholder="Usuario" /><div id="Info"></div>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Contraseña</span><input type="password" class="form-control" placeholder="Contraseña" id="pwd" value="'.$registro['password'].'" name="password">
                                        </div>                                  
                                        
										<div class="form-group">
                                                <label for="disabledSelect">Rol</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="Operador" value="" name="rol" disabled="">
                                            </div>
								   
								   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
                            </div>
                            <!-- /.row (nested) -->
							<br>
                        <button type="submit" class="btn btn-default" name="B1">Actualizar</button>
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