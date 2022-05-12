
<div class="row">
			<div class="col-lg-1"></div>
				<div class="well col-lg-10" style="background-image: url('images/fondo.jpg');">
											<!-- Nav Bar -->
											<div class="bs-example" data-example-id="default-navbar"> 
												<nav class="navbar navbar-default"> 
													<div class="container-fluid col-centered" >  
														<div class="navbar-header"> 
															<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> 
																<span class="sr-only">Toggle navigation</span> 
																<span class="icon-bar"></span> <span class="icon-bar"></span> 
																<span class="icon-bar"></span> 
															</button> 
																<a class="navbar-brand" href="index.php">Inicio</a> 
														</div>  
														<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
															<ul class="nav navbar-nav"> 
																<li class="active">
																	<a href="productos.php">Productos <span class="sr-only">(current)</span></a>
																</li> 
																
															</ul> 
															<!--<form class="navbar-form navbar-left" role="search"> 
																<div class="form-group"> 
																	<input type="text" class="form-control" placeholder="Ingrese su búsqueda"> 
																</div> 
																	<button type="submit" class="btn btn-default">Buscar</button> 
															</form> -->
															
															<ul class="nav navbar-nav navbar-right">
															<li>
																<a href="mis_pedidos.php">Mis Pedidos</a>
															</li> 
															<li class="dropdown">
																<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																	<span class="glyphicon glyphicon-user"></span> 
																	<strong><?php echo $_SESSION['nombre'];?></strong>
																	<span class="glyphicon glyphicon-chevron-down"></span>
																</a>
																<ul class="dropdown-menu">
																	<li>
																		<div class="navbar-login col-lg-12">
																			<div class="row">
																			    <div class="col-lg-4 thumbnail">
																					<p class="text-center">
																						<img class="responsive" src="images/Img/avatar.png" width="60px" height="60px" />
																					</p>
																				</div>
																				<div class="col-lg-8"> 
																				
																					<p class="text-left"><strong>Username:</strong></p>
																					<p class="text-left small"><?php echo $_SESSION['um'];?></p>
																					<p class="text-left">
																						<strong>
																							
																							<a href="mis_datos.php" type="button" class="btn btn-success btn-block-sm pull-left" >Mis Datos</a>
																							<a href="logout.php" type="button" class="btn btn-danger btn-block-sm pull-right">Salir</a>
																						</strong>
																					</p>
																					
																					
																				</div>
																				
																			</div>
																		</div>
																	</li>
																	<li class="divider"></li>
																	<li>
																			<div class="row">
																					<div class="navbar-login navbar-login-session col-lg-12">
																						<div class="pull-right"> 
																							<p>  
																								
																								
																							</p>
																						</div>
																					</div>
																			</div>	
																			
																		
																	</li>
																</ul>
															</li>
														</ul>
														</div> 
													</div> 
												</nav>
											</div>
											<!-- FIN Nav Bar -->
				</div>
</div>
