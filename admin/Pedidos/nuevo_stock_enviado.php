<?php 
       
 include "../includes_admin/dbcon.php";
 $conexion = mysql_connect($host, $user, $pass);
 
 $material = $_POST['material'];
 $tamanoCM2 = $_POST['tamanoCM2'];
 $precio_compracm2 = $_POST['precio_compracm2'];
 $precio_ventacm2 = $_POST['precio_ventacm2'];
 $cantidad = $_POST['cantidad'];
 $fecha_compra= date ("h:i");
 $operador= $_POST['operador'];
 $total=$tamanoCM2 * $cantidad;

 mysql_select_db($mysql_database, $conexion);  
    $q1=mysql_query ("INSERT INTO stock(material,tamanoCM2,precio_compracm2,precio_ventacm2,cantidad,cantidad_hoy,fecha_compra,id_operador,total) VALUES ('{$material}','{$tamanoCM2}','{$precio_compracm2}','{$precio_ventacm2}','{$cantidad}','{$cantidad}','{$fecha_compra}','{$operador}','{$total}')", $conexion);
 //$id_datos=mysql_insert_id();
// $qry2=mysql_query ("INSERT INTO cliente(id_datos,dni,estado) VALUE ('{$id_datos}','{$dni}','{$estado}')", $conexion);
header("Location: control_stock.php");
 
//echo $total;
 
 
?>