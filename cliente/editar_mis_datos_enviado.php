<script src="../sha256-min.js"></script>
<?php 
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: ../logout.php");
//	exit();
//}
// Actualizamos en funcion del id que recibimos 
include "includes_cliente/dbcon.php";  
	$id = $_POST['id']; 
	include ("../admin/seguridad.php");
	$id_cliente=$_SESSION['usuario'];

//$id ='6';

 	$pido_psw="SELECT password From datos_personales where id='$id_cliente'";
 	$pedir=mysql_query($pido_psw);
 	$ress = mysql_fetch_array($pedir);
 	$psw_bd=$ress[0];
 	

	$id = $_POST['id']; 
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
	//$tipo_documento = $_POST['tipo_documento'];
	//$n = $_POST['n'];
	//echo $id.$nombre.$apellido.$documento.$mail.$telefono.$calle.$numero.$dpto.$codigo_postal.$barrio.$ciudad.$provincia.$letra;
	//$pass_encriptada1 = md5 ($password); //Encriptacion nivel 1
    //$pass_encriptada2 = crc32($pass_encriptada1); //Encriptacion nivel 1
    //$pass_encriptada3 = crypt($pass_encriptada2, "xtemp"); //Encriptacion nivel 2
    //$pass_encriptada4 = sha1("xtemp".$pass_encriptada3); //Encriptacion nivel 3
	//$fecha = date("d-m-Y"); 



//$sSQL="UPDATE datos_personales SET nombre='$nombre',apellido='$apellido',mail='$mail',telefono='$telefono',username='$nick',password='$password',calle='$calle',numero='$numero',dpto='$dpto',codigo_postal='$codigo_postal',barrio='$barrio',ciudad='$ciudad',provincia='$provincia' where id='$id'"; 
if ($password==$psw_bd) {
	
			$sSQL="UPDATE datos_personales SET nombre='$nombre',apellido='$apellido',documento='$documento',mail='$mail',telefono='$telefono',
calle='$calle',numero='$numero',dpto='$dpto',codigo_postal='$codigo_postal',barrio='$barrio',ciudad='$ciudad',
provincia='$provincia',letra='$letra' where id='$id'"; 

mysql_query($sSQL); 
 	}else{

 		$psw2=hash('sha256',$password);	
 		
$sSQL="UPDATE datos_personales SET nombre='$nombre',apellido='$apellido',documento='$documento',mail='$mail',telefono='$telefono',password='$psw2',
calle='$calle',numero='$numero',dpto='$dpto',codigo_postal='$codigo_postal',barrio='$barrio',ciudad='$ciudad',
provincia='$provincia',letra='$letra' where id='$id'"; 

mysql_query($sSQL); 
}
//echo $sSQL;
header("Location: mis_datos.php");
//include('cierra_conexion.php');   

?> 