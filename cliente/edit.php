<?php
include "../admin/includes_admin/dbcon.php";
include ("../admin/seguridad.php");
$id_cliente=$_SESSION['usuario'];
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}
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
		echo "<div class=' col-md-9 col-lg-9'> 
                  <table class='table table-user-information'
                    <tbody id='respuesta1'>
						<form id='formulario' name='formulario' action='editar_mis_datos_enviado.php' name='customForm' id='customForm' method='post' onsubmit='enviar()' enctype='multipart/form-data'>
						<tr>
							<td>Username:</td>
							<td><input type='text' class='form-control' value=".$registro2['username']." disabled/></td>
						</tr>
						<tr>
							<td>Fecha de Alta:</td>
							<td><input type='date' class='form-control' value='".$registro2['fecha_alta']."' disabled></td>
						</tr>
						<tr>
							<td>Contraseña:</td>
							<td><input type='text' class='form-control' value='".$registro2['password']."'/></td>
						</tr>
						<tr>
							<td>Nombre:</td>
							<td><input type='text' class='form-control' value='".$registro2['nombre']."'/></td>
						</tr>
						<tr>
							<td>Apellido:</td>
							<td><input type='text' class='form-control' value='".$registro2['apellido']."'/></td>
						</tr>
                        <tr>
							<td>Calle:</td>
							<td><input type='text' class='form-control' value='".$registro2['calle']."'/> </td>
						</tr>
						<tr>
							<td>Número:</td>
							<td><input type='numeric' class='form-control' value='".$registro2['numero']."'/> </td>
						</tr>
						<tr>
							<td>Departamento:</td>
							<td><input type='text' class='form-control' value='".$registro2['dpto']."'/> </td>
						</tr>	
						<tr>
							<td>Letra:</td>
							<td><input type='text' class='form-control' value='".$registro2['letra']."'/> </td>
						</tr>
						<tr>
							<td>Barrio:</td>
							<td><input type='text' class='form-control' value='".$registro2['barrio']."'/></td>
						</tr>
						<tr>
							<td>Ciudad:</td>
							<td><input type='text' class='form-control' value='".$registro2['ciudad']."'/></td>
						</tr>
						<tr>
							<td>Provincia:</td>
							<td><input type='text' class='form-control' value='".$registro2['provincia']."'/></td>
						</tr>
						<tr>
							<td>Código Postal:</td>
							<td><input type='numeric' class='form-control' value='".$registro2['codigo_postal']."'/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type='text' class='form-control' value='".$registro2['mail']."' disabled/></td>
						</tr>
						<tr>
							<td>Número de Teléfono:</td>
							<td><input type='text' class='form-control' value='".$registro2['telefono']."'/></td>
						</tr>
						<tr>
							<td><button type'submit' class='btn btn-success pull-right'>GUARDAR</button></td>
							<td><a href='#' class='btn btn-danger'>CANCELAR</a></td>
						</tr>
						
					</form>	
                    </tbody>
                  </table>
                  
                  
                  
                </div>";
	}
echo '</table>';

?>
