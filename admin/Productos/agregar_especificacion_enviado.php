<?php 
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: ../logout.php");
//	exit();
//}
// Actualizamos en funcion del id que recibimos 

$id_caracter = $_POST['optionsRadiosInline']; 
$codigo = $_POST['codigo']; 
$denominacion = $_POST['denominacion']; 
$precio = $_POST['precio']; 

	
//$fecha = date("d-m-Y"); 

include "../includes_admin/dbcon.php";  

$qry2=mysql_query ("INSERT INTO especifica(id_caracter, codigo, denominacion, precio) VALUES ('{$id_caracter}','{$codigo}','{$denominacion}','{$precio}')", $conexion);
mysql_query($sSQL); 

//echo $sSQL;
header("Location: agregar_especificacion.php");
//include('cierra_conexion.php');   

?> 