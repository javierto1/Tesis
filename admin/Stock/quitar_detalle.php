
<?php

include('../includes_admin/dbcon.php'); 
$id_detalle= $_POST['id_detalle'];


//traigo el id_facturas que corresponde a ese detalle
$id_factura= mysql_query("SELECT * FROM detalle_facturas where id_detalle = '$id_detalle'");
   while ($row = mysql_fetch_array($id_factura)){
   $id_f = $row['id_facturas'];
   $cantidad= $row['cantidad'];
   $materiales= $row['material'];
   $tamano= $row['tamano'];
   $precio_compracm2=$row['precio_compracm2'];
 }

$id_factura= mysql_query("SELECT * FROM facturas where id_facturas = '$id_f'");
   while ($row = mysql_fetch_array($id_factura)){
   $id_p = $row['id_proveedor'];
  }

//actualizar stock con los datos de la factura
//traigo la cantidad actual del stock, el RESTO! El total_tamanoCM2 es el total a la ultima compra para asi descontar del resto y poder sacar el porcentaje
$stock= mysql_query("SELECT * FROM stock where id_item='$materiales' ");
while ($ss = mysql_fetch_array($stock)){
   $stock1 = $ss['resto'];
   $precio= $ss['precio_ultima_compracm2'];

   }
 //multiplico el tamano por la cantidad para obtener el total q deseo sumar
$tamano1=$tamano*$cantidad;
//resto el total nuevo con el existente en la BD
 $stock_a_grabar=$stock1 - $tamano1;
 //Precio Venta
 $nuevo_precio=$precio_compracm2/$tamano;
//Precio Costo
 $ultimoprecio= mysql_query("SELECT * FROM historico_stock where detalle='$id_detalle'");
 while ($buscar = mysql_fetch_array($ultimoprecio)){
 $precio1= $buscar['precio_ultima_compracm2'];
}
 //Grabo el total nuevo
 $porcentaje=$stock_a_grabar*100/$stock_a_grabar;
 $stock_grabado= mysql_query("UPDATE stock SET precio_ultima_compracm2='$precio1', total_tamanoCM2='$stock_a_grabar', resto='$stock_a_grabar',venta='$nuevo_precio',porcentaje='$porcentaje' WHERE id_item='$materiales'");

/*
 $stock= mysql_query("SELECT id_item,resto,total_tamanoCM2,precio_ultima_compracm2,porcentaje,venta,MAX(fecha) FROM historico_stock where id_item='$materiales'");
while ($ss = mysql_fetch_array($stock)){
   $stock1 = $ss['resto'];
   $id_h = $ss['id_item'];
   $tamano_h = $ss['total_tamanoCM2'];
   $precio_h = $ss['precio_ultima_compracm2'];
   $porcentaje_h = $ss['porcentaje'];
   $venta_h = $ss['venta'];
  
  mysql_query("UPDATE stock SET total_tamanoCM2='$tamano_h', resto='$stock1', porcentaje='$porcentaje_h', precio_ultima_compracm2='$precio_h', venta='$venta_h' WHERE id_item='$materiales'");;
   }*/

//Elimino el detalle q se deasea quitar
$quitar=mysql_query("DELETE FROM detalle_facturas WHERE id_detalle='$id_detalle'");

//voys busco los detalles de la factura los traigo y los imprimos
$resultado = mysql_query("SELECT * FROM detalle_facturas WHERE id_facturas = '$id_f'");

echo '<table class="table table-striped table-bordered table-hover dataTable no-footer"><tr class="alert-info"><td>Cantidad</td><td>Material</td><td>Tamaño</td><td>lote</td><td>Precio</td><td>Quitar Item</td></tr>';
while($mostrar = mysql_fetch_array($resultado)){
  echo '<tr></br><td>'.$mostrar['cantidad'].'</td>
  <td>'.$mostrar['material'].'</td>
  <td>'.$mostrar['tamano'].'</td>
  <td>'.$mostrar['lote'].'</td>
  <td>'.$mostrar['precio_compracm2'].'</td>
   <td><input class="btn-default" id="'.$mostrar['id_detalle'].'" name="id_detalle"  onclick="quitar_detalle($id_detalle='.$mostrar['id_detalle'].');" type="button" value="Quitar" /></td></tr>';}
//busco los detalles q corresponden al id de la misma factura los sumo los nombro TOTAL y los traigo en la variable total1! entendiste javi?
$total=mysql_query("SELECT SUM(precio_compracm2)AS TOTAL FROM detalle_facturas WHERE id_facturas = '$id_f'");
$row = mysql_fetch_array($total);
$total1 = $row["TOTAL"];
echo '<tr><td></td><td></td><td></td><td></td><td class="alert-warning">Total='.$total1.'</td></tr></table>';
//<input name="button" type=image class="img-circle img-responsive img-center" src="images/cajas/right_arrow-256.png"  value="1" id="1" onclick="llamadaAjax()"></input>
?>