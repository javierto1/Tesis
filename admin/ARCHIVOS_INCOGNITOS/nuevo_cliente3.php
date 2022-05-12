<?php 

include "conexion.php";

//include('dbcon.php');?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/jquery-ui.theme.css" rel="stylesheet">
    <link href="css/jquery.css" rel="stylesheet">
	<link href="css.css" media="screen" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>

<!--<script type="text/javascript" src="valida_envia.js"></script>-->
<script src="jquery-1.7.2.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript" src="validar.js"></script>

<script type="text/javascript">
$(document).ready(function() {	
	$("#ok").hide();
    $("#formid").validate({
        rules: {
            nombre: { required: true, minlength: 2},
            apellido: { required: true, minlength: 2},
            email: { required:true, email: true},
			dni: { required: true},
            tel: { required:true, minlength: 13},            
            calle: { required:true, minlength: 4},
			numero: { required:true, minlength: 2},
			barrio: { required:true, minlength: 6},
			ciudad: { required:true, minlength: 6},
			username: { required:true, minlength: 6},
			password: { required:true, minlength: 6},
        },
        messages: {
            nombre: "Debe introducir su nombre.",
            apellido: "Debe introducir su apellido.",
            email : "Debe introducir un email válido.",
			dni : "Debe introducir solo números.",
            tel : "El número de teléfono introducido no es correcto.",            
            calle : "El campo calle es obligatorio.",
			numero : "El campo numero es obligatorio.",
			barrio : "El campo barrio es obligatorio.",
			ciudad : "El campo ciudad es obligatorio.",
			username : "El campo nick es obligatorio.",
			password : "El campo contraseña es obligatorio.",
        },
        submitHandler: function(form){
            var dataString = 'nombre='+$('#nombre').val()+'&apellido='+$('#apellido').val()+'...';
            $.ajax({
                type: "POST",
                url:"nuevo_cliente_enviado.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#formid").hide();
                }
            });
        }
    });	
});    
</script>
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
								<form id="formid" method="post" action="nuevo_cliente_enviado.php">
									<div id="ok"></div>
									<div class="col-lg-6">
									
											<div class="form-group">
												<label>Datos personales</label>
												<input class="form-control" type="text" placeholder="Name" name="nombre" id="nombre">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="Lastname" name="apellido" id="apellido">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="DNI" name="dni" id="dni">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" id="inputEmail" placeholder="E-mail" name="email" id="email">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="Telefono" name="tel" id="tel">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="Calle" name="calle" id="calle">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="N°" name="numero" id="numero">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="Departamento" name="dpto">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="Codigo Postal" name="codigo_postal">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="Barrio" name="barrio" id="barrio">
											</div>
											<div class="form-group">
                                            
												<input class="form-control" placeholder="Ciudad" name="ciudad" id="ciudad">
											</div>
											<div class="form-group">
												<label>Provincia</label>
												<select class="form-control" name="provincia">
                                                <option>Buenos Aires</option>
                                                <option>Catamarca</option>
                                                <option>Chaco</option>
                                                <option>Chubut</option>
                                                <option>Cordoba</option>
												<option>Formosa</option>
												<option>Jujuy</option>
												<option>La Pampa</option>
												<option>La Rioja</option>
												<option>Mendoza</option>
												<option>Misiones</option>
												<option>Neuquen</option>
												<option>Rio Negro</option>
												<option>Salta</option>
												<option>San Juan</option>
												<option>San Luis</option>
												<option>Santa Cruz</option>
												<option>Santa Fe</option>
												<option>Santiago del Estero</option>
												<option>Tierra del Fuego</option>
												<option>Tucuman</option>
												</select>
											</div>
									</div>
									<!-- /.col-lg-6 (nested) -->
									<div class="col-lg-6"><label>Cuenta y Permisos</label><br>
											<div class="form-group">
                                            
												<input id="username" class="form-control" name="username" type="text" value="" placeholder="Usuario"/><div id="Info"></div>
											</div>
											<div class="form-group">
                                            
												<input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="password">
											</div>
											<div class="form-group">
                                            
												<input type="password" class="form-control" placeholder="Repetir Contraseña" id="pwd">
											</div>
                                        
											<div class="form-group">
												<label>Foto de Perfil</label>
												<input type="file">
											</div>
											<div class="form-group">
													<label for="disabledSelect">Rol</label>
													<input class="form-control" id="disabledInput" type="text" placeholder="Cliente" name="rol" disabled="">
												</div>
								   
										<div class="form-group">
												<label>Permiso nivel:</label>
												<label class="radio-inline">
													<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked="">1
												</label>
												<label class="radio-inline">
													<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
												</label>
												<label class="radio-inline">
													<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
												</label>
										</div>
											<div class="form-group">
												<label>Estado</label>
												<div class="radio">
													<label>
														<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" name="estado" checked="">Bloqueado
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="optionsRadios" id="optionsRadios2" name="estado" value="option2">Desbloqueado
													</label>
												</div>
											</div>
									</div>
									<!-- /.col-lg-6 (nested) -->
								
                            
									<!-- /.row (nested) -->
									
									
									</div>
										<!--<button type="submit" class="btn btn-default">Guardar</button>
										<button type="reset" class="btn btn-default">Resetear</button>-->
										<input id="button" type="submit" value="Enviar" style=" margin-left:565px;" />
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

</html>