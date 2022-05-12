<?php 
       
 include "../includes_admin/dbcon.php";
 $conexion = mysql_connect($host, $user, $pass);
 
 $nombre = $_POST['nombre'];
 $apellido = $_POST['apellido'];
 //$material = $_POST['id_categorias']; 
 $razon_social = $_POST['razon_social'];
 $cuit = $_POST['cuit'];
 $cuil = $_POST['cuil'];
 $mail = $_POST['mail'];
 $telefono = $_POST['telefono'];
 $calle = $_POST['calle']; 
 $numero = $_POST['numero'];
 $barrio = $_POST['barrio'];
 $ciudades = $_POST['ciudad'];
 $provincias = $_POST['provincia'];
 $fecha_alta= date('Y-m-d');
 $codigo_postal = $_POST['codigo_postal'];
 $id_datos = 0; 

 //$rol = 3;
 
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
 
 
 mysql_select_db($mysql_database, $conexion);  
    mysql_select_db($mysql_database, $conexion);    
    $qry1=mysql_query ("INSERT INTO proveedor(nombre,apellido,razon_social,cuit,cuil,mail,telefono,calle,numero,barrio,ciudad,provincia,codigo_postal,fecha_alta) VALUES ('{$nombre}','{$apellido}','{$razon_social}','{$cuit}','{$cuil}','{$mail}','{$telefono}','{$calle}','{$numero}','{$barrio}','{$ciudad}','{$provincia}','{$codigo_postal}','{$fecha_alta}')", $conexion);
   
	$id_proveedor=mysql_insert_id();
	$id_materiales = $_POST['material'];
	
	for ($i=0;$i<count($id_materiales);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_proveedor(id_proveedor,id_materiales) VALUES ('{$id_proveedor}','".$id_materiales[$i]."')", $conexion);
       	//echo "<br> Proveedor " . $id_proveedor . ": " . $id_materiales[$i]; 
		
      	} 
	header("Location: listado_proveedor.php");
	
	
	//$id_datos=mysql_insert_id();
	//$qry2=mysql_query ("INSERT INTO cliente(id_datos,dni,estado) VALUE ('{$id_datos}','{$dni}','{$estado}')", $conexion);
	//header("Location: listado_proveedor.php");
 
 
 
?>