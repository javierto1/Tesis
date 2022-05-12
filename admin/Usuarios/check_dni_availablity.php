<?php
sleep(1);
include "../includes_admin/dbcon.php";
if($_REQUEST)
{
 $documento  = $_REQUEST['documento'];
 $query = "select * from datos_personales where documento = '".strtolower($documento)."'";
 $results = mysql_query( $query) or die('Error en conexion');
 
 if(mysql_num_rows(@$results) > 0) // not available
 { 
  echo '<div id="Error">Usuario ya existente, ingrese otro usuario</div>'.'
  <script> 
$("#documento").each(function() {
  $("input[type=number], textarea").val("");
});
  </script>';
 }
 else
 {
  echo '<div id="Success">Disponible</div>';
 }
 
}


?>