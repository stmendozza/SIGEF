<?php

/*manejando sesiones siempre va de primero el session para no mostrar el sitio si no hay un usuario conectado*/ 

session_start();

include "../connections/config.php";

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

if (isset($_SESSION['usuario']))

{	

	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<?php include ("../vista/inc/headcommon.php");?>
		<title>SIGEF | Reportes</title>
		<link rel="stylesheet" href="../vista/icon/style.css">
		<script src="../vista/js/menuds.js"></script>
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
						<li class="active">Reportes</li>
					</ol>					
				</div>
				<div style="float: right;" class="row">
					<button type="button"  class="col-xs-12 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button>
				</div>
				<div class="row"></div>
				<div class=" col-xs-12 panel-body">

					<div style="margin-top: 40px;" class="col-12">


						<div class="row">

							<!-- <div class="col-xs-12 col-sm-2 well"></div> -->

							<div class="col-xs-12 col-sm-4 ">



								<center><a href=""><button type="button" style="width: 100%" class="btn btn-default col-sm-12 btn-lg">

									<span class="iconreportes lnr lnr-tag icon2" aria-hidden="true"></span><br><br> NOVEDADES	

								</button></a></center>

							</div>

							<div class="iconreportes col-xs-12 col-sm-4 ">

								<center><a href=""><button type="button"  style="width: 100%" class="btn btn-default col-sm-12  btn-lg">

									<span class="iconreportes lnr lnr-tag icon3" aria-hidden="true"></span><br><br>MOVIMIENTOS
								</button></a></center>

							</div>

							<div class="col-xs-12 col-sm-4 ">

								<center><a href=""><button type="button"  style="width: 100%" class="btn btn-default col-sm-12  btn-lg">

									<span class="iconreportes lnr lnr-tag icon7" aria-hidden="true"></span><br><br> VENTAS

								</button></a></center>

								

							</div>

						</div>  				


					</div>
					<div class="  col-12 ">

						

						<div class="row">

							<!-- <div class="col-xs-12 col-sm-2 well"></div> -->

							<div class="col-xs-12 col-sm-4 ">



								<center><a href=""><button type="button"  style="width: 100%; margin-top: 40px;" class="btn btn-default col-sm-12 btn-lg">

									<span class="iconreportes lnr lnr-tag	 icon3" aria-hidden="true"></span><br><br> COMPRAS

								</button></a></center>

							</div>

							<div class="iconreportes col-xs-12 col-sm-4 ">


							</div>

							<div class="col-xs-12 col-sm-4 ">
								

							</div>

						</div>  				

					</div>

					<br>

				</div>
				

				
			</div>				

			

		</main>

		<?php

	}else{

		

		header("location: ../index.php");

	}

	include "../vista/inc/footer.php";

	?>
</body>

</html>		