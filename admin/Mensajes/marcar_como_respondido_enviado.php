<?php 
       
	include "../includes_admin/dbcon.php";
	
    $con = mysql_connect($host, $user, $pass);
    
	
	$id_mensaje= $_GET['id_mensaje'];
	$estado=1;
	
	
	
    //echo $emisor.$receptor.$asunto.$mensaje.$fecha_mensaje.$hora_mensaje.$respuesta_del;
    
    mysql_select_db($mysql_database, $conexion);    
	 
	$sSQL="UPDATE mensajeria SET estado='$estado' WHERE id_mensaje='$id_mensaje'";
	mysql_query($sSQL); 
	
	echo $sSQL;
	
   // header("Location: mis_mensajes.php");
   
 
?>