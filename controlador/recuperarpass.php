<?php
require '../connections/config.php';
include '../controlador/funciones.php';
	// si el usuario esta conectado muestra el sitio si no lo redirige al index para que se logee o se registre
session_start();

if(isset($_SESSION["usuario"])){
	header("location: stockdispo.php");	
}else
{

	$errors = array();
	
	if(!empty($_POST))
	{ 
		$email = $conexion->real_escape_string($_POST['email']);
		
		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}
		
		if(emailExiste($email))
		{			
			$user_id = getValor('usuario', 'email', $email);
			// $nombre = getValor('nombre', 'email', $email);
			
			$token = generaTokenPass($user_id);
			
			$url = 'http://'.$_SERVER["SERVER_NAME"].'/SIGEF/controlador/cambia_pass.php?user_id='.$user_id.'&token='.$token;
			
			$asunto = 'Recuperar Password - GEFFAM';
			$cuerpo = " 
			<html> 
			<head> 
			<title>Recuperar Password - GEFFAM</title> 
			<style type='text/css'>
			.btn-azul{
				background-color:#4B8BF4;
				color:white;
				border-color:#4B8BF4;
				width:170px;
				height:35px;
			}
			</style>
			</head> 
			<body>
			<center> 
			<h1>Hola!</h1> 
			<p> 
			<b>Se ha solicitado un reinicio de Contrase&ntilde;a.</b>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n:
			<br/><br/>
			<a href='$url'><button class='btn-azul'>Restaurar Contrase&ntilde;a</button></a> 
			</p> 
			<center>
			</body> 
			</html> 
			"; 
			
			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

			//dirección del remitente 
			$headers .= "From: GEFFAM <stmendozza@gmail.com>\r\n"; 

			//dirección de respuesta, si queremos que sea distinta que la del remitente 
			//$headers .= "Reply-To: <cristhiancm-1@hotmail.com>\r\n"; 

			//ruta del mensaje desde origen a destino 
			/*	$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

			//direcciones que recibián copia 
			$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

			//direcciones que recibirán copia oculta 
			$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 
			*/
			if(enviarEmail($email, $asunto, $cuerpo)){
			//if(mail($email, $asunto, $cuerpo, $headers)){
				echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu Contrase&ntilde;a.<br />";
				echo "<a href='index.php' >Iniciar Sesion</a>";
				exit;
			}else {
				$errors[] = "Error al enviar email";
			}
		} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}
	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<?php include ("../vista/inc/headcommon.php");?>
		<title>SIGEF| Recuperar Contraseña</title>	
	</head>
	<body> 
		<?php include('../vista/inc/headerlog.php'); ?>
		<header><h4 style="color:white; float:left; padding: 7px;">Recuperar Contraseña</h4></header>   
		<section>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
					</div>

					<div class="col-xs-12 col-sm-4">
						<br><br>
						
						<div style="margin-top:50px" class="col panel panel-default">
							<div class="panel-heading">
								
								<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../index.php">Iniciar Sesión</a></div>
							</div>     
							
							<div style="padding-top:30px" class="panel-body">
								
								<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
								
								<form id="loginform" class="form-horizontal AVAST_PAM_nonloginform" role="form" action="" method="POST" autocomplete="off">
									
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="email" type="email" class="form-control" name="email" placeholder="email" required="">                                        
									</div>
									
									<div style="margin-top:10px" class="form-group">
										<div class="col-sm-12 controls">
											<button id="btn-login" type="submit" class="col btn btn-success">Enviar
											</button></div>
										</div>
										
										<div class="form-group">
											<div class="col-md-12 control">
												<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
													No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
												</div>
											</div>
										</div>    
									</form>
									<?php echo resultBlock($errors); ?>
								</div>                     
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							
						</div>
					</div>
					
				</div>
				
			</section>
			<?php  	
		}
		?>
		<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<script src="../vista/js/bootstrap.min.js"></script>
	</body>
	</html>