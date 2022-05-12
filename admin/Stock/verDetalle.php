<?php
include('../includes_admin/dbcon.php'); 
$bday= $_POST['bday'];
$numero = $_POST['numero'];
$id_pp= $_POST['buscar_proveedor'];
// busco el id del proveedor por que envio el cuit o cuil no lo sepo
$id_proveedor= mysql_query("SELECT * FROM proveedor where cuit = '$id_pp' or cuil ='$id_pp'");
 while ($row = mysql_fetch_array($id_proveedor)){
   $id_p = $row['id_proveedor'];
 }
//busco el id de la factura q corresponde a ese proveedor comprobando que sea el mismo numero y la misma fecha
 $id_factura= mysql_query("SELECT * FROM facturas where id_proveedor = '$id_p' and numero='$numero' and fecha='$bday'");
   while ($row = mysql_fetch_array($id_factura)){
   $cod = $row['id_facturas'];
                }
$codigo = substr($cod);

$resultado = mysql_query("SELECT * FROM detalle_facturas WHERE id_facturas = '$codigo'");

echo '<ul>';
while($mostrar = mysql_fetch_array($resultado)){
	echo '<li>'.$mostrar['cantidad'].'</li><li>'.$mostrar['material'].'</li>';
}
echo '</ul>';
?>