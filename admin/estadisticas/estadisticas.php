<?php 
include "includes_admin/dbcon.php";
//include('dbcon.php');
$fecha=date("Y-m-d");
//$fecha='2016-06-05';
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../css/jquery.css" rel="stylesheet">
	<link href="../css.css" media="screen" rel="stylesheet" type="text/css" />

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="morris/morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>	
  <script>
  $(function () {
  Morris.Donut({
  element: 'graph',
  data: [
  						<?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='1' AND fecha_pedido='$fecha'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'PEDIDO'},
                          <?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='2' AND fecha_pedido='$fecha'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'CONFIRMADO'},
                          <?php   
                                  
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='3' AND fecha_pedido='$fecha'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'ELABORACION'},
                        <?php   
                                
                    $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='4' AND fecha_pedido='$fecha'"); 
                    $result = mysql_num_rows($query); 
                    ?>
    {value: <?php echo $result;?>, label: 'TERMINADO'},
    <?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='5' AND fecha_pedido='$fecha'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'FACTURADO'},
                          <?php   
                                 
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='6' AND fecha_pedido='$fecha'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'ENTREGADO'},
                          <?php   
                                  
                      $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='7' AND fecha_pedido='$fecha'"); 
                      $result = mysql_num_rows($query); 
                      ?>
    {value: <?php echo $result;?>, label: 'CERRADO'},
                        <?php   
                                
                    $query = mysql_query ("SELECT * FROM pedido_cliente where id_estado='9' AND fecha_pedido='$fecha'"); 
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
<!--   -->
   <script>
  // Use Morris.Bar
   $(function () {
Morris.Bar({
  element: 'barr',
  data: [      
    <?PHP 
    // Gracias Juszczyk
    $query="SELECT count(p.id_pedido), p.id_cliente, d.nombre
FROM datos_personales d, pedido_cliente p
WHERE p.fecha_pedido > date_sub(curdate(), interval 1 month)
AND d.id = p.id_cliente
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
      
      ?>
     {x:'<?php echo $nombre; ?>', y:
   <?php  
                                               $query = mysql_query ("SELECT id_pedido FROM  pedido_cliente WHERE fecha_pedido > date_sub(curdate(), interval 1 month) AND  id_cliente='$id_cliente'"); 
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

  <script type="text/javascript">
/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
$(function () {
var day_data = [
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-7 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
  <?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-6 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-5 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
  <?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-4 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
  <?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-3 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
  <?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-2 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
  <?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '- 1 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
  <?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( ' ' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
  
];
Morris.Bar({
  element: 'barras',
  data: day_data,
  xkey: 'period',
  ykeys: ['licensed', 'sorned'],
  labels: ['Pedidos', 'SORN'],
  xLabelAngle: 60
});
});
  </script>

<script type="text/javascript">
/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
$(function () {
var day_data = [

<?PHP 
$query="SELECT count(pc.id_producto), p.denominacion, p.id_producto
FROM pedido_cliente pc, producto p
WHERE p.id_producto = pc.id_producto AND pc.fecha_pedido > date_sub(curdate(), interval 1 month)
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

<!-- Custom CSS -->
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
 <link rel="stylesheet" href="morris/morris.css">




<?php 
include "includes_admin/botonera_admin.php";
?>
</head>

<body>

<!-- Page Content -->
<div class="row">
        <div id="page-wrapper" class="panel-body">
            </BR>
			<div class="container-fluid">


				<div class="panel panel-default col-lg-6">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Pedidos
                        </div>
                        <div class="panel-body">
                            <h1>Pedidos Por Estado <small><?php echo $fecha=date("d-m-y");?></small></h1>
								<div id="graph" ></div>								
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default col-lg-6">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Clientes
                        </div>
                        <div class="panel-body">
                            <h1>Clientes con Más Pedidos <small>(ultimos 30 dias)</small></h1>
								<div id="barr"></div>									
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default col-lg-6">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Pedidos
                        </div>
                        <div class="panel-body">
                            <h1>Pedidos Por Mes</h1>
                <div id="barras"></div>                 
                        </div>

                        
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default col-lg-6">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Productos
                        </div>
                        <div class="panel-body">
                            <h1>Productos Más Vendidos <small>(ultimos 30 dias)</small></h1>
                <div id="barras1"></div>                 
                        </div>
                        
                        
                        <!-- /.panel-body -->
                    </div>
				</div>
		</div>
</div>    
</script>		
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</html>