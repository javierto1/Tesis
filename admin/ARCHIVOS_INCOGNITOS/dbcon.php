<?php
define('DB_SERVER', 'mysql6.000webhost.com');
define('DB_SERVER_USERNAME', 'a8917909_vipi');
define('DB_SERVER_PASSWORD', 'webmaster123');
define('DB_DATABASE', 'a8917909_nc');

$host="mysql6.000webhost.com";
$mysql_database = "a8917909_nc";
$user="a8917909_vipi";
$pass="webmaster123";

$conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysql_select_db(DB_DATABASE, $conexion);
?>