<!DOCTYPE html>

<html lang="en">
<?php
session_start(); 
//include "../dbcon.php";
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://noconvencional.comli.com/admin">Bienvenido <?php echo $_SESSION['nombre'];?>!</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
					
					
					
                    <ul class="dropdown-menu dropdown-messages">
						
						<?php	include "../includes_admin/dbcon.php";
								include "../includes_admin/fecha_acomodada.php";
								
								//$estado=(int) $_GET['id_estado'];
																						
											$query = "	SELECT 	 m.id_mensaje, m.emisor, m.receptor, m.asunto, m.mensaje, m.fecha_mensaje, m.estado,
																 dp.id, dp.apellido, dp.nombre, dp.username, dp.telefono
																 
														
														FROM 	mensajeria m,
																datos_personales dp
														
														WHERE   m.emisor = dp.id AND rol='2'
														
														ORDER BY fecha_mensaje ASC
														
														LIMIT 5";
											
											
								$result = mysql_query($query); 
	
								while ($registro = mysql_fetch_array($result)){ 
						echo '		
						<li>
                            <a href="../Mensajes/responder_mensaje.php?id_mensaje='.$registro['id_mensaje'].'">
                                <div>
                                    <strong>'.$registro['username'].'</strong>
                                    <span class="pull-right text-muted">
                                        <em>'.fecha_horaNormal($registro['fecha_mensaje']).'</em>
										
                                    </span>
                                </div>
                                <div>'.$registro['asunto'].'</div>
                            </a>
                        </li>
                        <li class="divider"></li>

						
                        
								';}?>
                    <!-- /.dropdown-messages -->
						<li>
                            <a class="text-center" href="../Mensajes/mis_mensajes.php">
                                <strong>Ir a Bandeja de Entrada</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
					
					
                </li>
                <!-- /.dropdown 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    .dropdown-tasks 
                </li>
                -->
                 <li class="dropdown">
                    
                        <a href="../Manual/manual.php"><i class="fa fa-book fa-fw"></i>Manual del usuario</a>
                    
                </li>
				
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Mi Datos</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
					
                        
						<li>
                            <a href="../index/index.php"><img src="../../images/New.png" height="45px" width="45px"/> Principal</a>
                        </li>
						<li>
                            <a href='../Usuarios/listado_usuarios.php?rol=1'><img src="../../images/operador.png" height="45px" width="45px"/> Operadores</a>
                           
                        </li>
						<li>
                            <a href='../Usuarios/listado_usuarios.php?rol=2'><img src="../../images/clientes.png" height="45px" width="45px"/> Clientes</a>
                            
                        </li>
						<li>
                            <a href='../Proveedores/listado_proveedor.php'><img src="../../images/Proveedor.png" height="45px" width="45px"/> Proveedores</a>
                        </li>
						<li>
                            <a href="../Stock/control_stock.php"><img src="../../images/iconos/store.png" height="45px" width="45px"/> Stock</a>
                        </li>
						<li>
                            <a href="../Productos/listado_productos.php"><img src="../../images/Carro.png" height="45px" width="45px"/> Productos</a>
                           
                        </li>
						<li>
                            <a href="../Pedidos/listado_pedidos.php?id_estado=1"><img src="../../images/iconos/hand.png" height="45px" width="45px"/> Pedidos</a>
                          
                        </li>
                        <li>
                            <a href="../estadisticas.php"><img src="../../images/Estadisticas.png" height="45px" width="45px"/> Estadisticas</a>
                        </li>
						<li>
                            <a href="../reportes/index.php"><img src="../../images/Listado.png" height="45px" width="45px"/> Reportes</a>
                        </li>
						<li>
                            <a href="../backup.php"><img src="../../images/iconos/basket.png" height="45px" width="45px"/> Backup</a>
                        </li>
                        
                    </ul>
                </div>
				
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        

    </div>
    <!-- /#wrapper -->

    

</body>

</html>
