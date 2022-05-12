<?php 
       
	include "../includes_admin/dbcon.php";
	
    $con = mysql_connect($host, $user, $pass);
    
    $id = $_POST['id_trabajo'];
	$trabajo = $_POST['trabajo'];
    $precio = $_POST['precio'];
    
    $fecha_alta= date('Y-m-d');
	
    echo $trabajo.$precio.$id;
    
    mysql_select_db($mysql_database, $conexion);    
	//$qry1=mysql_query ("INSERT INTO horas_hombre (trabajo,precio) VALUES ('{$trabajo}','{$precio}')", $conexion);
    //header("Location: listado_trabajos.php");
   
 
?>