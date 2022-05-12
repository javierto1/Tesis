<?php
											include "dbcon.php";
											$conexion = mysql_connect($host, $user, $pass);
											
											mysql_select_db($mysql_database, $conexion); 
											$sqlc= "SELECT * FROM ciudad WHERE provincia_id='6'";
											$sql=mysql_query($sqlc,$conexion); 
											while($row = mysql_fetch_array($sql)){ ;
											echo "+localidad c='0'-"+!CDATA.$row['ciudad_nombre']."+/localidad-"."<br>";
											
}?>
											