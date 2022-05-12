<!DOCTYPE html>
<html lang="en">
<?php 
include "../admin/includes_admin/dbcon.php"; 
include "../admin/includes_admin/fecha_acomodada.php";
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cliente - Gráfica "No Convencional"</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
	
	<script src="js/jquery.js"></script>
	<script src="js/editar_mis_datos.js"></script>
	
	<!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>
	 $(document).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
 });
	
	</script>
	
	
</head>

<body>



<!-- Page Content -->
<div class="container">
<?php include ("includes_cliente/botonera_cliente.php"); ?>
    <div class="row">
			<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<p class="lead">Hola <b><?php echo $nombre.','.$apellido;?></b></b> estos son sus datos:</p><hr>
				</div>
	</div>
	

<?php  
							//$id = $_GET['id']; 
							$id = $_SESSION["usuario"];
							
							$query = "select * from datos_personales WHERE id='$id'"; 
							$result = mysql_query($query); 

						while ($row = mysql_fetch_array($result)){ ?>

	
	 <div class="row">
           
		<!-- BANNER DATOS PERSONALES Y PEDIDOS ESTADO -->
			<div class="col-lg-1"></div>
		
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 toppad" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?=$row['apellido']?>, <?=$row['nombre']?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
			 
                <div class="col-md-2 col-lg-2 " align="center">
					 <div class="thumbnail">
						<img alt="User Pic" src="images/Img/<?=$row['url']?>" class="img-circle img-responsive">
							<div class="caption">
								<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" >CAMBIAR <i class="fa fa-camera" aria-hidden="true"></i></a>
							</div>
					</div>
				</div>
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9"> 
                  <table class="table table-user-information">
                    <tbody id="respuesta1">
						<tr>
							<td>Username:</td>
							<td><?=$row['username']?></td>
						</tr>
						<tr>
							<td>Fecha de Alta:</td>
							<td><?=fechaNormal($row['fecha_alta'])?></td>
						</tr>
						<tr>
							<td>Contraseña:</td>
							<td>°°°°°°°°°°°°°°°°°°</td>
						</tr>
						<tr>
							<td>Nombre</td>
							<td><?=$row['apellido']?>, <?=$row['nombre']?></td>
						</tr>
						<tr>
							<td>Documento</td>
							<td><?=$row['tipo_documento']?>: <?=$row['documento']?></td>
						</tr>
                        <tr>
							<td>Dirección:</td>
							<td><?=$row['calle']?> <?=$row['numero']?> <br><br>
								<?=$row['dpto']?> - <?=$row['letra']?> </td>
						</tr>
						<tr>
							<td>Barrio:</td>
							<td><?=$row['barrio']?></td>
						</tr>
						<tr>
							<td>Ciudad:</td>
							<td><?=$row['ciudad']?></td>
						</tr>
						<tr>
							<td>Provincia:</td>
							<td><?=$row['provincia']?> (CP: <?=$row['codigo_postal']?>)</td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><a href="mailto:<?=$row['mail']?>"><?=$row['mail']?></a></td>
						</tr>
						<tr>
							<td>Número de Teléfono:</td>
							<td><?=$row['telefono']?></td>
						</tr>
                     
                    </tbody>
                  </table>
                  
                 
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" href="mis_mensajes.php" type="button" class="btn btn-sm btn-primary">IR A MENSAJES <i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="editar_mis_datos.php?id=<?=$row['id'];?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" name="editar" value="<?=$row['id'];}?>" class="btn btn-sm btn-warning">EDITAR <i class="glyphicon glyphicon-edit"></i></a>
                        </span>
                 </div>
            
          </div>
        </div>
      </div>
										
	<div class="row"><div class="col-lg-1"></div><div class="col-lg-10"><hr></div></div>	
	
</div><!-- FIN CONTAINER -->	
    <!-- /.container -->
	
	<?php include ("includes_cliente/footer_cliente.php"); ?>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>