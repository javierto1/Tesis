
<?php

include('../includes_admin/dbcon.php'); 
//recibo las variables con las q voy a trabajar;
$id_material= $_POST["material"];
$precio= $_POST["precio"];
$sumar= $_POST["sumar"];


$sumar1=$sumar/100;

$total=$sumar1*$precio;

$total1=$precio+$total;



 $actualizar= mysql_query("UPDATE especifica SET precio='$total1' WHERE id_especifica='$id_material'");

//voys busco los detalles de la factura los traigo y los imprimos

$resultado = mysql_query("SELECT * FROM especifica WHERE id_especifica = '$id_material'");

while($mostrar = mysql_fetch_array($resultado)){
  echo '<p class="alert alert-info"> El nuevo precio de venta es '.$mostrar['precio'].'!</p>';
}

?>