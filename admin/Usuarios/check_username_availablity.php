<?php
sleep(1);
include "../includes_admin/dbcon.php";
if($_REQUEST)
{
 $username  = $_REQUEST['username'];
 $query = "select * from datos_personales where username = '".strtolower($username)."'";
 $results = mysql_query( $query) or die('Error en conexion');
 
 if(mysql_num_rows(@$results) > 0) // not available
 { 
  echo '<div id="Error">Usuario ya existente, ingrese otro usuario</div>'.'
  <script> 
$("#username").each(function() {
  $("input[type=email], textarea").val("");
});
  </script>';
 }
 else
 {
  echo '<div id="Success">Disponible</div>';
 }
 
}


?>