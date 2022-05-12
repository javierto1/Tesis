<?php 
	include "includes_cliente/dbcon.php";
	include ("../admin/seguridad.php");
	$id_cliente=$_SESSION['usuario'];
		//if($rol !='2'){
		//header("location: logout.php");
		//	exit();
		//}
	//var_dump($_POST);

	$id = $_POST['id_producto'];
 	$fecha = date('Y-m-d');
	$precio = $_POST['nivel'];
	//tomo el segundo valor del array enviado, el primero es el precio
	$pizza = $_POST['a'];
	$porciones = split ("\,", $pizza);
		$preciopantallaA = $porciones[0];	
$cantidad = $porciones[1]; // porción2

	$pizzab = $_POST['b'];
	$porcionesb = split ("\,", $pizzab);	
		$preciopantallaB = $porcionesb[0];
$modulo= $porcionesb[1]; // porción2

	$pizzac = $_POST['c'];
	$porcionesc = split ("\,", $pizzac);
		$preciopantallaC = $porcionesc[0];	
$soporte = $porcionesc[1]; // porción2

	$pizzad = $_POST['d'];
	$porcionesd = split ("\,", $pizzad);	
		$preciopantallaD = $porcionesd[0];
$impresion= $porcionesd[1]; // porción2

	$pizzae = $_POST['e'];
	$porcionese = split ("\,", $pizzae);	
		$preciopantallaE = $porcionese[0];
$terminacion= $porcionese[1]; // porción2

$precio = $preciopantalla + $preciopantallaB + $preciopantallaC + $preciopantallaD + $preciopantallaE;

$query =mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$cantidad'"); 
$a= mysql_fetch_row($query);
$precio1=$a['0'];

$query1 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$modulo'"); 
$b= mysql_fetch_row($query1);
$precio2=$b['0'];

$query2 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$soporte'"); 
$c= mysql_fetch_row($query2);
$precio3=$c['0'];

$query3 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$impresion'"); 
$d= mysql_fetch_row($query3);
$precio4=$d['0'];

$query4 = mysql_query("SELECT precio FROM especifica WHERE id_especifica= '$terminacion'"); 
$e= mysql_fetch_row($query4);
$precio5=$e['0'];

$total = $precio1 + $precio2 + $precio3 + $precio4 + $precio5;

$archivo="TRUE";
//var_dump($_POST);
if (($total == $precio) && ($archivo=="TRUE") ) {
	//$sql=mysql_query("INSERT INTO pedido_cliente (id_producto, id_cliente, precio, id_estado, fecha, url) values ('$id','$id_cliente','$total','1',$fecha, $nombre_archivo)");    
	
	//$detalle=mysql_insert_id();
	
	$id_tipo = $_POST['tipo1'];
	$id_especifica1 = $cantidad;
	//$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id',$id_especifica1, $id_tipo)");

	$id_tipo2 = $_POST['tipo2'];
	$id_especifica2 = $modulo;
	//$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id',$id_especifica2, $id_tipo2)");
	$id_tipo3 = $_POST['tipo3'];
	$id_especifica3 = $soporte;
	//$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id',$id_especifica3, $id_tipo3)");
	$id_tipo4 = $_POST['tipo4'];
	$id_especifica4 = $impresion;
	//$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id',$id_especifica4, $id_tipo4)");
	$id_tipo5 = $_POST['tipo5'];
	$id_especifica5 = $terminacion;
	//$sql=mysql_query("INSERT INTO detalle_pedido (id_pedido, id_producto, id_especifica, id_tipo) values ('$detalle','$id',$id_especifica5, $id_tipo5)");
	
													$muestra =mysql_query("SELECT denominacion FROM producto WHERE id_producto= '$id'"); 
															$deno= mysql_fetch_row($muestra);
															$denominacion=$deno['0'];
													$muestra_cant =mysql_query("SELECT denominacion FROM especifica WHERE id_especifica= '$cantidad'"); 
															$cant= mysql_fetch_row($muestra_cant);
															$cantidad1=$cant['0'];
													$muestra_mod =mysql_query("SELECT denominacion FROM especifica WHERE id_especifica= '$modulo'"); 
															$mod= mysql_fetch_row($muestra_mod);
															$modulo1=$mod['0'];	
													$muestra_sop =mysql_query("SELECT denominacion FROM especifica WHERE id_especifica= '$soporte'"); 
															$sop= mysql_fetch_row($muestra_sop);
															$soporte1=$sop['0'];
													$muestra_imp =mysql_query("SELECT denominacion FROM especifica WHERE id_especifica= '$impresion'"); 
															$imp= mysql_fetch_row($muestra_imp);
															$impresion1=$imp['0'];
													$muestra_ter =mysql_query("SELECT denominacion FROM especifica WHERE id_especifica= '$terminacion'"); 
															$ter= mysql_fetch_row($muestra_ter);
															$terminacion1=$ter['0'];
	echo '													

                       
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Detalle Pedido<h4>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
                                    
										<tbody>
																						
											<tr>											

												<td colspan="2">Producto: <b>'.$denominacion.'</b></td>
												<td><b>Precio Final:</b> $<b>'.$total.'</b></td>
												<td><b>Fecha:</b><b>'.$fecha.'</b></td>
												<td><b>Fecha estimada de entrega:</b><b>'.$fecha.'</b></td>

											<tr>
											
												<td> <h5> <b>Caracteristicas:</b></h5> </td>
												
											</tr>
											<tr> <td> <b>CANTIDAD<b> </td><td> <b>MODULO <b></td><td> <b>SOPORTE <b></td><td> <b>IMPRESION <b></td><td> <b>TERMINACION <b></td></tr>

											 <td>'.$cantidad1.'</td><td>'.$modulo1.'</td><td>'.$soporte1.'</td><td>'.$impresion1.'</td><td>'.$terminacion1.'</td>
																								
											</tr>
											<tr>
											
												
												
											</tr>
											
										</tbody>
									</table>
								</div>
                            <!-- /.table-responsive -->
							</div>
                        
						</div>
						
									

                                
								
                </div>
                           
							<br>
								
													
        </div>';  
} else{
	echo "algo malo ocurrio!";
}



?>