<?php
session_start();
include	"../connections/config.php";
if	(isset($_SESSION['usuario']))	{
				include	"../controlador/funciones.php";
				?>
				<!DOCTYPE html>
				<html lang="es">
								<head>
												<?php	include	("../vista/inc/headcommon.php");	?>
												<title>SIGEF | Inventario</title>
												<script src="../vista/js/crud_clientes.js"></script>  
												<link rel="stylesheet" href="../vista/icon/style.css">
												<script src="../vista/js/bootstrap.min.js"></script>
								</head>
								<body>
												<?php	include('../vista/inc/header.php');	?>   

												<main>
																<?php	include('../vista/inc/menu.php');	?>  
																<div  class=" container-fluid">
																				<div class="row">
																								<ol class="col breadcrumb">
																												<li><a href="../index.php" class="icon7"><i class="fa fa-home"></i> Inicio /</a></li>
																												<li class="active">  Inventario General</li>
																								</ol>
																								<a href="../modelo/pdf/reporte_inventario.php" target="_black"><button type="button" class="col-2 btn btn-danger" ><span class="fal fa-print"></span> Imprimir</button> </a> 
																								<button type="button"   class=" col-1 btn btn-link" ><span class="fal fa-question"></span></button>
																				</div>
																				<div class="row">
																								<?php	include	('paginar_inventario.php');	?>         
																				</div>
																				<!-- MODAL PARA VER KARDEX-->
																				<div class="modal fade" id="mostar-kardex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																								<div class="modal-dialog modal-lg" role="document">
																												<div class="modal-content">
																																<div class="modal-header">
																																				<h4 class="modal-title" id="myModalLabel"><span class="fa fa-eye"></span> KARDEXbeta</h4>
																																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																																</div>
																																<div class="modal-body">
																																				<div class="container">                 
																																								<form>

																																												<div class="row">
																																																<label for="Tipo" class="col-1 control-label">Tipo</label>
																																																<input class="form-control col-2 radius" type="text" name="tipo" id="tipo" value="" readonly placeholder="PEPS">
																																																<div class="col"> 
																																																				<a href="" target="_black"  ><button type="button" style="float:right;" class="col-2 btn btn-danger" ><span class="fal fa-print"></span></button></a>  
																																																</div>
																																												</div>
																																												<div class="row">
																																																<input class="col-3 form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Codigo Producto" disabled=""></td>
																																																<input class="col form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Descripcion del Producto"></td>
																																												</div>
																																												<div class="row">
																																																<input type="text" class="col form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Unidad de Medida">

																																																<input type="text" class="col form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Minima Cantidad">

																																																<input type="text" class="col form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Maxima Cantidad">

																																																<input type="text" class="col form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Cantidad">

																																																<input type="text" class="col form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Saldo Comprobacion">

																																																<input type="text" class="col form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Provedores">



																																												</div>

																																								</form>
																																				</div>


																																				<div class="form-group">
																																								<div class="col-sm-3">

																																								</div>
																																								<div class="col-sm-9">

																																								</div>
																																				</div>


																																				<div class="form-group">
																																								<div style="overflow: scroll; height: 500px;" class="col-xs-12 registros" id="agrega-registros">
																																												<?php	include	('../vista/inc/modal_kardex.php');	?>    
																																								</div>
																																								<center><ul class="pagination" id="pagination"></ul></center> 
																																				</div>  
																																				<div class="modal-footer">
																																								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

																																				</div>

																																</div>
																												</div>
																								</div>       
																								</main>
																								<?php
																				}	else	{
																								header("location: ../index.php");
																				}
																				include	"../vista/inc/footer.php";
																				?>
																				</body>
																				<script>
																								$(document).ready(function () {
																												$('#inventario').DataTable({
																																"pageLength": 25,
																																"order": [[1, "asc"]],
																																"language": {
																																				"lengthMenu": "Mostrar _MENU_ registros por pagina",
																																				"info": "Mostrando pagina _PAGE_ de _PAGES_",
																																				"infoEmpty": "No hay registros disponibles",
																																				"infoFiltered": "(filtrada de _MAX_ registros)",
																																				"loadingRecords": "Cargando...",
																																				"processing": "Procesando...",
																																				"search": "Buscar:",
																																				"zeroRecords": "No se encontraron registros coincidentes",
																																				"paginate": {
																																								"next": "Siguiente",
																																								"previous": "Anterior"
																																				},
																																}
																												});

																								});
																				</script>
																				</html>