<?php 
	include "../includes_admin/dbcon.php";
	$conexion = mysql_connect($host, $user, $pass);
 
	$codigo = $_POST['codigo'];
	$denominacion = $_POST['denominacion'];
	$fecha = date('Y-m-d');
	$categoria= $_POST['Categoria'];
	$descripcion= $_POST['descripcion'];
	$promo_precio= $_POST['promo_precio'];
	
	
$nombre_archivo = $_FILES['userfile']['name']; 
$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
 
	mysql_select_db($mysql_database, $conexion);  
 
	$qry1=mysql_query ("INSERT INTO producto(codigo,denominacion,categoria,url,descripcion,promo_precio,estado) VALUES ('{$codigo}','{$denominacion}','{$categoria}','{$nombre_archivo}','{$descripcion}','{$promo_precio}','1')", $conexion);
	
	//echo "'fecha $fecha' -- 'id estado $estado' -- 'precio $ $precio_vta' -- 'id cliente $id_cliente' -- 'id producto $id_producto' --  'id color $tipo_color'  --  'id material $tipo_material'  --  'id cantidad $tipo_cantidad'  -- 'id terminacion $tipo_terminacion'";
	
	$id_producto=mysql_insert_id();
	echo 'CODIGO:'.$codigo.'----';
	echo 'DENOMINACION:'.$denominacion.'<br>';
	
	$id_tipo1 = $_POST['tipo1'];
	$id_especifica1 = $_POST['caracteristica1'];
	
	for ($i=0;$i<count($id_especifica1);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_producto(id_producto,id_tipo,id_especifica) VALUES ('{$id_producto}','".$id_tipo1."','".$id_especifica1[$i]."')", $conexion);
       	echo "<br> Tipo : " . $id_tipo1; 
		echo " Caracteristica " . $id_especifica1[$i]; 
		
      	}

	$id_tipo2 = $_POST['tipo2'];
	$id_especifica2 = $_POST['caracteristica2'];
	
	for ($i=0;$i<count($id_especifica2);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_producto(id_producto,id_tipo,id_especifica) VALUES ('{$id_producto}','".$id_tipo2."','".$id_especifica2[$i]."')", $conexion);
       	echo "<br> Tipo : " . $id_tipo2; 
		echo " Caracteristica " . $id_especifica2[$i]; 
		
      	} 
		
	$id_tipo3 = $_POST['tipo3'];
	$id_especifica3 = $_POST['caracteristica3'];
	
	for ($i=0;$i<count($id_especifica3);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_producto(id_producto,id_tipo,id_especifica) VALUES ('{$id_producto}','".$id_tipo3."','".$id_especifica3[$i]."')", $conexion);
       	echo "<br> Tipo : " . $id_tipo3; 
		echo " Caracteristica " . $id_especifica3[$i]; 
		
      	} 
		
	$id_tipo4 = $_POST['tipo4'];
	$id_especifica4 = $_POST['caracteristica4'];
	
	for ($i=0;$i<count($id_especifica4);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_producto(id_producto,id_tipo,id_especifica) VALUES ('{$id_producto}','".$id_tipo4."','".$id_especifica4[$i]."')", $conexion);
       	echo "<br> Tipo : " . $id_tipo4; 
		echo " Caracteristica " . $id_especifica4[$i]; 
		
      	} 
		
	$id_tipo5 = $_POST['tipo5'];
	$id_especifica5 = $_POST['caracteristica5'];
	
	for ($i=0;$i<count($id_especifica5);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_producto(id_producto,id_tipo,id_especifica) VALUES ('{$id_producto}','".$id_tipo5."','".$id_especifica5[$i]."')", $conexion);
       	echo "<br> Tipo : " . $id_tipo5; 
		echo " Caracteristica " . $id_especifica5[$i]; 
		
      	} 

      	
//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 999000))) { 
   	echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   	if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'Img/'.$nombre_archivo)){ 

      	echo "El archivo ha sido cargado correctamente."; 
   	}else{ 
      	echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 
} 

?> 