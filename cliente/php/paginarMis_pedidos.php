<?php
	include('../includes_cliente/dbcon.php');
	include('../../admin/includes_admin/fecha_acomodada.php');
	
	$id_cliente=1;
	//LO TRAEMOS DE LA SESSION
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT * FROM pedido_cliente"));
    $nroLotes = 5;
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

						$registro = mysql_query(" 	SELECT 	pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta, pc.fecha_pedido,
															p.denominacion,
															dp.id, dp.apellido, dp.nombre, dp.username,
															ep.id_estado, ep.denominacion as deno
															 
													 FROM 
															pedido_cliente pc,
															producto p,
															datos_personales dp,
															estado_pedido ep
															
													
													
													WHERE 	pc.id_cliente = dp.id AND 
															pc.id_producto = p.id_producto AND 
															pc.id_estado = ep.id_estado AND
															pc.id_cliente='$id_cliente'
															ORDER BY fecha_pedido DESC
															LIMIT 	$limit, $nroLotes");  
															


  	$tabla = $tabla.'<div class="table-responsive table-bordered">
						<table class="table table-striped">
							<thead>
								<tr>
									<th width="200">Trabajo</th>
									<th width="150">Porcentaje</th>
									<th width="150">Estado Actual</th>
									<th width="150">Fecha Registro</th>
									<th width="100">Precio Final</th>
									<th width="250">Opciones</th>
								</tr>
							</thead>';
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'<tbody>
							<tr>
								<td><i>'.$registro2['denominacion'].'</i></td>
								<td>
									<div class="progress">
										<div class="progress progress-striped">
										  <div class="progress-bar progress-bar-info" style="width: 20%"><b> 20% </b></div>
										</div>
										<span class="progress-completed pull-right">60%</span>
										
										
									</div>
								</td>
								<td><span class="label label-primary">'.$registro2['deno'].'</span></td>
								<td><strong>'.fechaNormal($registro2['fecha_pedido']).'</strong></td>
								<td><strong>$ '.$registro2['precio_vta'].'</strong></td>
								<td>
									<button name="ver_mas" value="'.$registro2['id_pedido'].'" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalVerMas" data-toggle="tooltip" title="Ver más datos"> <i class="glyphicon glyphicon-edit">a</i></button> 
									<button name="historico" value="'.$registro2['id_pedido'].'" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalHistorico" data-toggle="tooltip" title="Historico"> <i class="glyphicon glyphicon-remove-circle">a</i></button>
									<a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Cancelar"> <i class="fa fa-ban" aria-hidden="true"></i> Cancelar </a>
								</td>
							</tr>
						  </tbody>';		
	}

    $tabla = $tabla.'</table> </div>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>