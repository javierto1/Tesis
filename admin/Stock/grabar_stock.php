
<?php

include('../includes_admin/dbcon.php'); 
//recibo las variables con las q voy a trabajar;
$id_pp= $_POST['buscar_proveedor'];
$numero= $_POST["numero"];
$tipo= $_POST["tipo"];
$bday= $_POST['bday'];
$cantidad= $_POST['cantidad'];
$materiales= $_POST["materiales"];
$tamano= $_POST["tamano"];
$precio= $_POST['precio'];
$lote= $_POST['lote'];


//hago la consulta que me devuelva el id del proveedor con ese numero de cuit o cuil
 $id_proveedor= mysql_query("SELECT * FROM proveedor where cuit = '$id_pp' or cuil ='$id_pp'");
 while ($row = mysql_fetch_array($id_proveedor)){
   $id_p = $row['id_proveedor'];
 }
//compruebo q ese proveedor no tenga otra factura con el mismo numero y la misma fecha
   $comprobar = mysql_num_rows(mysql_query("SELECT * FROM facturas WHERE id_proveedor = '$id_p' and numero = '$numero' and fecha='$bday'"));
//si la comrpobacion me da 0 grabo la factura
if($comprobar == 0){
   $sql=mysql_query("INSERT INTO facturas (id_proveedor, tipo, numero,fecha) values ('$id_p','$tipo','$numero','$bday')");
    //me hace falta grabar los datos de la factura y traer el id de factura para seguir
   $id_factura= mysql_query("SELECT * FROM facturas where id_proveedor = '$id_p' and numero='$numero' and fecha='$bday'");
   while ($row = mysql_fetch_array($id_factura)){
   $id_f = $row['id_facturas'];
                }
  //ya tengo el id de la factura entonces ahora puedo grabar los detalles de la misma
   mysql_query("INSERT INTO detalle_facturas (id_facturas, cantidad, material, tamano, precio_compracm2, lote)VALUES('$id_f','$cantidad','$materiales','$tamano','$precio','$lote') ");
  }else{
  //vuelvo a buscar el id de la factura, pero en este caso me graba solo el detalle xq ya existe una factura en la misma fecha con el mismo numero y del mismo proveedor   
   $id_factura= mysql_query("SELECT * FROM facturas where id_proveedor = '$id_p' and numero='$numero' and fecha='$bday'");
   while ($row = mysql_fetch_array($id_factura)){
   $id_f = $row['id_facturas'];
 }
 //gravo el detalle
  

   mysql_query("INSERT INTO detalle_facturas (id_facturas, cantidad, material, tamano, precio_compracm2, lote)VALUES('$id_f','$cantidad','$materiales','$tamano','$precio','$lote') ");
   
   //recupero el id del detalle insertado para grabarlo en el historico de facturas
      
}
$detalle_h=mysql_insert_id();
//actualizar stock con los datos de la factura
//traigo la cantidad actual del stock, el RESTO! El total_tamanoCM2 es el total a la ultima compra para asi descontar del resto y poder sacar el porcentaje
// tambien para guardar el historico de stock con detalle correspondiente
$stock= mysql_query("SELECT * FROM stock where id_item='$materiales' ");
while ($ss = mysql_fetch_array($stock)){
   $stock1 = $ss['resto'];
   $id_h = $ss['id_item'];
   $tamano_h = $ss['total_tamanoCM2'];
   $precio_h = $ss['precio_ultima_compracm2'];
   $porcentaje_h = $ss['porcentaje'];
   $venta_h = $ss['venta'];
   $fecha_h= date("Y-m-d H:i:s"); 
  mysql_query("INSERT INTO historico_stock (total_tamanoCM2, id_item, precio_ultima_compracm2, resto, porcentaje, venta, fecha, detalle)VALUES('$tamano_h','$id_h','$precio_h','$stock1','$porcentaje_h','$venta_h','$fecha_h','$detalle_h') ");
   }
 //multiplico el tamano por la cantidad para obtener el total q deseo sumar
$tamano1=$tamano*$cantidad;
//sumo el total nuevo con el existente en la BD
 $stock_a_grabar=$stock1 + $tamano1;

 //Obtengo el precio por cm2
$precio2=$precio/$tamano;

 //Grabo el total nuevo
 $precio1=$precio2*0.5;
 $precioventa=$precio2 + $precio1;
 
 //$porcentaje=$stock_a_grabar*100/$stock_a_grabar;
 $porcentaje=0;
 $stock_grabado= mysql_query("UPDATE stock SET total_tamanoCM2='$stock_a_grabar', resto='$stock_a_grabar', porcentaje='$porcentaje', precio_ultima_compracm2='$precio2', venta='$precioventa' WHERE id_item='$materiales'");

//voys busco los detalles de la factura los traigo y los imprimos
$consulta ="SELECT d.cantidad, d.material, d.tamano, d.lote, d.precio_compracm2, d.id_detalle, m.denominacion, m.id_item FROM detalle_materiales m, detalle_facturas d WHERE id_facturas = '$id_f' and d.material = m.id_item";
$resultado = mysql_query($consulta);

echo '<table class="table table-striped table-bordered table-hover dataTable no-footer"><tr class="alert-info"><td>Cantidad</td><td>Material</td><td>Tamaño</td><td>lote</td><td>Precio</td><td>Quitar Item</td></tr>';
while($mostrar = mysql_fetch_array($resultado)){
  echo '<tr></br><td>'.$mostrar['cantidad'].'</td>
  <td>'.$mostrar['denominacion'].'</td>
  <td>'.$mostrar['tamano'].'</td>
  <td>'.$mostrar['lote'].'</td>
  <td>'.$mostrar['precio_compracm2'].'</td>
  <td><input class="btn-default alert-warning" id="'.$mostrar['id_detalle'].'" name="id_detalle"  onclick="quitar_detalle($id_detalle='.$mostrar['id_detalle'].');" type="button" value="Quitar" /></td></tr>';}
//busco los detalles q corresponden al id de la misma factura los sumo los nombro TOTAL y los traigo en la variable total1! entendiste javi?
$total=mysql_query("SELECT SUM(precio_compracm2)AS TOTAL FROM detalle_facturas WHERE id_facturas = '$id_f'");
$row = mysql_fetch_array($total);
$total1 = $row["TOTAL"];
echo '<tr><td></td><td></td><td></td><td></td><td class="alert-warning">Total='.$total1.'</td></tr></table>';
?>