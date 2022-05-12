<?php

include ("../seguridad.php");
$id_cliente=$_SESSION['usuario'];
//if($rol !='2'){
//header("location: logout.php");
//	exit();
//}

	 $fichero = 'Manual_de_usuario_GesPeGraph.pdf';  
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fichero));
    readfile($fichero); 
?>
