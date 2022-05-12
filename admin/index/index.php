<?php
include ("../includes_admin/botonera_admin.php");
include('../includes_admin/dbcon.php');  
include ("../seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//	exit();
//}

?>
<html>  
<head>   


	<!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    
   
	

</head>  

<body>
	<div id="page-wrapper">
            
		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><b>Principal</b></h1>
    </div>
	<h4><b>Accesos directos</b></h4>
	<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php 
                                    $fecha=date('Y-m-d H:i:s');   
                                        $nuevafecha = strtotime ( '- 10 minute' , strtotime ( $fecha ) ) ;
                                        
                                        $nuevafecha = date ( 'Y-m-d H:i:s', $nuevafecha);
                                        
                                                              
                                            $query = mysql_query ("SELECT * 
                                                        FROM login
                                                         WHERE ingreso = 'TRUE' AND fecha >='$nuevafecha'"); 


                                            $result = mysql_num_rows($query); 
                                            //$contar = mysql_fetch_assoc $result;
                                            ?>
                                    <div class="huge"><?php echo $result;?></div>
                                    <div>Usuarios Activos</div>
                                </div>
                            </div>
                        </div>
                        <a href="../Usuarios/usuarios_activos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más...</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
								<?php								
											$query = mysql_query ("select * from stock where porcentaje >= 80 "); 
											$result = mysql_num_rows($query); 
											//$contar = mysql_fetch_assoc $result;
											?>
																						 
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $result;?></div>
                                    <div>Con Bajo Stock</div>
                                </div>
                            </div>
                        </div>
                        <a href="../Stock/nivel_stock.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más...</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
								<?php								
											$query = mysql_query ("select * from pedido_cliente where id_estado='1'"); 
											$result = mysql_num_rows($query); 
											//$contar = mysql_fetch_assoc $result;
											?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $result;?></div>
                                    <div>Nuevas Ordenes</div>
                                </div>
                            </div>
                        </div>
                        <a href="../Pedidos/listado_pedidos.php?id_estado=1">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más...</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-history fa-5x"></i>
                                </div>
                                <?php 
                                    $fecha = date('-Y-m');
                                    $nuevafecha = strtotime ( '- 1 month' , strtotime ( $fecha ) ) ;
                                    $nuevafecha = date ( 'Y-m' , $nuevafecha );                               
                                    $query = mysql_query ("SELECT * FROM pedido_cliente WHERE id_estado ='5' AND fecha_pedido >='$nuevafecha'");
                                    $result = mysql_num_rows($query);

                                            //$contar = mysql_fetch_assoc $result;
                                            ?>
                                <div class="col-xs-9 text-right">
                                        <?php    
                                            $sumame=mysql_query("SELECT SUM(precio_vta) AS TOTAL  
                                                from pedido_cliente where id_estado = '5' and 
                                                fecha_pedido >='$nuevafecha'");
                                            $row = mysql_fetch_array($sumame);
                                                $total = $row["TOTAL"];
                                            ?>
                                      <div class="huge">
                                            
                                        <?php echo $result;?></div>
                                    <div>Ventas en el mes</div>
                                </div>
                            </div>
                        </div>                        
                            <div class="panel-footer">
                                <span class="pull-left">Facturado: <b>$<?php echo $total;?></b></span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>                        
                    </div>
                </div>
            </div>
			
			<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> ÚLTIMOS TRABAJOS SOLICITADOS:
                            <div class="pull-right">
                               
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
													<th>#</th>
                                                    <th>Cliente</th>
                                                    <th>Producto</th>
                                                    <th>Fecha</th>
                                                    <th><p class='text-right'>Monto</p></th>
                                                </tr>
                                            </thead>
                                            <tbody>
										<?php
											$estado=(int) '1';
																						
											$query = "	SELECT 	 pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta, pc.fecha_pedido,
																 p.denominacion,
																 dp.id, dp.apellido, dp.nombre, dp.username,
																 ep.id_estado, ep.denominacion as deno
														FROM 
																pedido_cliente pc,
																producto p,
																datos_personales dp,
																estado_pedido ep
																
														WHERE	pc.id_cliente = dp.id AND 
																pc.id_producto = p.id_producto AND 
																pc.id_estado = ep.id_estado AND
																pc.id_estado='$estado'
														ORDER BY fecha_pedido DESC
														LIMIT 10";
											
											
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
											
											echo " 
	                                 
										<tr class='gradeA odd' role='row'>
                                            
											<td class='sorting_1' >".$registro['id_pedido']."</td> 
                                            <td>".$registro['apellido'].", ".$registro['nombre']."</td>
                                            <td>".$registro['denominacion']."</td>
                                            <td>".fechaNormal($registro['fecha_pedido'])."</td>
											<td><p class='text-right'>$ ".$registro['precio_vta']."</p></td>
											
											
												
											
											
                                        </tr>
											
											"; } 
											?>
										
										</tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
					</div>
				</div>
			</div>
			
			
</div>


</body>


	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>