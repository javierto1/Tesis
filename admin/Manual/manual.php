<html>
<head>
<title>Manual de Usuario</title>
</head>
<?php

include ("../seguridad.php");
$id_cliente=$_SESSION['usuario'];
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}

	/* $fichero = 'Manual_de_usuario_GesPeGraph.pdf';  
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fichero));
    readfile($fichero); */
include ("../includes_admin/botonera_admin.php");
?>
<html>  
<head>  


	<!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- PARA QUE FUNCIONE LA BUSQUEDA POR FECHAS Y VER MAS DATOS -->
	<script src="../js/jquery.js"></script>
	<script src="js/myjava1.js"></script>
	<script src="../reportes/js/myjava_pedido.js"></script>
	

</head>  

<body>
	<div id="page-wrapper">
            
		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
				<h3><b>Manual de Usuario, <a href="manual1.php">DESCARGAR</a> si no visualiza el PDF </b></h3><hr>
					<div class="col-lg-1"></div>

						<div class="col-lg-10">
							<iframe src='http://noconvencional.com/admin/Manual/Manual_de_usuario_GesPeGraph.pdf' style="width:1000px; height:875px;" align="center" frameborder="0"></iframe>
						</div>
					<div class="col-lg-1"></div>	
				</div>
			</div>
		</div>
	</div>

</html>