 <?php 
include "../includes_admin/dbcon.php";
//include('dbcon.php');
//$fecha=date("Y-m-d");
//include "../includes_admin/fecha_acomodada.php";
//$fecha='2016-06-05';
//require('../includes_admin/fecha_acomodada.php');

$desde=$_POST['desde'];
$hasta=$_POST['hasta'];
//pc.fecha_pedido > date_sub(curdate(), interval 1 month)
?>

  <script src="../morris/morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script> 
 <script>
  // Use Morris.Bar
  $(function () {
var day_data = [

<?PHP 
$query="SELECT count(pc.id_producto), p.denominacion, p.id_producto
FROM pedido_cliente pc, producto p
WHERE p.id_producto = pc.id_producto AND fecha_pedido BETWEEN '$desde' AND '$hasta'
GROUP BY id_producto
ORDER BY COUNT(pc.id_producto)DESC limit 10";
// $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
      
     $result = mysql_query($query);
    while ($registro = mysql_fetch_array($result)){  
      $id_producto=$registro['id_producto'];
      $id_prod=$registro['denominacion'];
      $conta=mysql_query("SELECT * from pedido_cliente where id_producto=$id_producto");
      $total=mysql_num_rows($conta);
      
?>
  {"period1": "<?php echo $id_prod;?>", "licensed": "<?php echo $total;?>"},
  <?PHP ;}?>
];
Morris.Bar({
  element: 'barras1',
  data: day_data,
  xkey: 'period1',
  ykeys: ['licensed', 'sorned'],
  labels: ['Pedidos', 'SORN'],
  xLabelAngle: 60
});
});
  </script>

 <div id="barras1"></div> 