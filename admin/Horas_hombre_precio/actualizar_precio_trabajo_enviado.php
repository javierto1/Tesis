<?php 
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: ../logout.php");
//	exit();
//}
// Actualizamos en funcion del id que recibimos 

$id = $_POST['id_trabajo']; 
$trabajo=$_POST['trabajo'];
$precio=$_POST['precio'];
//$id ='6';

//$fecha = date("d-m-Y"); 

include "../includes_admin/dbcon.php";  

$sSQL="UPDATE horas_hombre SET trabajo='$trabajo',precio='$precio' where id_trabajo='$id'"; 
mysql_query($sSQL); 

//echo $sSQL;
header("Location: listado_trabajos.php");
//include('cierra_conexion.php');   

?> 