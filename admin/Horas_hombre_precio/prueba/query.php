<?php
 
sleep(1);
$data = $_POST['value'];
$field = $_POST['field'];

$conexion= include('../dbcon.php');  
$update = "UPDATE `users3` SET `'".$field."'`='".$data."' WHERE id_trabajo=1";
$conexion->query($update);
echo $data;
?>