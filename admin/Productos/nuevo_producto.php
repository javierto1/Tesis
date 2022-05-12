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
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Nuevo <b>Producto</b> <small><i></i></small> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						<div class="panel-body">
                            <div class="row">
								<form id="formid" method="post" action="nuevo_producto_enviado.php" enctype="multipart/form-data">
									
									<div class="col-lg-12">
                                        
										<div class="form-group col-lg-3">
											<label>Codigo</label>
											<?php
											$query = "SELECT MAX(id_producto)+1 FROM producto"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
                                            <input class="form-control" value="01-<?php echo $registro['MAX(id_producto)+1']; ?>" disabled>
											<input type="hidden" value="01-<?php echo $registro['MAX(id_producto)+1']; ?>" name="codigo" id="codigo" type="text" >
											<?php; } ?>
														
                                        </div>
                                        <div class="form-group col-lg-3">
                                        	<label>Categoria</label>
											<select class="form-control" placeholder="Categoria" name="Categoria" id="Categoria">
												
											<?php
											$query = "SELECT * FROM cat_productos"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
                                            
                                            	<option class="form-control" value="<?php echo $registro["id_cat"];?>"><?php echo $registro["denominacion"];?></option>

                                            
											<?php; } ?>
											</select>
										</div>
										
										<div class="form-group col-lg-6">
											<label>Denominacion</label>
											<input class="form-control" placeholder="Denominacion" name="denominacion" id="denominacion" onblur="upperCase()" type="text" required>
										</div>
										
									</div>	
								<div class="col-lg-12">
									<div class="panel-heading">
											<h4><i>Seleccione caracteristicas posibles del producto:</i></h4>
										
										<div class="form-group">
                                            <label>MODULO</label><br>
											<?php
											$query = "select * from especifica where id_caracter=5"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="caracteristica5[]" value="<?php echo $registro['id_especifica'] ?>"><?php echo $registro["denominacion"];?>
                                            </label>
                                           <?php; } ?>
											<input type="hidden" name="tipo5" id="tipo"  value="5"> 
                                        </div>
										
										<hr>
										
										<div class="form-group">
                                            <label>IMPRESION</label><br>
											
											<?php
											$query = "select * from especifica where id_caracter=1"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="caracteristica1[]" value="<?php echo $registro['id_especifica'] ?>"><?php echo $registro["denominacion"];?>
                                            </label>
                                            <?php; } ?>
											<input type="hidden" name="tipo1" id="tipo"  value="1"> 
                                        </div>
										
										<hr>
										
										<div class="form-group">
                                            <label>SOPORTE</label><br>
											<?php
											$query = "select * from especifica where id_caracter=2"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
											 <label class="checkbox-inline">
                                                <input type="checkbox" name="caracteristica2[]" value="<?php echo $registro['id_especifica'] ?>"><?php echo $registro["denominacion"];?>
                                            </label>
                                            <?php; } ?>
											<input type="hidden" name="tipo2" id="tipo"  value="2"> 
                                        </div>
										<hr>
										<div class="form-group">
                                            <label>CANTIDADES</label><br>
											<?php
											$query = "select * from especifica where id_caracter=3"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="caracteristica3[]" value="<?php echo $registro['id_especifica'] ?>"><?php echo $registro["denominacion"];?> UNIDADES
                                            </label>
                                            <?php; } ?>
											<input type="hidden" name="tipo3" id="tipo"  value="3"> 
                                        </div>
										
										<hr>
										
										<div class="form-group">
                                            <label>TERMINACIONES</label><br>
											<?php
											$query = "select * from especifica where id_caracter=4"; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											?>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="caracteristica4[]" value="<?php echo $registro['id_especifica'] ?>"><?php echo $registro["denominacion"];?>
                                            </label>
                                           <?php; } ?>
											<input type="hidden" name="tipo4" id="tipo"  value="4"> 
                                        </div>
										
										<hr>
										
										
                                        <!--Upload-->
                                        <div class="form-group">

                                        <input type="hidden" name="MAX_FILE_SIZE" value="999000"> 
   	
										   	<label>ARCHIVO</label>
										   	
										   	<input name="userfile" type="file" class="btn btn-success"> 
										</div>
										<div class="form-group">
											<label>DESCRIPCIÓN DEL PRODUCTO</label>
											<textarea class="form-control" placeholder="Descripción" name="descripcion" id="descripcion" onblur="upperCase()" type="text" required></textarea>
											
												
												<label>PRECIO ESTIMADO</label>
											<input class="form-control " placeholder="Precio estimado" name="promo_precio" id="promo_precio"  type="number" required>
											
										</div>
										<?php include "../includes_admin/modal.php"; ?>
										
                                    </div>
								</div>
										
							</div>
							<br>
										
										<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>
										<br>
						</div>
										<!--<button type="submit" class="btn btn-default">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>-->
										
								</form>
					</div>
							<!-- /.row -->
				</div>
						<!-- /.panelbody -->			
                </div>
                    <!-- /.col-lg-12 -->
					
					<!-- Trigger the modal with a button -->





                
		</div>
				
</body>

	<!-- Convierte en Mayúscula -->
	<script type="text/javascript">
	function upperCase() {
	   var x=document.getElementById("denominacion").value
	   document.getElementById("denominacion").value=x.toUpperCase()
	   
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