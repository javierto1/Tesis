<?php 
       
	include_once "../includes_admin/dbcon.php";
	
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
	$letra = $_POST['letra'];
    $n	= $_POST['n'];
	
	$codigo_postal = $_POST['codigo_postal'];
    $barrio = $_POST['barrio'];
    $ciudades = $_POST['ciudad'];
    $provincias = $_POST['provincia'];
    $rol = $_POST['rol'];
    $estado = 'desbloqueado';
    
	$dni = $_POST['documento'];
	$tipo_documento = $_POST['tipo_documento'];
	
	$fecha_alta= date('Y-m-d');
	    
    echo $nick;
    echo $password;
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
    $qry1=mysql_query ("INSERT INTO datos_personales(nombre,apellido,documento,mail,telefono,username,password,calle,numero,dpto,codigo_postal,barrio,ciudad,provincia,estado,rol,fecha_alta,letra,n,tipo_documento) VALUES ('{$nombre}','{$apellido}','{$dni}','{$mail}','{$telefono}','{$nick}','{$password}','{$calle}','{$numero}','{$dpto}','{$codigo_postal}','{$barrio}','{$ciudad}','{$provincia}','{$estado}','{$rol}','{$fecha_alta}','{$letra}','{$n}','{$tipo_documento}')", $conexion);
    
    $id_datos=mysql_insert_id();
    $qry2=mysql_query ("INSERT INTO cliente(id_datos,documento,estado) VALUES ('{$id_datos}','{$dni}','{$estado}')", $conexion);
	
	
	// check if fields passed are empty
if(empty($_POST['nombre'])  		||
   empty($_POST['telefono']) 		||
   empty($_POST['username']) 		||
   !filter_var($_POST['username'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['nombre'];
$phone = $_POST['telefono'];
$email_address = $_POST['username'];
echo $str;
	
// create email body and send it	
$to = "$email_address"; // PUT YOUR EMAIL ADDRESS HERE
$email_subject = "No convencional le da la bienvenida a $name"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "Necesitamos que corrobore sus datos.\n\n"."\n\nName: $name\n\nPhone: $phone\n\nEmail: $email_address";
$headers = "From: noreply@pibetta.netau.net\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
header("Location: listado_usuarios.php?rol=2");
	
    

    
    
    
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