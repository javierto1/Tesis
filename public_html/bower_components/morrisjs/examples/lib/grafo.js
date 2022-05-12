
$(function () {
<?php   
include('dbcon.php');             
$query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='1'"); 
$result = mysql_num_rows($query); 
?>
  Morris.Donut({
  element: 'graph',
  data: [
    {value: <?php echo $result;?>, label: 'PEDIDO'},
                          <?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='2'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'CONFIRMADO'},
                          <?php   
                                  
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='3'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'ELABORACION'},
                        <?php   
                                
                    $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='4'"); 
                    $result = mysql_num_rows($query); 
                    ?>
    {value: <?php echo $result;?>, label: 'TERMINADO'}
  ],
  formatter: function (x) { return x + "U."}
}).on('click', function(i, row){
  console.log(i, row);
});
});