<?php 
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: ../logout.php");
//	exit();
//}
// Actualizamos en funcion del id que recibimos 

include "../includes_admin/dbcon.php";
				$material= $_POST['denominacion']; 
				$cmaterial= $_POST['optionsRadiosInline'];
				
				if (empty($material)) {
					echo '<div id="Error"><p class="alert alert-warning">El campo esta vacio</p></div>';
				}else{	
				//$fecha = date("d-m-Y"); 
				$qry=mysql_query("select * from detalle_materiales where denominacion ='$material' AND id_materiales='$cmaterial'");
					$materiales=mysql_num_rows($qry);
						
					if($materiales ==0){																																				
						$qry2=mysql_query ("INSERT INTO detalle_materiales(denominacion,id_materiales) VALUES ('{$material}','{$cmaterial}')", $conexion);
						mysql_query($sSQL);
						echo '<div id="Success" class="col-lg-4"><p class="alert alert-success">'.$material.' grabado exitosamente</p></div>';


						} else {
						  echo '<div id="Error" class="col-lg-4"><p class="alert alert-warning">'.$material.' ya existe</p></div>'.'
				  <script> 
				$("#material").each(function() {
				  $("input[type=text], textarea").val("");
				});
				</script>';
						 		}

}


//echo $sSQL;
//header("Location: listado_usuarios.php?rol=$rol");
//include('cierra_conexion.php');   

?> 