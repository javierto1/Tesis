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
<?php  
	$id_producto = $_GET['id_producto']; 

    $query = "select * from producto WHERE id_producto='$id_producto'"; 
    $result = mysql_query($query); 

while ($registro = mysql_fetch_array($result)){ 

echo '

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Actualizar <b>Producto</b> <small><i>('.$registro['denominacion'].')</i></small> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						<div class="panel-body">
                            <div class="row">
								<form id="formid" method="post" action="editar_producto_enviado.php">
									
									<div class="col-lg-12">
                                        
										<div class="form-group col-lg-4">
											<label>Codigo</label>
											<input type="hidden" value="'.$registro['id_producto'].'" name="id_producto">
											<input type="hidden" value="'.$registro['codigo'].'" name="codigo">
                                            <input class="form-control" placeholder="Codigo" value="'.$registro['codigo'].'" name="codigo" type="text" disabled>
                                        </div>
										
										<div class="form-group col-lg-8">
											<label>Denominacion</label>
											<input class="form-control" placeholder="Denominacion" value="'.$registro['denominacion'].'" name="denominacion" id="denominacion" onblur="upperCase()" type="text">
										</div>
										'; } ?>
									</div>	
									<div class="col-lg-12">
										<div class="panel-heading">
											<h4><i>Modificar caracteristicas posibles del producto:</i></h4>
										
										
										<div class="form-group">
                                           
											<?php 	$id_producto = $_GET['id_producto']; 
													$id_tipo1 =mysql_query("SELECT * FROM tipo");
													//traemos los tipos
													while ($registro = mysql_fetch_array($id_tipo1)){
													$nombre=	$registro['des_especifica'];
													$id_tipo = $registro['id_tipo'];
													echo'
													 <label>'.$nombre.'</label><br>';
													 //traemos las especificaiones de ese tipo
													 $id_especifica=mysql_query("SELECT * FROM especifica WHERE id_caracter=$id_tipo");
													
													while ($registro = mysql_fetch_array($id_especifica)){
														$material = $registro['denominacion'];
														$id_especifica1 = $registro['id_especifica'];
													
													echo'<label class="checkbox-inline"><input type="checkbox" name="material[]" value='.$id_especifica1.'
													'?><?PHP
													//comparamos las especificaciones y marcamos las coincidencias
													$query = "select * from detalle_producto WHERE id_producto=$id_producto AND id_tipo=$id_tipo AND id_especifica=$id_especifica1" ; 
													$result = mysql_query($query);
													while ($registro1 = mysql_fetch_array($result)){ 
													$especifica = $registro1['id_especifica'];
																																						
													if($id_especifica1==$especifica){
													echo 'checked="checked"';
													}else{
													echo 'checked=""';
													}
													
													}	
													echo'>'.$material.'</br></label>';
													}
													echo'</br><hr>';
													}?>
                                        </div>
										
                                    </div>
								 </div>
										
							</div>
						<br>
										<button type="submit" class="btn btn-default">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>	
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