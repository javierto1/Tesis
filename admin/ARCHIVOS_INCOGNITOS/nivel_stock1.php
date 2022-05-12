<?php
include ("includes_admin/botonera_admin.php");
include('dbcon.php');   
include ("seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//	exit();
//}

?>
<div id="page-wrapper">
	<div class="col-lg-12">
                    <h1 class="page-header">Stock</h1>
    
		<div class="row">
               <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Niveles de Stock
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
                                <div class="col-lg-12">
								<?php
																						
											$query = "select * from stock ORDER BY  `stock`.`porcentaje` DESC LIMIT 5 "; 
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){

											$registro['porcentaje'];
											if($registro['porcentaje']>=79){
											$msj="bar-danger";	
											}
											if($registro['porcentaje']>=51 && $registro['porcentaje']<=78){
												$msj="bar-warning";
											}
											if($registro['porcentaje']<=50){
												$msj="bar-success";
											} 
												
											
											
											?>

										<a href="#">
											<div>
												<p>
													<strong><?echo $registro['material'];?></strong>
													<span class="pull-right text-muted"><? echo $registro['porcentaje'];?>% Gastado</span>
												</p>
												<div class="progress progress-striped active">
													<div class="progress-bar progress-<?echo $msj;?>" role="progressbar" aria-valuenow="<?echo $registro['porcentaje'];?>" aria-valuemin="0" aria-valuemax="100" style="width:<?echo $registro['porcentaje'];?>%">
														<span class="sr-only"><?echo $registro['porcentaje'];?>% Gastado (success)</span>
													</div>
												</div>
											</div>
										</a>
									<?php ;}
									?>
									
										<!--<a href="#">
											 <div>
												<p>
                                        <strong>Material 2</strong>
                                        <span class="pull-right text-muted">20% Gastado</span>
												</p>
												<div class="progress progress-striped active">
													<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
														<span class="sr-only">20% Gastado</span>
													</div>
												</div>
											</div>
										</a>
								
										<a href="#">
											<div>
											<p>
													<strong>Material 3</strong>
													<span class="pull-right text-muted">60% Gastado</span>
												</p>
												<div class="progress progress-striped active">
													<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
														<span class="sr-only">60% Gastado (warning)</span>
													</div>
												</div>
											</div>
										</a>
									
										<a href="#">
											<div>
												<p>
													<strong>Material 4</strong>
													<span class="pull-right text-muted">80% Gastado</span>
												</p>
												<div class="progress progress-striped active">
													<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
													<span class="sr-only">80% Gastado (danger)</span>
													</div>
												</div>
											</div>
										</a>-->
									
										<a class="text-center" href="http://noconvencional.comli.com/admin/control_stock.php">
											<strong>Ir a administrador de stock...</strong>
											<i class="fa fa-angle-right"></i>
										</a> 
								
					
                                    <!-- /.Meter aqui el codigo -->
                                </ul>
								</div>
					</div>
				</div>
			</div>
			<a href="http://noconvencional.comli.com/admin/index_admin.php" type="submit" class="btn btn-default" name="B1">Volver</a>
		</div>
		
	</div>
</div>





<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>