<?php
include ("../includes_admin/botonera_admin.php");
include('../includes_admin/dbcon.php');  
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//	exit();
//}

?>
<div id="page-wrapper">
	<div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-list-alt" aria-hidden="true"> Generar<b> Reportes</b></i></h1>
    </div>
	<h4><b>Seleccione de cuál desea realizar reporte...</b></h4>
	<div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">3</div>
                                    <div>USUARIOS</div>
                                </div>
                            </div>
                        </div>
                        <a href="http://noconvencional.comli.com/admin/reportes/index_ejemplo.php">
                            <div class="panel-footer">
                                <span class="pull-left"><b>Generar Reporte...</b></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-5x" aria-hidden="true"></i>
                                </div>
								<?php								
											$query = mysql_query ("select * from stock where porcentaje >= 80 "); 
											$result = mysql_num_rows($query); 
											//$contar = mysql_fetch_assoc $result;
											?>
																						 
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $result;?></div>
                                    <div>VENTAS</div>
                                </div>
                            </div>
                        </div>
                        <a href="http://noconvencional.comli.com/admin/Stock/nivel_stock.php">
                            <div class="panel-footer">
                                <span class="pull-left"><b>Generar Reporte...</b></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                     <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
                                </div>
								<?php								
											$query = mysql_query ("select * from pedido_cliente where id_estado='1'"); 
											$result = mysql_num_rows($query); 
											//$contar = mysql_fetch_assoc $result;
											?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $result;?></div>
                                    <div>PRODUCTOS</div>
                                </div>
                            </div>
                        </div>
                        <a href="http://noconvencional.comli.com/admin/Pedidos/listado_pedidos.php?id_estado=1">
                            <div class="panel-footer">
                                <span class="pull-left"><b>Generar Reporte...</b></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-truck fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>PROVEEDORES</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><b>Generar Reporte...</b></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
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