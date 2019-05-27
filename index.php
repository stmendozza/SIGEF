<?php 	   

/*en caso de que el usuario se devuelva del chat al registro tendra que dirijirse  al inicio para ingresar al chat si no desea crear otro usuario*/	
	// require_once 'librerias/app.php';
	// $app = new App();
session_start();

include "connections/config.php";

require 'controlador/funciones.php';

	// si el usuario esta conectado muestra el sitio de chat si no lo redirige al index para que se logee o se registre

if (isset($_SESSION['usuario']))	

{ 

	header("location: controlador/facturar.php");	

}	else

{	

	$errors = array();

	

	if(!empty($_POST))

	{	

		$usuario = $conexion->real_escape_string($_POST['usuario']);	

		//echo $usuario;	

		$password = $conexion->real_escape_string($_POST['contrasena']);	

		//echo $password;	

		if(isNullLogin($usuario, $password))

		{

			$errors[] = " Debe llenar todos los campos";

		}

		$errors[] = Login($usuario, $password);

	}

	?>	

	<!DOCTYPE html>

	<html lang="es">

	<head>
		<?php include ("vista/inc/headcommon_index.php");?>
		<title>Ingreso</title> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="shortcut icon" type="image/x-icon" href="vista/images/heart.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>

			.carousel-inner > .item > img,

			.carousel-inner > .item > a > img {

				width: 100%;

				margin: auto;

			}

		</style>
	</head>

	<body> 
		<?php include('vista/inc/headerlog.php'); ?>
		<header><h4 style="color:white; float:left; font-size: 13px; padding-left:7px;">Inicio de Sesion</h4></header>   
		<section>

			<div class="container">
				<div class="row">

					<div class="col-1 col-sm-2 col-sd-4 col-lg-4  "></div>



					<div class="col col-sm-8 col-sd-4 col-lg-4  ">

						<div class="col col-sm-12">

							<br><br>

						</div>



						<br><br>
						<div class="panel-heading">

							<div class="panel-title"></div><br>

							<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="controlador/recuperarpass.php">¿Se te olvid&oacute; tu contraseña?</a></div>

						</div> <br>

						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">



							<div style="margin-bottom: 25px" class="input-group">

								<span class="input-group-addon"><i class="fal fa-user"></i></span>

								<input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="usuario o email= stmendozza" required>                                  

							</div>



							<div style="margin-bottom: 25px" class="input-group">

								<span class="input-group-addon"><i class="fal fa-lock"></i></span>

								<input id="password" type="password" class="form-control" name="contrasena" placeholder="contraseña= rojo" required>

							</div>



							<div style="margin-top:10px" class="form-group">

								<div class="col-sm-12 controls">

									<button id="btn-login" type="submit" class="col-12 btn btn-success">Iniciar Sesi&oacute;n</a>

									</div>

								</div>

								

								<div class="form-group">

									<div class="col-md-12 control">

										<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >

											No tiene una cuenta! <a href="controlador/registro.php">Registrate aquí</a>

										</div>

									</div>

								</div>    

							</form>

							<?php echo resultblock($errors); ?>	
							<center>		
							        </center>
							    </div>	

							    <div class="col-1 col-sm-2 col-sd-4 col-lg-4  ">


							    </div>

							</div>

						</div>	

					</section>

				<?php 	} ?>

			</body>

			</html>

