<?php 	    
    session_start();
    include "../connections/config.php";
    if (isset($_SESSION['usuario']))
    {
	require '../connections/config.php';
	require '../controlador/funciones.php';	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include ("../vista/inc/headcommon.php");?>
	<title>SIGEF | Ganancias</title>	
	  <link rel="stylesheet" href="../vista/icon/style.css">
    <script src="../vista/js/myjava.js"></script>
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
	                    <li class="active">Ganancias</li>
	                </ol>					
				</div>
				<div class="row">
					<div class="col container-fluid">
						<input class="col-xs-12 col-sm-12 form-control" type="date" name="ingresa_fecha">
	                	<button type="button" class="col-12 btn btn-success" id="nuevo-producto"><span class="fa fa-check-circle"></span> Verificar Ganancia</button>
					</div>
	                
				   	<div class="col-6 col-sm-8 label-success">
	                    <center><label>Ganancia del 18 de Noviembre del 2018 fue de: 300'000'000. Felicitaciones usted se esta tapando en plata</label> </center>
	                </div>   

				</div>
				
				
			</div>
			<div class="panel-body">

			</div>						
	</main>										
	<?php
			 }else{	header("location: ../index.php");
	}
				include "../vista/inc/footer.php";
	?>
	    <script src="../vista/js/myjava.js"></script>
</body>
</html>