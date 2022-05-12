<?php
sleep(1);
 include "../includes_admin/dbcon.php";
if($_REQUEST){
	$consulta =$_REQUEST['buscar_proveedor'];
	$query="SELECT * FROM proveedor WHERE cuit ='$consulta' OR cuil ='$consulta'";
	$resultado= mysql_query($query) or die('Error en conexion');
	if(mysql_num_rows(@$resultado) > 0) // not available
 {
   while ($row = mysql_fetch_array($resultado)){
  	echo '<hr><div id="Error">

  	
							
											
												<h4>Datos personales</h4>
												
												<div class="form-group col-lg-3">
												<input class="form-control"  value="'.$row['nombre'].'" id="'.$row['id_proveedor'].'" name="id_proveedor" disabled>
												</div>
											<div class="form-group col-lg-3">                                            
												<input class="form-control" value="'.$row['apellido'].'" name="'.$row['apellido'].'" disabled>
											</div>
											<div class="form-group col-lg-3">
                                            
												<input class="form-control" value="'.$row['razon_social'].'" name="'.$row['razon_social'].'" disabled>
											</div>
											<div class="form-group col-lg-3">
                                            
												<input class="form-control" value="'.$row['cuit'].'"  name="'.$row['cuit'].'" disabled>
											</div>
																						</div>							
											
											';
  }
}
 else
 {
  echo '<div class="col-lg-12" id="Success"><p class="alert alert-warning"> El proveedor ingresado no existe en nuestra base de datos, por favor cargarlo correctamente: <a href="../Proveedores/nuevo_proveedor.php"><b>AGREGAR PROVEEDOR</b></a> </br> </p></div><hr>';
 }
 
}

?>
