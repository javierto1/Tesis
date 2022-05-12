<?php 
$fecha=date("Y-m-d");
//$fecha='2016-06-05';

include('includes_admin/dbcon.php');  
include ("seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//  exit();
//}

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../css/jquery.css" rel="stylesheet">
	<link href="../css.css" media="screen" rel="stylesheet" type="text/css" />

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
 
  <script src="backup/generar.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>	

<?php 
include "includes_admin/botonera_admin1.php";
?>
</head>

<body>

<!-- Page Content -->
<div class="row col-lg-12">
        <div id="page-wrapper" class="panel-body">
            <h1 class="page-header"><img src="../images/iconos/Balance1.png" height="70px" width="70px"/><b>Generar Backup</B></h1>
			<div class="container-fluid">
        <hr>

 <div class="panel col-lg-9">
  <p class="text-center"><strong>Para resguardar su información aconsejamos realizar el backup al menos 1 vez por mes.</strong></p>
  <div class="col-md-3 col-md-offset-3"></br>
  </div>
                        <div class="panel-heading">

                             <input type="button" id="generar" name="generar" value="GENERAR" class="btn btn-primary btn-lg">
                        </div>
                        <div class="panel-body">
                            
                <div id="respuesta"></div>                 
                        </div>

                   <div class="col-md-3 col-md-offset-3">
                   </br>
                   </div>
               </div>    
				</div>
		</div>
</div>   

</script>		
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</html>