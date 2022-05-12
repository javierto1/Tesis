<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>

<body>
    <header>REPORTE USUARIOS</header>
    <section>
		<table border="0" align="center">
			<tr>
				<td width="335">
					<input class="form-control" type="text" placeholder="Busca un usuario por: Nombre o DNI" id="bs-prod"/>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbspDesde:&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td>
					<input class="form-control" type="date" id="bd-desde"/>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbspHasta:&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td>
					<input class="form-control" type="date" id="bd-hasta"/>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td width="100">
					<button id="nuevo-producto" class="btn btn-primary">Nuevo Usuario</button>
				</td>
				
			</tr>
		</table>
	
    </section>

    <div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    
	
	
	<!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Nuevo Usuario</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<div class="panel-body">
                            <div class="row">
                            <form action="nuevo_operador_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        
										<div class="form-group col-lg-12">
                                            <label>Cuenta de Usuario</label>
                                            <input id="username" class="form-control" name="username" type="email" value="" placeholder="Correo Electrónico" required "/><div id="Info"></div>
                                        </div>
										
										<div class="form-group col-lg-12">
                                            
                                            <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="password" type="password" required>
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
											<label>Doc. Tipo</label>
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
                                            <input class="form-control" placeholder="Número" name="dni" id="dni" type="number" required>
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
										
										<div class="form-group col-lg-3" >
                                            <label>Letra</label>
                                            <select class="form-control " name="letra" type="text" required>
                                                <option value="">--</option>
												<option value="-"><i>Ningún</i></option>
												<option>A</option>
												<option>B</option>
												<option>C</option>
												<option>D</option>
												<option>F</option>
											</select>
                                        </div>
										<div class="form-group col-lg-3" >
                                            <label>Nº</label>
                                            <select class="form-control " name="n" type="number" required>
                                                <option value="">--</option>
												<option value="-"><i>Ningún</i></option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
                                        </div>
								   
										
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
								</div>
            </div>
            
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
      

</body>
</html>
