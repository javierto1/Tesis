<?php 

include "dbcon.php";

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/jquery-ui.theme.css" rel="stylesheet">
    <link href="css/jquery.css" rel="stylesheet">
	<link href="css.css" media="screen" rel="stylesheet" type="text/css" />
   
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	


<script type="text/javascript">
$(document).ready(function() {	
	$('#buscar_proveedor').blur(function(){
		
		$('#info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

		var buscar_proveedor = $(this).val();		
		var dataString = 'buscar_proveedor='+buscar_proveedor;
		
		$.ajax({
            type: "POST",
            url: "check_proveedor.php",
            data: dataString,
            success: function(data) {
				$('#info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    
</script>

<?php 
include "includes_admin/botonera_admin.php";
?>
</head>

<body>

<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../images/iconos/Agregar.png" height="70px" width="70px"/>Nuevo Proveedor <small><i>(Persona Juridica)</i></small></h1>
						
						<div class="panel-body">
                            <div class="row">
								<form action="#" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
									<div class="col-lg-6">                                        
										<div class="form-group col-lg-12">
                                            <label>Carga de facturas</label></br></br>
											<label>Ingrese el cuit o cuil del proveedor sin guines (-)</label>
											<div class="form-group col-lg-12">
                                           <input  placeholder="Buscar Proveedor" name="buscar_proveedor" type="text" id="buscar_proveedor"><div id="info"></div>
										   								
																																							
									</div>
									</div>
																										
								</form>
						</div>
							<!-- /.row -->
						</div>
						<!-- /.panelbody -->			
                    </div>
                    <!-- /.col-lg-12 -->
                
				</div>
				<!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
		</body>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	</html>