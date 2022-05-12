<?php 
// Actualizamos en funcion del id que recibimos 

	$id_producto = $_POST['id_producto']; 
	$codigo = $_POST['codigo'];
	$denominacion = $_POST['denominacion'];
	//$fecha_alta= date('Y-m-d'); no hace falta ya que la fecha de alta es siempre una 
	
	include('../includes_admin/dbcon.php');   

	$sSQL="UPDATE producto SET codigo='$codigo',denominacion='$denominacion' where id_producto='$id_producto'"; 
	mysql_query($sSQL); 

	//aca viene el for con los nuevos valores a agregar de materiales que trabaje el proveedor, se hace un delete y un insert 
	
	$id_caracter = $_POST['id_caracter'];
	$id_tipo = $_POST['id_tipo'];
	
	mysql_select_db($mysql_database, $conexion);
	//$sql = "DELETE FROM detalle_producto WHERE detalle_producto.id_producto='$id_producto' ";
	//mysql_query($sql); 
	//echo $sql ;
	
	//$id_materiales = $_POST['material'];
	
	// for ($i=0;$i<count($id_materiales);$i++) 
      	// { 
		// mysql_select_db($mysql_database, $conexion); 
		// $sql = mysql_query("INSERT INTO detalle_proveedor(id_proveedor,id_materiales) VALUES ('{$id_proveedor}','".$id_materiales[$i]."')", $conexion);
       	//echo "<br> Proveedor " . $id_proveedor . ": " . $id_materiales[$i]; 
		
      	// } 

	//echo $sSQL;
	//header("Location: listado_proveedor.php");
	//include('cierra_conexion.php');   
