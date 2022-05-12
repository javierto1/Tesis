<?php 
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: ../logout.php");
//	exit();
//}
// Actualizamos en funcion del id que recibimos 

$id = $_POST['id']; 
$rol=$_POST['rol'];
//$id ='6';
	$nick = $_POST['username'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$documento = $_POST['documento'];
	$mail = $_POST['mail'];
	$telefono = $_POST['telefono'];
	$password = $_POST['password'];
	$calle = $_POST['calle'];
	$numero = $_POST['numero'];
	$dpto = $_POST['dpto'];
	$codigo_postal = $_POST['codigo_postal'];
	$barrio = $_POST['barrio'];
	$ciudad = $_POST['ciudad'];
	$provincia = $_POST['provincia'];
	$letra = $_POST['letra'];
	$tipo_documento = $_POST['tipo_documento'];
	$n = $_POST['n'];
	
//$fecha = date("d-m-Y"); 

include "../includes_admin/dbcon.php";  

$pido_psw="SELECT password From datos_personales where id='$id'";
 	$pedir=mysql_query($pido_psw);
 	$ress = mysql_fetch_array($pedir);
 	$psw_bd=$ress[0];
//$sSQL="UPDATE datos_personales SET nombre='$nombre',apellido='$apellido',mail='$mail',telefono='$telefono',username='$nick',password='$password',calle='$calle',numero='$numero',dpto='$dpto',codigo_postal='$codigo_postal',barrio='$barrio',ciudad='$ciudad',provincia='$provincia' where id='$id'"; 

if ($password==$psw_bd) {
	
			$sSQL="UPDATE datos_personales SET username='$nick',nombre='$nombre',apellido='$apellido',documento='$documento',mail='$mail',telefono='$telefono', calle='$calle',numero='$numero',dpto='$dpto',codigo_postal='$codigo_postal',barrio='$barrio',ciudad='$ciudad',
provincia='$provincia',letra='$letra',n='$n',tipo_documento='$tipo_documento' where id='$id'"; 

mysql_query($sSQL); 
 	}else{

 		$psw2=hash('sha256',$password);	
 		
$sSQL="UPDATE datos_personales SET username='$nick',nombre='$nombre',apellido='$apellido',documento='$documento',mail='$mail',telefono='$telefono',
password='$psw2',calle='$calle',numero='$numero',dpto='$dpto',codigo_postal='$codigo_postal',barrio='$barrio',ciudad='$ciudad',
provincia='$provincia',letra='$letra',n='$n',tipo_documento='$tipo_documento' where id='$id'"; 

mysql_query($sSQL); 
}
//echo $sSQL;
header("Location: listado_usuarios.php?rol=$rol");
//include('cierra_conexion.php');   

?> 