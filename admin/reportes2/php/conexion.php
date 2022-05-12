<?php
$conexion = mysql_connect('mysql6.000webhost.com', 'a8917909_vipi', 'webmaster123');
mysql_select_db('a8917909_nc', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>

