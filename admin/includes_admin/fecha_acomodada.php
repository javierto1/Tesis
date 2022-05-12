<?php
function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}

function fecha_horaNormal($fecha){
		$nfecha = date('H:i d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>