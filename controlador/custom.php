<?php
session_start();
include "../connections/config.php";
if (isset($_SESSION['usuario']))
{
	$id=$_SESSION['usuario'];
	$sql = "select * from tb_usuarios where usuario = '$id'";
	$resultado = $conexion->query( $sql );
	$row = mysqli_fetch_row($resultado);
	?>
	<!DOCTYPE html>  
	<html lang="es">
	<head>
		<?php include ("../vista/inc/headcommon.php");?>
		<title>SIGEF | Custom</title>
		<link rel="stylesheet" href="../vista/icon/style.css">
		<script src="../vista/js/crud_novedades.js"></script>
		<script src="../vista/js/bootstrap.min.js"></script>
		<link href="../vista/dist/css/sb-admin-2.css" rel="stylesheet">
	</head>
	<body>
		<?php include('../vista/inc/header.php'); ?>    
		<main>
			<?php include("../vista/inc/menu.php"); ?> 	
			<div class="container-fluid">
				<div class="row">
					<ol class="col breadcrumb">
						<li><a href="../index.php" class="icon7"><i class="fa fa-home"></i> Inicio /</a></li>
						<li>Custom</li>
					</ol>					
				</div>
				<div class="row">
					<a href="pdf/ayudareportes.pdf" target="_black" title="Ayuda"> <button type="button" style="float: right;"  class="col-xs-12 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button></a>	
				</div>
				<div class="row">

					<div class="col-xs-12 col-sm-2 ">
						<label>Modo Oscuro</label>
					</div>
					<!-- Material switch -->
					<div class="col-xs-12 col-sm-1 ">
						<div class="onoffswitch">
							<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
							<label class="onoffswitch-label" for="myonoffswitch">
								<span class="onoffswitch-inner"></span>
								<span class="onoffswitch-switch"></span>
							</label>
						</div>
					</div>


					<div class="col-xs-12 col-sm-4 ">


					</div>

					<div class="col-xs-12 col-sm-4 ">

						

					</div>
				</div>
			</div>								
		</main>

		<?php

	}else{

		header("location: ../index.php");

	}

	include "../vista/inc/footer.php";

	?>

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="../vista/js/bootstrap.min.js"></script>
</body>

</html>





