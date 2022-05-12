<?php
include_once "includes_cliente/dbcon.php";
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
$sql=mysql_query("SELECT * FROM pedido_cliente where id_estado='5' AND id_cliente=$id_cliente");
$result=mysql_num_rows($sql);
sleep(2);
if($result>=1){
	echo "<p class='alert alert-warning'><i class='fa fa-gift fa-1x' aria-hidden='true'></i> Estimado cliente, tenemos el agrado de informarle que <b>".$result."</b> de sus pedidos ya se encuentran terminados!. Lo esperamos por nuestra sucursar para el retiro.!</p>";
}
//echo "salud2!";
//muestra los datos consultados
//while($row = mysql_fetch_array($sql)){
	//echo "<p>".$row['id_turno']." - ".$row['num_turno']." -</p> \n";
	// echo rand();
	
//}
?>