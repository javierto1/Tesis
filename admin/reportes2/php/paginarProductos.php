<?php
	include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT * FROM datos_personales WHERE rol='2'"));
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

  	
	$registro = mysql_query("SELECT * FROM datos_personales WHERE rol='2' ORDER BY fecha_alta ASC LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'
						
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Username</th>
                                            <th>Documento</th>
                                            <th>Fecha Alta</th>
                                        </tr>
                                    </thead>
                                    
															';
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'
									<tbody>
										<tr>
											<td>'.$registro2['apellido'].', '.$registro2['nombre'].'</td>
											<td>'.$registro2['username'].'</td>
											<td>'.$registro2['documento'].'</td>
											<td>'.fechaNormal($registro2['fecha_alta']).'</td>
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
