<?php 
       
	include "../includes_admin/dbcon.php";
	
    $con = mysql_connect($host, $user, $pass);
    
    $emisor = $_POST['emisor'];
	$receptor = $_POST['receptor'];
	$asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $fecha_mensaje= date("Y-m-d H:i:s");
	//$hora_mensaje= date('H:i');
	$estado=1;
	$respuesta_del= $_POST['respuesta_del'];
	
	$id_mensaje= $_POST['id_mensaje'];
	//$estado=;
	
    //echo $emisor.$receptor.$asunto.$mensaje.$fecha_mensaje.$hora_mensaje.$respuesta_del;
    
    mysql_select_db($mysql_database, $conexion);    
	 
	$sSQL="UPDATE mensajeria SET estado='$estado' WHERE id_mensaje='$respuesta_del'";
	mysql_query($sSQL); 
	
	//echo $sSQL;
	mysql_select_db($mysql_database, $conexion);    
	$qry1=mysql_query ("INSERT INTO mensajeria (emisor,receptor,asunto,mensaje,fecha_mensaje,estado,respuesta_del) VALUES ('{$emisor}','{$receptor}','{$asunto}','{$mensaje}','{$fecha_mensaje}','{$estado}','{$respuesta_del}')", $conexion);
	
	
    header("Location: mis_mensajes.php");
   
 
?>