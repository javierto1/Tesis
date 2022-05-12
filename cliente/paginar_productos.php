<?php
	include('../includes/dbcon.php');
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT * FROM PRODUCTOS"));
    $nroLotes = 12;
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

						$registro = mysql_query("SELECT * FROM PRODUCTOS ORDER BY ID_PRODUCTO DESC LIMIT $limit, $nroLotes");  
															


  	
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'<div class="col-xs-6 col-sm-4 col-md-3">            
								<div class="thumbnail">
									<img src="Images/Articulos/002 - cruz-del-sur-chenin-torrontes-6x750ml_iZ85675496XvZlargeXpZ1XfZ206812515-612227527-1XsZ206812515xIM.jpg" alt="">
									<b class="pull-left"><p class="text-center">'.$registro2['PRECIO_BOTELLA'].'</b> <b class="pull-right">'.$registro2['UNIDAD_MEDIDA'].'</b>
									
									<div class="caption">
											<h4><b>'.$registro2['PRECIO_BOTELLA'].'</b>'.$registro2['UNIDAD_MEDIDA'].'</h4>
											<p><i>Bodega "'.$registro2['BODEGA'].'"</i></p>
											<a type="button" class="btn btn-primary btn-xs">Precio por Unidad: $'.$registro['PRECIO_BOTELLA'].'</a>
											<br><br>
											<a type="button" class="btn btn-danger btn-xs">Precio por Caja: $'.$registro['PRECIO_CAJA'].'</a>
									</div>
								</div>
						</div>';		
	}
	
   
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>