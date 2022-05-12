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

	//echo $nombre.$apellido.$mail.$telefono.$nick.$password.$calle.$numero.$dpto.$letra.$n.$codigo_postal.$barrio.$ciudades.$provincias.$rol.$estado.$dni.$tipo_documento.$fecha_alta;
	
	
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
	$qry2=mysql_query ("INSERT INTO operador(id_datos,dni,estado) VALUES ('{$id_datos}','{$dni}','{$estado}')", $conexion);
	header("Location: listado_usuarios.php?rol=1");
	
	
	
	//echo $nombre, $apellido, $mail, $telefono, $calle, $numero, $dpto, $codigo_postal, $barrio, $ciudad, $provincia, $nick, $password, $rol, $estado, $dni ;
	
	
	
?>