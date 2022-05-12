<?php 

include_once "../includes_admin/dbcon.php";

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

<script>  

$(function(){

 $("#btn_enviar").click(function(){
 	var url = "agregar_detalle_material_enviado.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data){
               $('#info').html(data); // Mostrar la respuestas del script PHP.
           }
         });
 
    return false; // Evitar ejecutar el submit del formulario.
 });
});



//$("#info").html('<img src="loader.gif"/>').fadeOut(1000);

</script>
</head>

<body>

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      
                         <h1 class="page-header"><img src="../../images/iconos/Mas.png" height="70px" width="70px"/>Asignar <b>Detalles a Material</b> <a href="javascript:history.go(-1);" type="submit" class="btn btn-default pull-right" name="B1"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLVER</a></h1>
						
						<div align="center" class="col-sm-12">
								<div class="btn-group pull-center ">
									<a href='cargar_stock.php' type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Stock (Factura compra)'> </i> Agregar Stock (Factura compra)</a>
									<a href="listado_facturas.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-list-alt' aria-hidden='true' title='Listado Facturas'> </i> Listado Facturas Compra</a>
									<a href="nivel_stock.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-bar-chart' aria-hidden='true' title='Balance de Stock'> </i> Balance de Stock</a>
									<a href="nuevo_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-plus' aria-hidden='true' title='Agregar Material'> </i> Agregar Material</a>
									<a href="detalle_material.php" type="button" class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true' title='Definir Material'> </i> Definir Material</a>	
								</div>
						</div><hr><hr><hr>
						
						
                            
								<form id="formulario" class="form-inline" method="post" action="#">
								
									<div class="col-lg-10">
										<div class="panel-heading">
											
											
											
											<div class="form-group">
											<h4>Seleccionar la categoria a la que pertenecerá el detalle a cargar:</h4>											
												<?php include "../includes_admin/dbcon.php";
															  $query = mysql_query("SELECT * FROM materiales"); 
															  while($row = mysql_fetch_array($query)){ ?>
												<label class="radio-inline">
												 <input type="radio" name="optionsRadiosInline" id="<?php echo $row['id_materiales']?>" value="<?php echo $row['id_materiales']?>" checked="" required> <a type="button" class="btn btn-outline btn-default btn-sm"> <?php echo $row['denominacion'] ?>  </a></input>
											   </label>	
											   <?php }; ?>
												
											   
											</div>
											<hr>
										
										</div>
									</div>
										<div class="col-lg-10">

											<div class="form-group">
											<h4>Introducir el nombre del material:</h4>
											<input class="form-control" placeholder="Detalle del material" id="fname1" onblur="upperCase()" name="denominacion" id="denominacion" type="text" required="required">
											<input type="button" class="btn btn-default" id="btn_enviar" value="Cargar">	
											</div>
											</form>
											<div id="info"></div>
											<BR>
										</div>
										
										<br>
										<div class="col-lg-10">
											<div class="panel panel-default">
												<div class="panel-heading">
													<span class="glyphicon glyphicon-asterisk"> </span> <b><i>RECUERDE!</i></b> 
												</div>
												<div class="panel-body">
													<h5><u>ÚLTIMOS DETALLES DE MATERIALES REGISTRADOS: </u> <h5>
													<?php include "../includes_admin/dbcon.php";
														  $query = mysql_query("SELECT * FROM detalle_materiales ORDER BY id_item DESC limit 10"); 
														  while($row = mysql_fetch_array($query)){ ?>
														  <b> 
															<small class="text-muted"></SMALL> <?php echo $row['denominacion']  ?><span class="glyphicon glyphicon-option-horizontal"> </span> 
															<?php }; ?>
														  </b>
														  <hr>
														  	<BR>
														  	<I>
																<small> 
																Primero debe seleccionar la categoria a la que pertenece el detalle que luego se va a ingresar! Ejemplo: <b>Categoria:</b> Papel. <b>Detalle:</b> Papel ilustracion 150 G . 
																</small>
															</I>
														  	<br>
														 													
												</div>
												
											</div>
										</div>
										
										
							</div>
										
										<br>
										
										
								
							</div>
							<!-- /.row -->
						</div>
						<!-- /.panelbody -->			
					</div>
                    <!-- /.col-lg-12 -->
                
				</div>
				
			</div>
							
		</div>
				
</body>
<script type="text/javascript">
function upperCase() {
    
   var x=document.getElementById("fname1").value
   document.getElementById("fname1").value=x.toUpperCase()
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