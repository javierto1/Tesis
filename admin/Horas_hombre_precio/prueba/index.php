<?php 
include "../includes_admin/botonera_admin.php";

//$id= '6';
include "../includes_admin/dbcon.php";
?>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){

    $('input').blur(function(){
        var field = $(this);
        var parent = field.parent().attr('id');
        field.css('background-color','#F3F3F3');

        if($('#'+parent).find(".ok").length){
            $('#'+parent+' .ok').remove();
            $('#'+parent+' .loader').remove();
            $('#'+parent).append('<div><img src="loader.gif"/></div>').fadeIn('slow');
        }else{
            $('#'+parent).append('<div><img src="loader.gif"/></div>').fadeIn('slow');
        }

        var dataString = 'value='+$(this).val()+'&field='+$(this).attr('name');
        $.ajax({
            type: "POST",
            url: "query.php",
            data: dataString,
            success: function(data) {
                field.val(data);
                $('#'+parent+' .loader').fadeOut(function(){
                    $('#'+parent).append('<div><img src="../js/yes.png"/></div>').fadeIn('slow');
                });

            }
        });
    });
});
</script>
<!-- Page Content -->
        <div id="page-wrapper">
            
			<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img src="../../images/iconos/Balance1.png" height="70px" width="70px"/>Actualizar Precio Hora Hombre</h1>
						
							<div class="panel-body">

							<?php  
							//$id_proveedor = $_GET['id_proveedor']; 

							$query = "select * from horas_hombre "; 
							$result = mysql_query($query); 

							while ($row = mysql_fetch_array($result)){ ?>
							
								<form id="ficha">
									<div id="content_name">
										<label>Nombre</label>
											<input type="text" id="name" name="name" value="<?=$row['trabajo']?>" />
									</div>
									<div id="content_lastname">
										<label>Apellidos</label>
											<input type="text" id="lastname" name="lastname" value="<?=$row['precio']?>" />
									</div> 
									<!--  <div id="content_email">
										<label>Email</label>
											<input type="text" id="email" name="email" value="<?//=$row['mail']?>" />
									</div>
									<div id="content_biography">
										<label>Biografía</label>
											<textarea rows="7" cols="30" name="biography"><?//=$row['calle']?></textarea>
									</div> -->
								</form>
							<?php };?>
							</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- jQuery -->
		</div>
		
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
		
        <!-- /#page-wrapper -->