<?php 
// Actualizamos en funcion del id que recibimos 
include "../includes_admin/dbcon.php";

// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }

$id_producto = $_GET['id_producto'];
$estado= $_GET['estado'];
$rol=$_GET['rol'];

	//echo $rol;
if ($estado == '0'){
	$sSQL2="UPDATE producto SET estado='1' WHERE id_producto='$id_producto'";
	mysql_query($sSQL2);
	
	}
	
if ($estado == '1')	{
	$sSQL3="UPDATE producto SET estado='0' WHERE id_producto='$id_producto'";
	mysql_query($sSQL3);

	}
	
header("Location: listado_productos.php");



?>