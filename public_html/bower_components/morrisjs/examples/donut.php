<!doctype html>

<?php   
include('dbcon.php');             
$query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='1'"); 
$result = mysql_num_rows($query); 
?>
<head>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="../morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script>
  $(function () {
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
  </script>

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="../morris.css">
</head>
<body>
  <div clas="row">
<h1>Grafico Pedidos Por Estado</h1>
<div id="graph"></div>
</div>
</body>
