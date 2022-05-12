<?php 
	include "includes_cliente/dbcon.php";
	include ("../admin/seguridad.php");
	$id_cliente=$_SESSION['usuario'];
		//if($rol !='2'){
		//header("location: logout.php");
		//	exit();
		//}
	//var_dump($_POST);
//var_dump($_FILES);
	//datos del arhivo 
$nombre_archivo = $_FILES['userfile']['name']; 
$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 


//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 999000))) { 
   	echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   	if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'images/pedidos/'.$nombre_archivo)){ 

      	echo "El archivo ha sido cargado correctamente."; 
   	}else{ 
      	echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 
} 

	$id = $_POST['id_producto'];
 	$fecha = date('Y-m-d');
	$precio = $_POST['nivel'];
	//tomo el segundo valor del array enviado, el primero es el precio
	$pizza = $_POST['a'];
	$porciones = split ("\,", $pizza);
		$preciopantallaA = $porciones[0];	
$cantidad = $porciones[1]; // porción2

	$pizzab = $_POST['b'];
	$porcionesb = split ("\,", $pizzab);	
		$preciopantallaB = $porcionesb[0];
$modulo= $porcionesb[1]; // porción2

	$pizzac = $_POST['c'];
	$porcionesc = split ("\,", $pizzac);
		$preciopantallaC = $porcionesc[0];	
$soporte = $porcionesc[1]; // porción2

	$pizzad = $_POST['d'];
	$porcionesd = split ("\,", $pizzad);	
		$preciopantallaD = $porcionesd[0];
$impresion= $porcionesd[1]; // porción2

	$pizzae = $_POST['e'];
	$porcionese = split ("\,", $pizzae);	
		$preciopantallaE = $porcionese[0];
$terminacion= $porcionese[1]; // porción2

$precio = $preciopantalla + $preciopantallaB + $preciopantallaC + $preciopantallaD + $preciopantallaE;

$query =mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$cantidad'"); 
$a= mysql_fetch_row($query);
$precio1=$a['0'];

$query1 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$modulo'"); 
$b= mysql_fetch_row($query1);
$precio2=$b['0'];

$query2 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$soporte'"); 
$c= mysql_fetch_row($query2);
$precio3=$c['0'];

$query3 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$impresion'"); 
$d= mysql_fetch_row($query3);
$precio4=$d['0'];

$query4 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$terminacion'"); 
$e= mysql_fetch_row($query4);
$precio5=$e['0'];

$total = $precio1 + $precio2 + $precio3 + $precio4 + $precio5;

$archivo="TRUE";
//var_dump($_POST);
if (($total == $precio) && ($archivo=="TRUE") ) {
	$sql=mysql_query("INSERT INTO pedido_cliente (id_producto, id_cliente, precio_vta, id_estado, fecha_pedido, url) values ('$id','$id_cliente','$total','1','$fecha', '$nombre_archivo')");    
	
	$detalle=mysql_insert_id();
	
	$id_tipo = $_POST['tipo1'];
	$id_especifica1 = $cantidad;
	$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id','$id_especifica1', '$id_tipo')");

	$id_tipo2 = $_POST['tipo2'];
	$id_especifica2 = $modulo;
	$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id','$id_especifica2', '$id_tipo2')");
	$id_tipo3 = $_POST['tipo3'];
	$id_especifica3 = $soporte;
	$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id','$id_especifica3', '$id_tipo3')");
	$id_tipo4 = $_POST['tipo4'];
	$id_especifica4 = $impresion;
	$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id','$id_especifica4', '$id_tipo4')");
	$id_tipo5 = $_POST['tipo5'];
	$id_especifica5 = $terminacion;
	$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id','$id_especifica5', '$id_tipo5')");
	//echo "Grabado correctamente";
	//echo $nombre_archivo;
	//$detalle=37;
	echo '
	<form name=form1 method="post" action="pedido_grabado.php"> 
<input type="hidden" name="id_pedido" id="id_pedido" value='.$detalle.'> 
</form> 
<script> 
document.form1.submit(); 
</script>' ;

} else{
	echo "algo malo ocurrio!";
	echo $detalle;
}

?>