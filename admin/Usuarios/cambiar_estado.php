<?php 
// Actualizamos en funcion del id que recibimos 
include "../includes_admin/dbcon.php";

// include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }

$id = $_GET['id'];
$estado= $_GET['estado'];
$rol=$_GET['rol'];

	//echo $rol;
if ($estado == 'desbloqueado'){
	$sSQL2="UPDATE datos_personales SET estado='bloqueado' WHERE id='$id'";
	mysql_query($sSQL2);
	
	}else{
	$sSQL3="UPDATE datos_personales SET estado='desbloqueado' WHERE id='$id'";
	mysql_query($sSQL3);

	}
	
header("Location: listado_usuarios.php?rol=$rol");



?>