
<?php 
include "../includes_admin/botonera_admin.php";

//$id= '6';
include "../includes_admin/dbcon.php";
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />

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
                         <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Actualizar <b>'.$registro['apellido'].', '.$registro['nombre'].'</b> <small><i>(Proveedor)</i></small> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1> 
						
										<div class="panel-body">
                            <div class="row">
								<form action="actualizar_proveedor_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
									<div class="col-lg-6">
										<label>Datos personales</label>
                                        <div class="form-group input-group">
                                            <input type="hidden" value="'.$registro['id_proveedor'].'" name="id_proveedor">
											<span class="input-group-addon">Nombre</span><input class="form-control" value="'.$registro['nombre'].'" placeholder="Nombre" name="nombre" id="nombre" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Apellido</span><input class="form-control" value="'.$registro['apellido'].'" placeholder="Apellido" name="apellido" id="apellido" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Razón Social</span><input class="form-control" value="'.$registro['razon_social'].'" placeholder="Razon Social" name="razon_social" id="razon_social" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">CUIT/CUIL</span><input class="form-control" value="'.$registro['cuit'].'"  placeholder="CUIT" type="numeric" name="cuit" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">E-mail</span><input class="form-control" value="'.$registro['mail'].'" id="inputEmail" placeholder="E-Mail" name="mail" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Teléfono</span><input class="form-control" value="'.$registro['telefono'].'" placeholder="Telefono" name="telefono" required>
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
                                            <span class="input-group-addon">Ciudad</span><input class="form-control" value="'.$registro['ciudad'].'" placeholder="Ciudad" name="ciudad" id="ciudad" onblur="upperCase()" required>
                                        </div> 
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Barrio</span><input class="form-control" placeholder="Barrio" value="'.$registro['barrio'].'" name="barrio" id="barrio" onblur="upperCase()" required>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Calle</span><input class="form-control" placeholder="Calle" value="'.$registro['calle'].'" name="calle" id="calle" onblur="upperCase()" required><span class="input-group-addon">N°</span><input class="form-control" placeholder="N°" value="'.$registro['numero'].'" name="numero" required><span class="input-group-addon">CP</span><input class="form-control" placeholder="CP" value="'.$registro['codigo_postal'].'" name="codigo_postal" required>
                                        </div>
										
									</div>
									';}?>
									<div class="col-lg-6">
										<div class="form-group col-lg-12">
                                            <label>Materiales que provee:</label><br>
											
											
																						<?php 						$id_proveedor = $_GET['id_proveedor']; 
																													$id_materiales =mysql_query("SELECT * FROM materiales");
																													while ($registro = mysql_fetch_array($id_materiales)){
																													$material = $registro['id_materiales'];
																													echo'
																													<label class="checkbox-inline"><input type="checkbox" name="material[]" value='.$material.'
																													'?><?PHP
																													$query = "select * from detalle_proveedor WHERE id_proveedor=$id_proveedor AND id_materiales=$material"; 
																													$result = mysql_query($query);
																													while ($registro1 = mysql_fetch_array($result)){ 
																																$id_material1 = $registro['id_material'];																										
																													if($material==$id_material1){
																														echo 'checked="checked"';
																														}else{
																															echo 'checked=""';
																															  }
																																}
																																
																																?>
																																
																						<?php
																						echo'>'.$registro['denominacion'].'</label>';
																						}
																						?>
										</div>
                                
									</div>
							</div>		
							  </div>
                                <!-- /.col-lg-6 (nested) -->
								<?php include "../includes_admin/modal.php"; ?>
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
	
	<!-- Convertir a May�scula -->
	<script type="text/javascript">
	function upperCase() {
	   var x=document.getElementById("nombre").value
	   document.getElementById("nombre").value=x.toUpperCase()
	   
	   var x=document.getElementById("apellido").value
	   document.getElementById("apellido").value=x.toUpperCase()
	   
	   var x=document.getElementById("razon_social").value
	   document.getElementById("razon_social").value=x.toUpperCase()
	   	   
	   var x=document.getElementById("ciudad").value
	   document.getElementById("ciudad").value=x.toUpperCase()

	   var x=document.getElementById("barrio").value
	   document.getElementById("barrio").value=x.toUpperCase()
	   
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