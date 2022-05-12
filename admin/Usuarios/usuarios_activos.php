<?php
include ("../includes_admin/botonera_admin.php");

include ("../seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//	exit();
//}

?>
<div id="page-wrapper">
	<div class="col-lg-12">
                    <h1 class="page-header">Usuarios Activos</h1>
    
		<div class="row">
               <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Lista Usuarios Activos
                            <div class="pull-right">
                                <div class="btn-group">
								<!-- /.panel-heading 
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
									-->
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead><h3><i>Operadores</i></h3>
                                                <tr>
                                                    <th>Username</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>DNI</th>
                                                    <th>Desde</th>
													<th>Hora</th>
                                                    
												</tr>
                                            </thead>
                                            <tbody>
											
											<?php
											include('../includes_admin/dbcon.php');
											
											$hora= date('H:i:s');
											$fecha= date('Y-m-d');
											
											$query = "select * from datos_personales where estado='desbloqueado' AND rol='1' ORDER BY  `datos_personales`.`nombre` ASC LIMIT 0 , 5"; 
											$result1 = mysql_query($query); 
	
											while ($registro1 = mysql_fetch_array($result1)){ 
											
											echo " 
                                                <tr>
                                                    <td>".$registro1['username']."</td>
													<td>".$registro1['nombre']."</td>
													<td>".$registro1['apellido']."</td>
													<td>".$registro1['documento']."</td>
													<td>".$fecha."</td>
													<td>".$hora."</td>
                                                   
                                                </tr>
                                                
                                                "; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
								
								
								
								
								<div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead> <h3><i>Clientes</i></h3>
                                                <tr>
                                                    <th>Username</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>DNI</th>
                                                    <th>Desde</th>
                                                    
												</tr>
                                            </thead>
                                            <tbody>
											
                                                <?php
											include('../includes_admin/dbcon.php');
											
											$query = "select * from datos_personales where estado='desbloqueado' AND rol='2' ORDER BY  `datos_personales`.`nombre` ASC LIMIT 0 , 5"; 
											$result1 = mysql_query($query); 
	
											while ($registro1 = mysql_fetch_array($result1)){ 
											
											echo " 
                                                <tr>
                                                    <td>".$registro1['username']."</td>
													<td>".$registro1['nombre']."</td>
													<td>".$registro1['apellido']."</td>
													<td>".$registro1['documento']."</td>
													<td>1/2/2016</td>
                                                   
                                                </tr>
                                                
                                                "; } ?>
                                            </tbody>
											
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
								
								
								
								
								
					</div>
				</div>
			</div>
			<a href="http://noconvencional.comli.com/admin" type="submit" class="btn btn-default" name="B1">Volver</a>
		</div>
	</div>
</div>





<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>