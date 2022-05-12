<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'noconven_xu2qs5');
define('DB_SERVER_PASSWORD', 'Javierto1');
define('DB_DATABASE', 'noconven_tienda');

$host="localhost";
$mysql_database = "noconven_tienda";
$user="noconven_xu2qs5";
$pass="Javierto1";

$conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysql_select_db(DB_DATABASE, $conexion);

?>