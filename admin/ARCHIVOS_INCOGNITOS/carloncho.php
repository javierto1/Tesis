<?php
include ("seguridad.php");
if($rol !=1){
header("location: nuevo_operador.php");
	session_destroy();
}
?>

carloncho pa!