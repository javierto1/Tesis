<?php 

 include "../includes_admin/dbcon.php";

//include('dbcon.php');?>

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
<script src="../js/jquery-1.7.2.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/jquery-latest.js"></script><!--add div-->
<script type="text/javascript" src="../js/jquery.addfield.js"></script><!--add div-->

<script type="text/javascript">
$(document).ready(function() {	
	$('#buscar_proveedor').blur(function(){
		
		$('#info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

		var buscar_proveedor = $(this).val();		
		var dataString = 'buscar_proveedor='+buscar_proveedor;
		
		$.ajax({
            type: "POST",
            url: "check_proveedor.php",
            data: dataString,
            success: function(data) {
				$('#info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    



$(document).ready(function() {
	//ACA le asigno el evento click a cada boton de la clase bt_plus y llamo a la funcion addField
		$(".btn-primary").each(function (el){
			$(this).bind("click",addField);
									 });
							});
 
 
function addField(){
// ID del elemento div quitandole la palabra "div_" de delante. Pasi asi poder aumentar el número. Esta parte no es necesaria pero yo la utilizaba ya que cada campo de mi formulario tenia un autosuggest , así que dejo como seria por si a alguien le hace falta.
 
var clickID = parseInt($(this).parent('div').attr('id').replace('div_',''));
 
// Genero el nuevo numero id
var newID = (clickID+1);
 
// Creo un clon del elemento div que contiene los campos de texto
$newClone = $('#div_'+clickID).clone(true);

 
//Le asigno el nuevo numero id
$newClone.attr("id",'div_'+newID);

//Asigno nuevo id al primer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("input").eq(0).attr("id",'cantidad'+newID).val('');
 
//Asigno nuevo id al primer campo selesct dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("select").eq(0).attr("id",'materiales'+newID).val('');

//Asigno nuevo id al segundo campo select dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("select").eq(1).attr("id",'tamaño'+newID).val('');

//Asigno nuevo id al segundo campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("input").eq(1).attr("id",'precio'+newID).val('');

//Asigno nuevo id al tercer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("input").eq(2).attr("id",'lote'+newID).val('');
 
//Borro el valor del segundo campo input(este caso es el campo de cantidad)
$newClone.children("input").eq(1).val('');

//Borro el valor del segundo campo input(este caso es el campo de cantidad)
$newClone.children("input").eq(2).val('');
 
//Asigno nuevo id al boton
$newClone.children("input").eq(3).attr("id",newID)
 
//Inserto el div clonado y modificado despues del div original
$newClone.insertAfter($('#div_'+clickID));
 
//Cambio el signo "+" por el signo "-" y le quito el evento addfield
$("#"+clickID).val('-').unbind("click",addField);
 
//Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
$("#"+clickID).bind("click",delRow);					
 
}
 
 
function delRow() {
// Funcion que destruye el elemento actual una vez echo el click
$(this).parent('div').remove();
 
}
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
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Añadir material al Stock</h1>
																<div class="row">

																	<div align="center" class="col-sm-12">
								<span class="pull-top">
									
										<a class="button button-pill button-royal" href='http://noconvencional.comli.com/admin/Stock/nuevo_material.php'>
											<img src="../../images/iconos/Mas.png" height="35px" width="35px">Agregar Material
										</a>
										<a class="button button-pill button-royal" href='http://noconvencional.comli.com/admin/Stock/detalle_material.php'>
											<img src="../../images/iconos/Mas.png" height="35px" width="35px">Definir Material
										</a>
										
										
								</span>
							</div>
																	<form class="form-inline" action="grabar_stock.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
																	<div class="col-lg-6">                                        
																		<div class="form-group col-lg-12">
								                                            <label>Carga de facturas</label></br></br>
																			<label>Ingrese el cuit o cuil del proveedor <small>(Sin guiones)</small></label>
																			<div class="form-group col-lg-12">
								                                           <input  placeholder="Buscar Proveedor" name="buscar_proveedor" type="text" id="buscar_proveedor" required><div id="info"></br></br></div>
																			</div>
																		</div>
																	
																	</div>																
																<!--</form>-->
															</div>
					</div>
   											
					<div class="row">
					 <!-- Modulo carga de facturas e items-->
								<!--<form id="formid" method="post" action="nuevo_stock_enviado.php">-->
                                    
										<div class="col-lg-12">
											<div class="form-group col-lg-5">
												<label>N° Factura</label>
													<input  class="form-control" placeholder="N°" name="numero" type="number" required>
											</div>
											<div class="form-group col-lg-3">
												<label>Tipo</label>
													<select class="form-control" name="tipo" type="text" required>
														<option>--</option>
														<option>A</option>
														<option>B</option>
														<option>C</option>
													</select>
											</div>
											
											<div class="form-group col-lg-4">
												<label>FECHA</label>
													<input class="form-control" type="date" name="bday">
											</div>
											
											
										</div>
							 

                            <div id="stylized">
									<!--<form id="form" name="form" method="post" class="form-inline" action="index.php">--> 
									
									<h4>Compra de material</h4>
									
							<div id="div_1" class="form-group col-lg-12">
										
										<input  class="col-md-2" type="text"  placeholder="Cantidad"  name="cantidadmateriales[]" id="cantidad1"/>
										
									 	<select class="col-md-2" name="materiales[]" id="materiales1" required>
														<option value="0">--</option>
														<!-- Listar Paises -->
															<?php
															$query = "select * from detalle_materiales"; 
													$query1= mysql_query($query); 
															while($row = mysql_fetch_array($query1)){
															?>
																	<option value="<?php echo $row['id_item'] ?>">
																	<?php echo $row['denominacion'] ?>
																	</option>
																	<?php
																									}
																		?>
													</select> 
													
													<select class="selectpicker col-md-2" data-size="5" name="tamanomateriales[]" id="tamano1" type="text" required>
														<option>--</option>
														<option>65 x 95</option>
														<option>72 x 102</option>
														<option>70 x 70</option>
														<option>70 x 90</option>
														<option>80 x 100</option>
													</select>
													
									 	
									    <input  class="col-md-2" type="text"   placeholder="Precio unitario" name="preciomateriales[]" id="precio1"/>
									    
									   
									    <input  class="col-md-2" type="text"   placeholder="Lote" name="lotemateriales[]" id="lote1"/>
									    
										
									    <input class="btn-primary" id="1" name="mas" type="button" value="+" />
									    
									
							</div>

									
									
									
									</div> 
										<div class="error_form"></div>
									
									</form>	
									 </table>
									 
											
										
									<!--</form>-->
								
										<!-- <div class="col-lg-12">
                    						
										<button type="submit" class="btn btn-default">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>
										<a href="javascript:history.go(-1);" type="submit" class="btn btn-default" name="B1">Volver</a>
										<!--<input id="button" type="submit" value="Enviar" style=" margin-left:565px;" />-->
		
										</div> 
		
						
        
		</body>

    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

</html>