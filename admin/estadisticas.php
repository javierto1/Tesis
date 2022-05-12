<?php 
include "includes_admin/dbcon.php";

//include('dbcon.php');
$fecha=date("Y-m-d");
//$fecha='2016-06-05';
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
//if($rol !='2'){
//header("location: logout.php");
//  exit();
//}
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
    <link href="./css/jquery-ui.css" rel="stylesheet">
    <link href="../css/jquery-ui.theme.css" rel="stylesheet">
    <link href="../css/jquery.css" rel="stylesheet">
	<link href="../css.css" media="screen" rel="stylesheet" type="text/css" />

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="morris/morris.js"></script>
  <script src="graficos/graph.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>	
  
<!--   -->
   

  <script type="text/javascript">
/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
$(function () {
var day_data = [
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-12 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-11 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-10 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-9 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-8 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query=mysql_query ("SELECT * FROM  pedido_cliente WHERE fecha_pedido LIKE '$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_num_rows($query);    
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $result1;?>},
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
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-12 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-11 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-10 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-9 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-8 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-7 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-6 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-5 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-4 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-3 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-2 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
      {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
<?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
  <?PHP 
$fecha = date('-Y-m');
$nuevafecha = strtotime ( ' ' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
    $query1=mysql_query ("SELECT sum(precio_vta) AS Total FROM  pedido_cliente WHERE fecha_pedido LIKE '%$nuevafecha%'");
   // $query ="SELECT distinct id_cliente FROM pedido_cliente WHERE fecha_pedido='$fecha'"; 
     $result1 = mysql_fetch_assoc($query1);
     $total=$result1['Total'];
     if (empty($total)) {
      $total =0;
    }
      ?>
  {"period": "<?php echo $nuevafecha;?>", "licensed": <?php echo $total;?>},
  
 
  
];
Morris.Bar({
  element: 'money',
  data: day_data,
  xkey: 'period',
  ykeys: ['licensed', 'sorned'],
  labels: ['Recaudacion', 'SORN'],
   xLabelAngle: 60
});
});
  </script>

<!-- Custom CSS -->
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
 <link rel="stylesheet" href="morris/morris.css">

<?php 
include "includes_admin/botonera_admin1.php";
?>



</head>

<body>

<!-- Page Content -->
<div class="row col-lg-12">
        <div id="page-wrapper" class="panel-body">
            <h1 class="page-header"><img src="../images/iconos/Balance.png" height="70px" width="70px"/><b>Gráficos - Estadísticas</B></h1>
			<div class="container-fluid">
        <hr>

 <div class="panel panel-default  col-lg-12">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <strong>Pedidos Por Mes Del Ultimo Año</strong>
                        </div>
                        <div class="panel-body">
                            
                <div id="barras"></div>                 
                        </div>

                        
                        <!-- /.panel-body -->
                    </div>
                   
				<div class="panel panel-info col-lg-6">
                        <div class="panel-heading">
                          
                            <i class="fa fa-bar-chart-o fa-fw"></i><strong>Pedidos Por Estado</strong>
                            <form class="form-inline" id="rosca" name="rosca" method="post">
                  <strong>DE</strong>&nbsp;<input  class="form-control" type="date" id="desde" name="desde" value="">&nbsp;<strong>AL</strong>&nbsp;<input class="form-control" type="date" id="hasta" name="hasta" value="<?php echo $fecha=date('Y-m-d');?>">
                  <input type="button" id="generar" name="generar" value="GENERAR" class="btn btn-primary">
                </form>

                        </div>
                        <div class="panel-body">
                          
								<div id="respuesta" > 
                 
              </div>								
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-info col-lg-6">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <strong>Clientes Con Más Pedidos</strong>
                            <form class="form-inline" method="post">
                  <strong>DE</strong>&nbsp;&nbsp;<input  class="form-control" type="date" id="desde1" name="desde" value="">&nbsp;&nbsp;<strong>AL</strong>&nbsp;&nbsp;<input class="form-control" type="date" id="hasta1" name="hasta" value="<?php echo $fecha=date('Y-m-d');?>">
                  <input type="button" id="bar1" name="bar1" value="GENERAR" class="btn btn-primary">
                </form>
                        </div>
               <div class="panel-body">
                           
								<div id="bar" > 
                  
              </div>  							
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    
                   
                    <div class="panel panel-info col-lg-12">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <strong>Productos Más Vendidos</strong>
                  <form class="form-inline" method="post">
                  <strong>DE</strong>&nbsp;&nbsp;<input  class="form-control" type="date" id="desde2" name="desde" value="">&nbsp;&nbsp;<strong>AL</strong>&nbsp;&nbsp;<input class="form-control" type="date" id="hasta2" name="hasta" value="<?php echo $fecha=date('Y-m-d');?>">
                  <input type="button" id="barr" name="barr" value="GENERAR" class="btn btn-primary">
                </form>
                        </div>
                        <div class="panel-body">
                            
                <div id="barr1"></div>         
                        </div>
                        
                        
                        <!-- /.panel-body -->
                    </div>
                    
                    <div class="panel panel-default  col-lg-12">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <strong>Recaudación Por Mes Del Último Año</strong>
                        </div>
                        <div class="panel-body">
                            
                <div id="money"></div>                 
                        </div>
                          </br>
                        
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