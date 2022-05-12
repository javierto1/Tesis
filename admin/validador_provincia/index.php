<?php
include('../includes_admin/dbcon.php');
// construimos el combo de paises desde la base de datos
$sql = mysql_query("SELECT * FROM provincia");
    while($sql_p = mysql_fetch_row($sql))
    {
     $combo_paises.= "<option value='".$sql_p[0]."'>".$sql_p[1]."</option>";
    } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<title>Combo Aninado</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
	<link type="text/css" href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />	
	<script type="text/javascript" charset="utf-8">
	  $(document).ready(function() {
	  // Parametros para el combo
	   $("#pais").change(function () {
	      $("#pais option:selected").each(function () {
	        elegido=$(this).val();
	        $.post("combo_ciudad.php", { elegido: elegido }, function(data){
	        $("#ciudad").html(data);
	      });     
	     });
	   });    
	});
</script>	
</head>
<body>
	<h1></h1>
	<hr>
<form class="form-horizontal" name="formulario" action="" method="post">
  <div class="control-group">
    <label class="control-label" for="pais">Provincia</label>
    <div class="controls">
        <select class="span3"  name="pais" id="pais" required>
          <option value="0">Seleccione...</option>
          	<?php  echo $combo_paises;?>
          </select>
   </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="ciudad">Ciudad</label>
    <div class="controls">
        <select class="span3"  name="ciudad" id="ciudad" required>
        </select>
   </div>
  </div> 
    
</form>
</body>
</html>