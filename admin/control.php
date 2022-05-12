<?php 
	include_once "includes_admin/dbcon.php";
	$ipvisitante=$_SERVER["REMOTE_ADDR"];
	$usuario = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);	
	$fecha=date("Y-m-d H:i:s");
	$agente = $_SERVER['HTTP_USER_AGENT'];
	$navegador = 'Unknown';
	$platforma = 'Unknown';
	$version= "";

	//Obtenemos la Plataforma
	if (preg_match('/linux/i', $agente)) {
	$platforma = 'linux';
	}
	elseif (preg_match('/macintosh|mac os x/i', $agente)) {
	$platforma = 'mac';
	}
	elseif (preg_match('/windows|win32/i', $agente)) {
	$platforma = 'windows';
	}
	//Obtener el UserAgente
						if(preg_match('/MSIE/i',$agente) && !preg_match('/Opera/i',$agente))
						{
						$navegador = 'Internet Explorer';
						$navegador_corto = "MSIE";
						}
						elseif(preg_match('/Firefox/i',$agente))
						{
						$navegador = 'Mozilla Firefox';
						$navegador_corto = "Firefox";
						}
						elseif(preg_match('/Chrome/i',$agente))
						{
						$navegador = 'Google Chrome';
						$navegador_corto = "Chrome";
						}
						elseif(preg_match('/Safari/i',$agente))
						{
						$navegador = 'Apple Safari';
						$navegador_corto = "Safari";
						}
						elseif(preg_match('/Opera/i',$agente))
						{
						$navegador = 'Opera';
						$navegador_corto = "Opera";
						}
						elseif(preg_match('/Netscape/i',$agente))
						{
						$navegador = 'Netscape';
						$navegador_corto = "Netscape";
						}
	
	
	if(isset($_POST["g-recaptcha-response"]) && $_POST["g-recaptcha-response"])
	{
		$secret="6Ld-TyETAAAAADpcOUjYuoY7-rAH4bmOztR9l0kz";
		$ip=$_SERVER["REMOTE_ADDR"];
		$captcha= $_POST["g-recaptcha-response"];
		$result= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
		$array = json_decode($result,TRUE);		
		
		if($array["success"])
		{						
			session_start();
								//genero un registro y lo guardo en el historico login
																								
								$sql = "SELECT * FROM datos_personales WHERE username ='$usuario' and password ='$password'";
								$resultado = mysql_query($sql);
								$valor = mysql_num_rows($resultado);
								//echo $resultado;
								//echo $valor;
								if(1 == $valor){
									$x1=mysql_query ("INSERT INTO login(username,password,fecha,ingreso,ip,navegador) VALUES ('{$usuario}','{$password}','{$fecha}','TRUE','{$ipvisitante}','{$navegador}')", $conexion);
									$linea = mysql_fetch_array($resultado);
									//echo $linea;
									$nombre = $linea[2];
									//echo $nombre;
									$rol = $linea[16];
									//echo $rol;
									$user = $linea[0];
									$user_mail = $linea[1];
									$_SESSION["rol"] = $rol;
									$_SESSION['usuario'] = $user;
									$_SESSION['um']=$user_mail;
									$_SESSION['nombre']=$nombre;
																	
										switch ($rol) {
										case '0':
											?>
										<script type='text/javascript'>
              location.href="index.php"; </script>
              <?php
											break;
										case '1':
											?>
										<script type='text/javascript'>
              location.href="index.php"; </script>
              <?php;
											break;
										case '2':
										?>
										<script type='text/javascript'>
              location.href="../cliente/index.php"; </script>
              <?php
											
											break;
										case '3':?>
										<script type='text/javascript'>
              location.href="../cliente/index.php"; </script>
              <?php
										 	//header('location: http://javiervigliocco.net84.net/cliente/index.php');
											break;
												}
								}else{
									echo "usuario o Contraseña Incorrecta!";
									//header("location: login_admin.html");
									$x1=mysql_query ("INSERT INTO login(username,password,fecha,ingreso,ip,navegador) VALUES ('{$usuario}','{$password}','{$fecha}','false','{$ipvisitante}','{$navegador}')", $conexion);
								}
								
							
								

								
		}else{
			echo "spam";
			//header("location: login_admin.html");
			$x1=mysql_query ("INSERT INTO login(username,password,fecha,ingreso,ip,navegador) VALUES ('{$usuario}','{$password}','{$fecha}','false','{$ipvisitante}','{$navegador}')", $conexion);
		}		
	}else{
		echo "Debe resolver la captcha de validacion!";
		//header("location: login_admin.html");
		$x1=mysql_query ("INSERT INTO login(username,password,fecha,ingreso,ip,navegador) VALUES ('{$usuario}','{$password}','{$fecha}','false','{$ipvisitante}','{$navegador}')", $conexion);
	}
		

	?>