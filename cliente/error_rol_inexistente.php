<?php  
// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
$id = $_POST['id']; 
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
?>
<html>  
<head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Cliente Error- Gráfica "No Convencional"</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">    
    
    <!-- Custom CSS -->
    <link href="css/productos_index.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>  
<!-- Page Content -->
    <div class="container">
        <?php include ("includes_cliente/botonera_cliente.php"); ?>
<body>
	<div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="page-header">
						<div class="alert alert-danger">
				<p class="text-center"><strong>Error!</strong> Hubo un error en la consulta. Por favor vuelva a realizar su consulta, muchas gracias.<p>
			</div>
						</h1>
						
			
    </div> </br>
    </div> </br>
    </div></br>
</div>

</body>
	<!-- jQuery -->	

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
		<?php include ("includes_cliente/footer_cliente.php"); ?>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </html>