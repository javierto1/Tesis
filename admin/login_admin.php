<?php
include_once "includes_admin/dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  
<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : 'your_site_key'
        });
      };
    </script>

<style type="text/css">
    body {    
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
   background-size: cover;

}
</style>

<script src='sha1.js'></script>
<script src='sha256-min.js'></script>
<script src='log.js'></script>


<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body background="PROXIMAMENTE - NC WEB-01.jpg" style='background-repeat:no-repeat;' >

    <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingrese sus datos Administrador</h3>
                        <div id="mensaje"></div> 
                    </div>
                    <div class="panel-body">
                          
                        <form  name="formulario" id="formulario" method="post" action="control.php" onsubmit="enviar()">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario Administrador" name="username" type="email" id="username"  value="" autofocus required="required">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="password" required="required" value="">
                                </div>
                               
                                 <div class="g-recaptcha" data-sitekey="6Ld-TyETAAAAAJjZRLkQGon_Mw1JFMo3Y-iy65sb"></div>
      <br>
                                <!-- Change this to a button or input when using this as a form -->
                               <input type="submit" id="Ingresar" name="Ingresar" value="Ingresar" class="btn btn-lg btn-success btn-block">
                                                                                         
							   
                            </fieldset>
							<br>
							<div align="center"><a href="rec.html" type="button"><small>Restaurar contraseña?</small></a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer> </script>

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
<script type="text/javascript">

</script>


    

</body>

</html>
