
<?php

include('../includes_admin/dbcon.php'); 
//recibo las variables con las q voy a trabajar;

$sumar= $_POST["sumartodo"];

$traer = mysql_query("SELECT * FROM stock");

while($mostrar = mysql_fetch_array($traer)){

$id_material=$mostrar['id_stock'];

$precio=$mostrar['venta'];

$sumar1=$sumar/100;

$total=$sumar1*$precio;

$total1=$precio+$total;

	$actualizar= mysql_query("UPDATE stock SET venta='$total1' WHERE id_stock='$id_material'");
}
	echo '<p class="alert alert-info"> Todos los productos del stock se actualizaron al '.$sumar.' %!</p>';

?>