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
 $query1="SELECT * from datos_personales WHERE id='$id_cliente'";
 $query=mysql_query($query1);
 $resultado = mysql_fetch_array($query);
 $nombre = $resultado[2];
 $apellido = $resultado[3];
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
					<p class="lead">Hola <b><?php echo $nombre.','.$apellido;?></b> estos son sus datos:</p><hr>
				</div>
	</div>
	

<?php  
							// sleep(1);
// $data = $_POST['value'];
// $field = $_POST['value'];


// $sSQL2 = "UPDATE datos_personales SET `'".$field."'`='".$data."' WHERE id=1";
// mysql_query($sSQL2);
// echo $data;
$id=(int) $_GET['id'];

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM datos_personales WHERE id='$id'");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

	while($registro2 = mysql_fetch_array($registro)){ 
	
	echo'

	
	 <div class="row">
           
		<!-- BANNER DATOS PERSONALES Y PEDIDOS ESTADO -->
			<div class="col-lg-1"></div>
		
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 toppad" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">'.$registro2['apellido'].', '.$registro2['nombre'].'</h3>
            </div>
            <div class="panel-body">
              <div class="row">
			 
                <div class="col-md-2 col-lg-2 " align="center">
					 <div class="thumbnail">
						<img alt="User Pic" src="images/Img/'.$registro2['url'].'" class="img-circle img-responsive">
							<div class="caption">
								<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" >CAMBIAR <i class="fa fa-camera" aria-hidden="true"></i></a>
							</div>
					</div>
				</div>
               
                <div class=" col-md-9 col-lg-9"> 
                  <table class="table table-user-information"
                    <tbody id="respuesta1">
						<form action="editar_mis_datos_enviado.php" name="customForm" id="customForm" method="post" enctype="multipart/form-data" >
						<tr>
							<td>Username:</td>
							<td>
								<input type="text" class="form-control" value="'.$registro2['username'].'" disabled/>
								<input type="hidden" class="form-control" value="'.$registro2['id'].'" name="id"/>
							</td>
						</tr>
						<tr>
							<td>Fecha de Alta:</td>
							<td><input type="date" class="form-control" value="'.$registro2['fecha_alta'].'" name="" disabled></td>
						</tr>
						<tr>
							<td>Contraseña:</td>
							<td><input type="password" class="form-control" value="'.$registro2['password'].'" name="password"/></td>
						</tr>
						<tr>
							<td>Nombre:</td>
							<td><input type="text" class="form-control" value="'.$registro2['nombre'].'" name="nombre"/></td>
						</tr>
						<tr>
							<td>Apellido:</td>
							<td><input type="text" class="form-control" value="'.$registro2['apellido'].'" name="apellido"/></td>
						</tr>
						<tr>
							<td>Documento:</td>
							<td><input type="numeric" class="form-control" value="'.$registro2['documento'].'" name="documento"/></td>
						</tr>
                        <tr>
							<td>Calle:</td>
							<td><input type="text" class="form-control" value="'.$registro2['calle'].'" name="calle"/> </td>
						</tr>
						<tr>
							<td>Número:</td>
							<td><input type="numeric" class="form-control" value="'.$registro2['numero'].'" name="numero"/> </td>
						</tr>
						<tr>
							<td>Departamento:</td>
							<td><input type="text" class="form-control" value="'.$registro2['dpto'].'" name="dpto"/> </td>
						</tr>	
						<tr>
							<td>Letra:</td>
							<td><input type="text" class="form-control" value="'.$registro2['letra'].'" name="letra"/> </td>
						</tr>
						<tr>
							<td>Barrio:</td>
							<td><input type="text" class="form-control" value="'.$registro2['barrio'].'" name="barrio"/></td>
						</tr>
						<tr>
							<td>Ciudad:</td>
							<td><input type="text" class="form-control" value="'.$registro2['ciudad'].'" name="ciudad"/></td>
						</tr>
						<tr>
							<td>Provincia:</td>
							<td><input type="text" class="form-control" value="'.$registro2['provincia'].'" name="provincia"/></td>
						</tr>
						<tr>
							<td>Código Postal:</td>
							<td><input type="numeric" class="form-control" value="'.$registro2['codigo_postal'].'" name="codigo_postal"/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="mail" class="form-control" value="'.$registro2['mail'].'" name="mail" /></td>
						</tr>
						<tr>
							<td>Número de Teléfono:</td>
							<td><input type="text" class="form-control" value="'.$registro2['telefono'].'" name="telefono"/></td>
						</tr>
						<tr>
							<td><button type"submit" class="btn btn-success pull-right">GUARDAR</button></td>
							<td><a href="javascript:history.go(-1);" class="btn btn-danger">CANCELAR</a></td>
						</tr>
						
					</form>	
                    </tbody>
                  </table>
                  
                  
                  
                </div>
	
</table>
                  
                 
                </div>
              </div>
            </div>
               
           ';}?> 
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