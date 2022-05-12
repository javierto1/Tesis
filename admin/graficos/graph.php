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
 $(function () {
  Morris.Donut({
  element: 'graph',
  data: [
                 
  						<?php   
                                 
                      $query1 = mysql_query ("SELECT * FROM pedido_cliente where id_estado='1' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                      $result = mysql_num_rows($query1); 
                      ?>
    {value: <?php echo $result;?>, label: 'PEDIDO'},
                          <?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='2' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'CONFIRMADO'},
                          <?php   
                                  
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='3' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'ELABORACION'},
                        <?php   
                                
                    $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='4' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                    $result = mysql_num_rows($query); 
                    ?>
    {value: <?php echo $result;?>, label: 'TERMINADO'},
    <?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='5' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'FACTURADO'},
                          <?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='6' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'ENTREGADO'},
                          <?php   
                                  
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='7' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'CERRADO'},
                        <?php   
                                
                    $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='9' AND fecha_pedido BETWEEN '$desde' AND '$hasta'"); 
                    $result = mysql_num_rows($query); 
                    ?>
    {value: <?php echo $result;?>, label: 'CANCELADO'}
  ],
   formatter: function (x) { return x + "U."}
}).on('click', function(i, row){
  console.log(i, row);
});
});
 </script>

 <div id="graph">
  </div>    