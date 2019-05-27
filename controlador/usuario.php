<?php

session_start();
include "../connections/config.php";
if (isset($_SESSION['usuario']))
{
	$usuario=$_SESSION['usuario'];
	$sql = "select * from tb_usuarios where usuario = '$usuario'";
	$resultado = $conexion->query( $sql );
	$row = mysqli_fetch_row($resultado);
	?>
	<!DOCTYPE html>  
	<html lang="es">
	<head>
		<?php include ("../vista/inc/headcommon.php");?>
		<title>SIGEF | Usuario</title>
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
						<li><a href="../index.php" class="icon7"><i class="fal fa-home"></i> Inicio /</a></li>
						<li><i class="far fa-check-circle icon10"></i><b> <?php echo $_SESSION['usuario']; ?></b></li>
					</ol>				
				</div>
				<div style="float: right;" class="row">
					<button type="button"  class="col-xs-12 col-sm-1 btn btn-link"  ><span class="fal fa-question"></span></button>
					
				</div>
				<div class="row panel-body">

					<div class="col-6 ">

						<form class="form-horizontal" role="form" action="actualizar.php" method="POST" autocomplete="off">

							<div id="signupalert" style="display:none" class="alert alert-danger">

								<p>Error:</p>

								<span></span>

							</div>

							<div class="form-group">
								<br>
								<label class="col-12">Actualizar Datos</label>

								<br>

								<div class="col-12">

									<input type="text" class="form-control" maxlength="15" name="usuario" placeholder="Usuario" value="<?php  echo $row[1];?>" required="">

								</div>

							</div>


							<div class="form-group">

								<label class="col-3">Nombre</label>

								<div class="col-12">

									<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php  echo $row[2];?>" required="">

								</div>

							</div>

							

							<div class="form-group">

								<label class="col-3">Telefono</label>

								<div class="col-12">

									<input type="text" class="form-control" maxlength="10" name="celular" placeholder="Celular" value="<?php  echo $row[3];?>" required="">

								</div>

							</div>

							<div class="form-group">

								<label class="col-3">Direccion</label>

								<div class="col-12">

									<input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php  echo $row[4];?>" required="">

								</div>

							</div>

							

							<div class="form-group">

								<label class="col-12 ">Correo Electronico</label>

								<div class="col-12">

									<input type="email" class="form-control" name="correo" placeholder="Email" value="<?php  echo $row[5];?>" required="">

								</div>

							</div>



							<div class="form-group">                                      
								<button id="btn-signup" type="submit" class="col-12 btn btn-primary"><span class="fal fa-sync-alt "></span> Actualizar Perfil</button> 
							</div>

						</form>		
					</div>	


					<!-- <div class=" container"> -->

						<!-- <div class="row"> -->

							<div class="col-6 ">
								<br>
								<label class="col-3">Seguridad</label>
								<br>
								<button type="button" class="col-12 btn btn-danger" data-toggle="modal" data-target="#myModal2"><span class="fal fa-lock"></span> Cambiar contraseña </button>

							</div>



							<!-- </div> -->


							<!-- </div>	 -->

						</div>

					</div>								



					<!-- ModalUser -->

					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

						<div class="modal-dialog" role="document">

							<div class="modal-content">

								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel"><i class="fal fa-edit"></i> Actualizar Contraseña</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								</div>

								<div class="modal-body">

									<form class="form-horizontal" method="post" action="actualizarpass.php" >

										<div class="form-group">

											<div class="col-sm-12">

												<input type="password" class="form-control" id="documento" placeholder="Contraseña Actual" name="actualpass">

											</div>

										</div>

										

										<div class="form-group">

											<div class="col-sm-12">

												<input type="password" class="form-control" id="nombre" placeholder="Nueva Contraseña " name="nuevapass" required="">

											</div>

										</div>

										

										<div class="form-group">

											<div class="col-sm-12">

												<input type="password" class="form-control" id="celular" placeholder="Confirma Nueva Contraseña" name="confirmapass">

											</div>

										</div>	

									</div>

									<div class="modal-footer">

										<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

										<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar Contraseña</button>



									</div>

								</form> 

							</div>

						</div>

					</div>

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
// <script type="text/javascript">

	// 	$(document).ready(function(){
		
	// 		$('#actualizar_datos').click(function(){
	// 			alertify.confirm('Eliminar datos', '¿Seguro que deseas eliminar?', function(){ alertify.success('Ok') }
 //    //             , function(){ alertify.error('Cancel')});
	// 			//alertify.alert("te hace falta llenar mas campos, por favor");
	// 			//alertify.error("fallo el servidor :(");
	// 			//alertify.success("este es un mensaje de exito ");
	// 		});
	// 	})
// </script>
</body>

</html>