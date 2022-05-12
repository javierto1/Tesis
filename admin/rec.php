<!--Author: Anna Carolina Diaz Riera-->

<script src="sha256-min.js"></script>
<?php
$data_root = $_SERVER[DOCUMENT_ROOT];
$nombreusuario=$_POST['nombres']; 
$emailusuario=$_POST['email']; 
include "includes_admin/dbcon.php";//Llamada de la BD
$res = mysql_query("SELECT * FROM datos_personales WHERE nombre='$nombreusuario' AND mail='$emailusuario'");
$ids=mysql_fetch_row($res);
$id=$ids[0];
if (mysql_num_rows($res)==0) { 
 
 echo "<p class='alert alert-warning'>Error al enviar. El nombre de usuario o el E-mail, no corresponden a un usuario!</p>";
} 
else { 
	
 /*
$res=mysql_query("SELECT * FROM datos_personales WHERE nombre='$nombreusuario' AND mail='$emailusuario'");
$row=mysql_fetch_assoc($res); 

echo $claveusuario=$row['password']; */
function generar_clave($longitud){ 
       $cadena="[^A-Z0-9]"; 
       return substr(eregi_replace($cadena, "", md5(rand())) . 
       eregi_replace($cadena, "", md5(rand())) . 
       eregi_replace($cadena, "", md5(rand())), 
       0, $longitud); 
} 
//Ejemplo de utilización para una clave de 10 caracteres: 
$psw=generar_clave(10);
$psw2=hash('sha256',$psw);
$id;
$res = mysql_query("UPDATE datos_personales SET password='$psw2' where id='$id'");

//echo 'Clave aleatoria: '.$psw.''; 
foreach ($_POST as $campo=>$str){
$valor_campo = strip_tags("$str");
$valor_campo = trim("$valor_campo");
$$campo =  $valor_campo ;
//echo "$campo<br>";
if ($valor_campo == ""){
$mensaje_error .= "El campo <b>$campo</b> es de uso obligatorio<br />";
$error = 1;
}
}

if (!empty($emailusuario)){
## advertir que 2,4 --> para aceptar nuevos dominios (.info, etc)
$control_mail="^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,4}$";
if(!eregi($control_mail,$emailusuario)){
$mensaje_error .= "La <b>sintáxis de tu email</b> no es válida<br />\n";
$error = 1;
}
}

if ($error == 1){
$salida_errores= <<< HTML
Se han producido los siguientes errores:<br /><br />
$mensaje_error
<br />

HTML;
echo $salida_errores;
exit;
}else{
	/*
$texto = strip_tags("$comentario");	
// enviamos el email de recuperacion 
$header = &#39;From: xxxxx@nombredominio.com&#39; ."\r\n";
$header .= &#39;Reply-to: noresponder@cross-home.com&#39; ."\r\n";
$header .= "X-Mailer:PHP" .phpversion ()."\r\n";
$header .= "Mime-Version:1.0 \r\n";
$header .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

$asunto = "Recuperación de la Clave" ;
$contenido = "
Estimado(a) cliente $nombreusuario, su clave es: $psw

Motivo de la recomendación
$texto

**********************************************************************

Porfavor no respondas este mensaje, si no conoces el origen.
La administración de www.noconvencional.com.ar
";*/
$headers .= "From: No convencional <noresponder@noconvencional.com>\r\n"; 
$header .= "X-Mailer:PHP" .phpversion ()."\r\n";
$header .= "Mime-Version:1.0 \r\n";
$header .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$asunto = "Recuperación de la Clave" ;
$texto = strip_tags("$comentario");	
$contenido = "
Estimado(a) cliente $nombreusuario, su clave es: $psw

Motivo de la recomendación
$texto

**********************************************************************

Porfavor no respondas este mensaje, si no conoces el origen.
La administración de www.noconvencional.com.ar
";
$mail = mail($email,$asunto,$contenido,$header);
if($email){ 
echo "<p class='alert alert-info'>Gracias. $nombres., enviamos un mail con los datos para poder recuperar su cuenta!</p>";
}
else
{
echo "Error al envia. Podría haber problemas con el servidor, intente más tarde por favor";
 } 
  
 } 
}
?> 

<script type="text/javascript">
              //location.href="http://javiervigliocco.net84.net"; 
</script>