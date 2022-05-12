<?php
include('../includes_admin/dbcon.php');
$salida="";
$provincia_id=$_POST["elegido"];
// construimos el combo de ciudades de acuerdo a la provincia seleccionada
$combog = mysql_query("SELECT * FROM ciudad WHERE provincia_id=$provincia_id ORDER BY  `ciudad`.`ciudad_nombre` ASC ");
  while($sql_p = mysql_fetch_row($combog))
  {
   $salida.= "<option value='".$sql_p[0]."'>".$sql_p[2]."</option>";
  }  
echo $salida;
?>