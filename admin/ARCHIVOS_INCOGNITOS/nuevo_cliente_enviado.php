<?php 
       
       
    include "dbcon.php";
    $con = mysql_connect($host, $user, $pass);
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['username'];
    $telefono = $_POST['telefono'];
    $nick = $_POST['username'];
    $password = $_POST['password'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $dpto = $_POST['dpto'];
    $codigo_postal = $_POST['codigo_postal'];
    $barrio = $_POST['barrio'];
    $ciudades = $_POST['ciudad'];
    $provincias = $_POST['provincia'];
    $rol = $_POST['rol'];
    $estado = 'desbloqueado';
    $dni = $_POST['dni'];
    echo $nick;
    $pp=mysql_query("SELECT * from provincia where id=$provincias", $conexion);
    while($row = mysql_fetch_array($pp))
    {
     $provincia=$row[1];
    } 

    $cc=mysql_query("SELECT * from ciudad where id=$ciudades and provincia_id=$provincias", $conexion);
    while($row = mysql_fetch_array($cc))
    {
     $ciudad=$row[2];
    } 
    //$id_datos=mysql_insert_id();
    
    mysql_select_db($mysql_database, $conexion);    
   $qry1=mysql_query ("INSERT INTO datos_personales(nombre,apellido,documento,mail,telefono,username,password,calle,numero,dpto,codigo_postal,barrio,ciudad,provincia,estado,rol) VALUES ('{$nombre}','{$apellido}','{$dni}','{$mail}','{$telefono}','{$nick}','{$password}','{$calle}','{$numero}','{$dpto}','{$codigo_postal}','{$barrio}','{$ciudad}','{$provincia}','{$estado}','{$rol}')", $conexion);
    
    $id_datos=mysql_insert_id();
    $qry2=mysql_query ("INSERT INTO operador(id_datos,dni,estado) VALUE ('{$id_datos}','{$dni}','{$estado}')", $conexion);
    header("Location: Actualizar_operador/listado_operador1.php?rol=2");
    
    
    
    //echo $nombre, $apellido, $email, $telefono, $calle, $numero, $dpto, $codigo_postal, $barrio, $ciudad, $provincia, $nick, $contraseña, $rol, $estado, $dni ;
    

 // include "dbcon.php";
 // $conexion = mysql_connect($host, $user, $pass);
 
 // $nombre = $_POST['nombre'];
 // $apellido = $_POST['apellido'];
 // $mail = $_POST['mail'];
 // $telefono = $_POST['telefono'];
 // $username = $_POST['username'];
 // $password = $_POST['password'];
 // $calle = $_POST['calle'];
 // $numero = $_POST['numero'];
 // $dpto = $_POST['dpto'];
 // $dni = $_POST['documento'];
 // $codigo_postal = $_POST['codigo_postal'];
 // $barrio = $_POST['barrio'];
 // $ciudades = $_POST['ciudad'];
 // $provincias = $_POST['provincia'];
 // $rol = 3;
 
 // $pp=mysql_query("SELECT * from provincia where id=$provincias", $conexion);
	// while($row = mysql_fetch_array($pp))
 //    {
 //     $provincia=$row[1];
 //    } 

	// $cc=mysql_query("SELECT * from ciudad where id=$ciudades and provincia_id=$provincias", $conexion);
	// while($row = mysql_fetch_array($cc))
 //    {
 //     $ciudad=$row[2];
 //    } 
	
 
 // $dni = $_POST['dni'];
 
 // mysql_select_db($mysql_database, $conexion);  
 //    $qry1=mysql_query ("INSERT INTO datos_personales(nombre,apellido,documento,mail,telefono,username,password,calle,numero,dpto,codigo_postal,barrio,ciudad,provincia,estado,rol) VALUES ('{$nombre}','{$apellido}','{$dni}','{$mail}','{$telefono}','{$username}','{$password}','{$calle}','{$numero}','{$dpto}','{$codigo_postal}','{$barrio}','{$ciudad}','{$provincia}','{$estado}','{$rol}')", $conexion);
 // $id_datos=mysql_insert_id();
 // $qry2=mysql_query ("INSERT INTO cliente(id_datos,estado) VALUE ('{$id_datos}','{$estado}')", $conexion);
 // header("Location: nuevo_cliente.php");
 
 // //echo  $username;
 
 
?>