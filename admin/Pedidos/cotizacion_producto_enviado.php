<?php 
    include "../includes_admin/dbcon.php";
	$conexion = mysql_connect($host, $user, $pass);
 
	$id_producto = $_POST['id_producto'];
	
	$id_cliente = '1';//AGREGAR EL ID DEL CLIENTE LOGUEADO EN ESE MOMENTO, SACARLO DEL SESSION
	$precio_vta = '10,50'; //TRAER EL PRECO DEL PRODUCTO ELEGIDO
	$estado = '1'; //SIEMPRE VA A EMPEZAR EN 1 YA QUE EL ESTADO UNO ES ESTADO:PEDIDO
	$fecha = date('Y-m-d');
 
	$id_especifica = $_POST['caracteristica'];
	$id_tipo = $_POST['tipo'];
	
	mysql_select_db($mysql_database, $conexion);  
 
	$qry1=mysql_query ("INSERT INTO pedido_cliente(id_producto,id_cliente,precio_vta,id_estado,fecha_pedido) VALUES ('{$id_producto}','{$id_cliente}','{$precio_vta}','{$estado}','{$fecha}')", $conexion);
	
	//echo "'fecha $fecha' -- 'id estado $estado' -- 'precio $ $precio_vta' -- 'id cliente $id_cliente' -- 'id producto $id_producto' --  'id color $tipo_color'  --  'id material $tipo_material'  --  'id cantidad $tipo_cantidad'  -- 'id terminacion $tipo_terminacion'";
	
	$id_pedido=mysql_insert_id();
	
	for ($i=0;$i<count($id_especifica);$i++) 
      	{ 
		mysql_select_db($mysql_database, $conexion); 
		$sql = mysql_query("INSERT INTO detalle_pedido(id_pedido,id_producto,id_especifica,id_tipo) VALUES ('{$id_pedido}','{$id_producto}','".$id_especifica[$i]."','".$id_tipo[$i]."')", $conexion);
       	echo "<br> Caracteristica " . $i . ": " . $id_especifica[$i]; 
		echo "<br> Tipo " . $i . ": " . $id_tipo[$i]; 
      	} 
		
	//$qry2=mysql_query ("INSERT INTO historico_pedido(id_pedido,fecha,id_estado) VALUES ('{$id_producto}','{$fecha}','{$precio_vta}','{$estado}')", $conexion);
	
    //header("Location: Proveedores/listado_proveedor.php");
?>
 
