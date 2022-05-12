<?php 
include "../includes_admin/botonera_admin.php";

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

<?php  
	$id_proveedor = $_GET['id_proveedor']; 

    $query = "select * from proveedor WHERE id_proveedor='$id_proveedor'"; 
    $result = mysql_query($query); 

while ($registro = mysql_fetch_array($result)){ 

echo '
<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Actualizar Proveedor</h1>
						
										<div class="panel-body">
                            <div class="row">
								<form action="actualizar_proveedor_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
									<div class="col-lg-6">
										<label>Datos personales</label>
                                        <div class="form-group input-group">
                                            <input type="hidden" value="'.$registro['id_proveedor'].'" name="id_proveedor">
											<span class="input-group-addon">Nombre</span><input class="form-control" value="'.$registro['nombre'].'" placeholder="Nombre" name="nombre">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Apellido</span><input class="form-control" value="'.$registro['apellido'].'" placeholder="Apellido" name="apellido">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Razon Social</span><input class="form-control" value="'.$registro['razon_social'].'" placeholder="Razon Social" name="razon_social">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">CUIT</span><input class="form-control" value="'.$registro['cuit'].'"  placeholder="CUIT" name="cuit">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">CUIL</span><input class="form-control" value="'.$registro['cuil'].'" placeholder="CUIL" name="cuil">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">E-mail</span><input class="form-control" value="'.$registro['mail'].'" id="inputEmail" placeholder="E-Mail" name="mail">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Telefono</span><input class="form-control" value="'.$registro['telefono'].'" placeholder="Telefono" name="telefono">
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Provincia</span><select class="form-control" name="provincia" value="'.$registro['provincia'].'">
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
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Ciudad</span><input class="form-control" value="'.$registro['ciudad'].'" placeholder="Ciudad" name="ciudad">
                                        </div>
										
										<div class="form-group input-group">
                                             <span class="input-group-addon">Barrio</span><input class="form-control" value="'.$registro['barrio'].'" placeholder="Barrio" name="barrio">
                                        </div>
										
										<div class="form-group input-group">
                                             <span class="input-group-addon">Calle</span><input class="form-control" value="'.$registro['calle'].'" placeholder="Calle" name="calle"><span class="input-group-addon">Nº</span><input class="form-control" value="'.$registro['numero'].'" placeholder="N°" name="numero">
                                        </div>
										
									</div>
                                
									</div>
									<!-- /.row (nested) -->
									<br>
									<button type="submit" class="btn btn-default" name="B1">Actualizar</button>
									<button type="reset" class="btn btn-default">Resetear</button>
									<a href="javascript:history.go(-1);" type="submit" class="btn btn-default" name="B1">Volver</a>
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