 <?php 
include "../includes_admin/dbcon.php";
//include('dbcon.php');
//$fecha=date("Y-m-d");
//include "../includes_admin/fecha_acomodada.php";
//$fecha='2016-06-05';
//require('../includes_admin/fecha_acomodada.php');

$desde=$_POST['desde'];
$hasta=$_POST['hasta'];

?>

  <script src="../morris/morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script> 
 <script>
  // Use Morris.Bar
   $(function () {
Morris.Bar({
  element: 'barr',
  data: [      
    <?PHP 
    // Gracias Juszczyk
    $query="SELECT count(p.id_pedido), p.id_cliente, d.nombre,  d.apellido
FROM datos_personales d, pedido_cliente p
WHERE d.id = p.id_cliente AND fecha_pedido BETWEEN '$desde' AND '$hasta' 
GROUP BY id_cliente
ORDER BY COUNT(id_pedido)DESC limit 5";

    /*$query2="SELECT distinct p.id_cliente, d.nombre
FROM datos_personales d, pedido_cliente p
where d.id = p.id_cliente AND p.fecha_pedido > date_sub(curdate(), interval 1 month)";*/

   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result = mysql_query($query);
    while ($registro = mysql_fetch_array($result)){  
      $id_cliente=$registro['id_cliente'];
      $nombre=$registro['nombre'];
      $apellido=$registro['apellido'];
     //$pedidos=$registro[count(p.id_pedido)];
      
      ?>
     {x:'<?php echo $nombre.' '.$apellido; ?>', y:
   <?php  
                                               //$query = mysql_query ("SELECT id_pedido FROM  pedido_cliente WHERE fecha_pedido > date_sub(curdate(), interval 1 month) AND  id_cliente='$id_cliente'");
                                             $query = mysql_query ("SELECT id_pedido FROM  pedido_cliente WHERE  id_cliente='$id_cliente' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                                              $result1 = mysql_num_rows($query);                    
                                               ?>
                                               <?php echo $result1;?>},<?PHP ;} ?> 
              
  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Pedidos'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
      var red = Math.ceil(255 * row.y / this.ymax);
      return 'rgb(' + red + ',0,0)';
    }
    else {
      return '#000';
    }
  }
});
});
  </script>

 <div id="barr"></div> 