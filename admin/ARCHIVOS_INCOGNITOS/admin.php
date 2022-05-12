<?php
include ("seguridad.php");
if($rol !='0'){
header("location: nuevo_operador.php");
	session_destroy();
}

?>

admin