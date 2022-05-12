<?php
// define('DB_SERVER', 'mysql6.000webhost.com');
// define('DB_SERVER_USERNAME', 'a8917909_vipi');
// define('DB_SERVER_PASSWORD', 'webmaster123');
// define('DB_DATABASE', 'a8917909_nc');

// $conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
// mysql_select_db(DB_DATABASE, $conexion);

$host="mysql6.000webhost.com";
$mysql_database = "a8917909_nc";
$user="a8917909_vipi";
$pass="webmaster123";

//$db="username_availablity";
$conexion=@mysql_connect ($host, $user, $pass);

mysql_select_db($db, $conexion);

if ($conexion!="") { 
//echo "Sesion iniciada";
} else { echo "Ingreso denegado, consultar al administrador";}

?>