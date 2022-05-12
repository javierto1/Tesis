<?php

include "includes_cliente/dbcon.php";
include ("../admin/seguridad.php");	
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}
?>
 	
<script>
	 $(document).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
 });
	
	</script>
		<?php	$cat=$_POST['cat'];
												$query="SELECT * from producto where estado='1' and categoria=$cat";	
												
											$result = mysql_query($query); 
	
											while ($registro = mysql_fetch_array($result)){ 
											
echo '	<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
							<div class="caption">
									<div class="offer offer-danger">													
											<div class="offer-content">
														<h4 class="pull-right text-danger">$<b>'.$registro["promo_precio"].'</b></h4>
														<h4><b>'.$registro["denominacion"].'</b></h4>
														<p class="text-warning">'.$registro['descripcion'].'</p>
														<a href="mi_pedido.php?id_producto='.$registro["id_producto"].'" class="btn btn-danger btn-sm pull-left">COMPRAR!</a>
														
											</div>
													<hr>
									</div>
							</div>
											
											<img src="../admin/Productos/Img/'.$registro["url"].'" alt="..." width="304" height="236" class="img-thumbnail">
											
											<b>'. $registro["denominacion"].'</b>
										   
					</div>
		</div>';
									};
									

?>



