<?php


include ("../seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//	exit();
//}

include "../includes_admin/dbcon.php";
// construimos el combo de provincias desde la base de datos
$sql = mysql_query("SELECT * FROM provincia");
    while($sql_p = mysql_fetch_row($sql))
    {
     $combo_provincias.= "<option value='".$sql_p[0]."'>".$sql_p[1]."</option>";
    } 
	
?>


	<link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../css/jquery-ui.css" rel="stylesheet">
    <link href="../../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../../css/jquery.css" rel="stylesheet">
	<link href="../../css.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
<script type="text/javascript" src="jquery-1.3.2.js"></script>

<script type="text/javascript">
$(document).ready(function() {	
	$('#username').blur(function(){
		
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

		var username = $(this).val();		
		var dataString = 'username='+username;
		
		$.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
				$('#Info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    
</script>
<!-- SCRIPT PARA PROVINCIAS Y SUS LOCALIDADES FILTRADAS -->
<script type="text/javascript" charset="utf-8">
	  $(document).ready(function() {
	  // Parametros para el combo
	   $("#provincia").change(function () {
	      $("#provincia option:selected").each(function () {
	        elegido=$(this).val();
	        $.post("../validador_provincia/combo_ciudad.php", { elegido: elegido }, function(data){
	        $("#ciudad").html(data);
	      });     
	     });
	   });    
	});
</script>
<?php 
include "../includes_admin/botonera_admin.php";
?>
<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Agregar.png" height="70px" width="70px"/>Cotizacion</h1>
						
										<div class="panel-body">
                            <div class="row">
                            <form action="nuevo_operador_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
								<div class="col-lg-6">
                                        
										<div class="form-group col-lg-6">
                                            <label>Cantidad</label>
                                            <select class="form-control " name="tipo_cantidad" type="text" required>
												<option></option>
											</select>
											
                                        </div>
										
										<div class="form-group col-lg-6">
                                            <label>Colores</label>
                                            <select class="form-control " name="tipo_color" type="text" required>
												<option></option>
											</select>
                                        </div>
										
										<div class="form-group col-lg-6">
                                            <label>Material</label>
                                            <select class="form-control " name="tipo_material" type="text" required>
												<option></option>
											</select>
                                        </div>
										
										<div class="form-group col-lg-6">
                                            <label>Terminacion</label>
                                            <select class="form-control " name="tipo_terminacion" type="text" required>
												<option></option>
											</select>
                                        </div>
										
										<div class="form-group col-lg-6">
                                            <label>Precio:</label> $......
                                            
                                        </div>
								   
										
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
								</div>
								<!-- /.row (nested) -->
								<br>
									<button type="submit" class="btn btn-default">Guardar</button>
									<button type="reset" class="btn btn-default">Resetear</button>
									<a href="javascript:history.go(-1);" type="submit" class="btn btn-default" name="B1">Volver</a>
                            </form>
						</div>
										
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
		<!-- jQuery -->
	
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
		
        <!-- /#page-wrapper -->