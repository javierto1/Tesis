<?php
	require('../../../includes_admin/dbcon.php');
	require('../../../includes_admin/fecha_acomodada.php');
	
	$paginaActual = $_POST['partida'];
	//$estado = $_GET['id_estado'];
	$estado = 5;
	
    $nroProductos = mysql_num_rows(mysql_query(" SELECT * FROM pedido_cliente WHERE id_estado = $estado"));
    $nroLotes = 25;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	
	$registro = mysql_query("SELECT 							pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta, pc.fecha_pedido,
																p.denominacion,
																dp.id, dp.apellido, dp.nombre, dp.username,
																ep.id_estado, ep.denominacion as deno
															 
						FROM 
																pedido_cliente pc,
																producto p,
																datos_personales dp,
																estado_pedido ep
																
						WHERE 									
																pc.id_cliente = dp.id AND 
																pc.id_producto = p.id_producto AND 
																pc.id_estado = ep.id_estado AND
																pc.id_estado = $estado
						ORDER BY fecha_pedido ASC LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'
						
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Apellido, Nombre</th>
                                            <th>Producto</th>
                                            <th>Estado</th>
                                            <th>Fecha Pedido</th>
											<th>Monto Final</th>
                                        </tr>
                                    </thead>
                                    
															';
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'
									<tbody>
										<tr>
											<td>'.$registro2['apellido'].', '.$registro2['nombre'].'</td>
											<td>'.$registro2['denominacion'].'</td>
											<td>'.$registro2['deno'].'</td>
											<td>'.fechaNormal($registro2['fecha_pedido']).'</td>
											<td>$'.$registro2['precio_vta'].'</td>
										</tr>
                                    </tbody>';
                                
	}
								

    $tabla = $tabla.'</table>
                            </div>
                            <!-- /.table-responsive -->
							<center>
								<ul class="pagination" id="pagination"></ul>
							</center>
                        ';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>
