<?php 
// Actualizamos en funcion del id que recibimos 
include "../includes_admin/dbcon.php";

include ("../seguridad.php");
// if($rol !='0'){
// header("location: ../logout.php");
	// exit();
// }
	$operador=$_SESSION['usuario'];
	//se saca de la session, para saber quien fue el que cambio de estado.
	
	
	$id_pedido = $_GET['id_pedido'];
	$estado= $_GET['id_estado']+1;
	$fecha = date('Y-m-d H:i:s');
	$hora = date('H:i:s');
	//$rol=$_GET['rol'];

	$sSQL2="UPDATE pedido_cliente SET id_estado='$estado' WHERE id_pedido='$id_pedido'";
	mysql_query($sSQL2);
	//echo $sSQL2;
	
	$qry2=mysql_query ("INSERT INTO historico_pedido(id_pedido,fecha,id_estado,operador) VALUES ('{$id_pedido}','{$fecha}','{$estado}','{$operador}')", $conexion);
	//echo $estado;
	header("Location: listado_pedidos.php?id_estado=$estado");



?>