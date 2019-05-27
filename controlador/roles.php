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
	<title>SIGEF | Roles</title>
	<script src="../vista/js/crud_roles.js"></script>
	<link rel="stylesheet" href="../vista/icon/style.css">
	<script src="../vista/js/bootstrap.min.js"></script>
</head> 
<body> 
<?php include('../vista/inc/header.php'); ?>
<main>
	<?php include("../vista/inc/menu.php"); ?> 	
		<div class="container-fluid">
			<div class="row">
				<ol class="col breadcrumb">
		            <li><a href="../index.php" class="icon7"><i class="fa fa-home"></i> Inicio /</a></li>
		            <li>Roles</i>
		   		</ol>
				<button type="button" class="col-xs-6 col-sm-2 btn btn-success" id="nuevo-rol"><span class="fa fa-plus"></span> Nuevo Rol</button>
		    	<a href="../modelo/pdf/reporte_roles.php" target="_black"><button type="button" class="col-xs-4 col-sm-2 btn btn-danger" ><span class=" fa fa-print"></span> Imprimir </button></a>
				<button type="button"  class="col-xs-2 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button> 			
			</div>
  			<div class="row">
				<?php include ('paginar_roles.php'); ?>
			</div> 
</main>										
	<!-- MODAL PARA EL REGISTRO DE ROLES-->
				    <div class="modal fade" id="registra-rol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				        <div class="modal-dialog">
				          <div class="modal-content">
				            <div class="modal-header">
				              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i><b>Agregar o Editar Rol</b></h4>
							  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				            </div>
				            <form id="formulario" class="formulario" onsubmit="return agregaRegistroRol();">
				            <div class="modal-body">
								    <table border="0" width="100%">
				                     <tr>
				                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
				                    </tr>
				                     <tr>
				                        <td width="150"><label class="control-label">Proceso:</label></td>
				                        <td><input type="text"  class="form-control" required="required" readonly="readonly" id="pro" name="pro"/></td>
				                    </tr>
				                    <tr>
				                        <td><label class="control-label">Nombre:</label> </td>
				                        <td><input type="text" class="form-control" required="required" name="nombre" id="nombre"/></td>
				                    </tr>
				                    
				               		<tr>
				                        <td><label class="control-label">Responsabilidades:</label> </td>
				                        <td><textarea class="form-control" required="required" name="responsabilidades" id="responsabilidades"></textarea></td>
				                    </tr>

				                    <tr>
				                        <td colspan="2">
				                            <div id="mensaje"></div>
				                        </td>
				                    </tr>
				                </table>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
				                <input type="submit" value="Editar" class="btn btn-danger"  id="edi"/>				            
			            	</div>
				            </form>
				          </div>
				        </div>
				      </div>

		<?php
		 }else{
		 	header("location: ../index.php");
		 }	
		 	include "../vista/inc/footer.php";
 		?>

    <script>
    $(document).ready(function(){
    $('#roles').DataTable({
    "pageLength": 25,
    "order": [[1, "asc"]],
    "language":{
    "lengthMenu": "Mostrar _MENU_ registros por pagina",
    "info": "Mostrando pagina _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles",
    "infoFiltered": "(filtrada de _MAX_ registros)",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search": "Buscar:",
    "zeroRecords":    "No se encontraron registros coincidentes",
    "paginate": {
    "next":       "Siguiente",
    "previous":   "Anterior"
    },                  
    }
    }); 

    }); 
    </script> 
</body>
</html>