<?php
	require '../connections/config.php';
	require '../controlador/funciones.php';

	if(isset($_GET["id"]) AND isset($_GET['val']))
	{
		$idUsuario = $_GET['id'];
		$token = $_GET['val'];
		$mensaje = validaIdToken($idUsuario, $token);	
	}
?>
<!DOCTYPE html>
<head>
		<?php include ("../vista/inc/headcommon.php");?>
		<title>Activacion de Cuenta</title>
		<link rel="stylesheet" href="../vista/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../vista/css/bootstrap-theme.min.css" >
		<script src="../vista/js/bootstrap.min.js" ></script>
</head>
<body>
<?php include('../vista/inc/headerlog.php'); ?>
<header><h6 style="color:white; float:left; padding: 7px;">Activacion de Cuenta</h6></header>  
<br><br><br> 
	<div class="container">
		<div class="row jumbotron">
			<div class="col">
				<center>
				<h1><?php echo $mensaje;?></h1>
				<hr class="my-4">
				<p><a class="btn btn-primary btn-lg" href="../index.php" role="button">Iniciar Sesi&oacute;n</a></p>
				</center>
			</div>
			
		</div>
	</div>
</body>
</html>														