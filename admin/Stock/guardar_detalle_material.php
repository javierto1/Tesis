<?php 
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: ../logout.php");
//	exit();
//}
// Actualizamos en funcion del id que recibimos 

$id_material = $_POST['optionsRadiosInline']; 
//$codigo = $_POST['codigo']; 
$denominacion = $_POST['denominacion']; 
//$precio = $_POST['precio']; 

	//echo $id_material;
	//echo $denominacion;
//$fecha = date("d-m-Y"); 

include "../includes_admin/dbcon.php";  

$qry2=mysql_query ("INSERT INTO detalle_materiales(id_materiales, denominacion) VALUES ('{$id_material}','{$denominacion}')", $conexion);
mysql_query($sSQL); 

//echo $sSQL;
//header("Location: listado_usuarios.php?rol=$rol");
//include('cierra_conexion.php');   

?> 