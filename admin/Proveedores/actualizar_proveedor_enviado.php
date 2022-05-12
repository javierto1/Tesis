<?php 
// Actualizamos en funcion del id que recibimos 

	$id_proveedor = $_POST['id_proveedor']; 

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$razon_social = $_POST['razon_social'];
	$cuit = $_POST['cuit'];
	$cuil = $_POST['cuil'];
	$mail = $_POST['mail'];
	$telefono = $_POST['telefono'];
	$calle = $_POST['calle'];
	$numero = $_POST['numero'];
	$barrio = $_POST['barrio'];
	$ciudad = $_POST['ciudad'];
	$provincia = $_POST['provincia'];
	$codigo_postal = $_POST['codigo_postal']; 
	//$fecha_alta= date('Y-m-d'); no hace falta ya que la fecha de alta es siempre una 
 

	include('../includes_admin/dbcon.php');   

	$sSQL="UPDATE proveedor SET nombre='$nombre',apellido='$apellido',razon_social='$razon_social',cuit='$cuit',cuil='$cuil',mail='$mail',telefono='$telefono',calle='$calle',numero='$numero',barrio='$barrio',ciudad='$ciudad',provincia='$provincia',codigo_postal='$codigo_postal' where id_proveedor='$id_proveedor'"; 
	mysql_query($sSQL); 

	//aca viene el for con los nuevos valores a agregar de materiales que trabaje el proveedor, se hace un delete y un insert 

	
	
	mysql_select_db($mysql_database, $conexion);
	$sql = "DELETE FROM detalle_proveedor WHERE detalle_proveedor.id_proveedor='$id_proveedor' ";
	mysql_query($sql); 
	//echo $sql ;
	
	$id_materiales = $_POST['material'];
	
	for ($i=0;$i<count($id_materiales);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_proveedor(id_proveedor,id_materiales) VALUES ('{$id_proveedor}','".$id_materiales[$i]."')", $conexion);
       	//echo "<br> Proveedor " . $id_proveedor . ": " . $id_materiales[$i]; 
		
      	} 

	//echo $sSQL;
	header("Location: listado_proveedor.php");
	//include('cierra_conexion.php');   



?> 