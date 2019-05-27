<?php 	    session_start();
include "../connections/config.php";
if (isset($_SESSION['usuario']))
{
	require '../controlador/funciones.php';
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
   <?php include ("../vista/inc/headcommon.php");?>
   <title>SIGEF | Promociones</title>	
   <link rel="stylesheet" href="../vista/icon/style.css">
   <script src="../vista/js/crud_promociones.js"></script>
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
        <li class="active">Gestion de Promos</li>
      </ol>
      <button type="button" class="col-5 col-sm-2 btn btn-success"  id="nueva-promo"><span class="fa fa-plus"></span> Nueva Promo</button>
      <a href="../modelo/pdf/reporte_promos.php" target="_black"><button type="button" class="col-5 col-sm-2 btn btn-danger" ><span class=" fa fa-print"></span> Imprimir </button></a>
      <button type="button"   class="col-2 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button>  
    </div>
    <div class="row">
      <?php include ('paginar_promociones.php'); ?>
    </div>
    <!-- MODAL PARA EL REGISTRO DE PROMOCIONES-->
    <div class="modal fade" id="registra-promo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i>Agrega o Edita Promociones</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form class="formulario" id="formulario" onsubmit="return agregaRegistroPromocion();">
              <div id="resultados_ajax"></div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" style="visibility:hidden; height:5px;"/>
                </div>
              </div>

              <div class="form-group"> 
                <label class="control-label col-12">Proceso:</label>
                <div class="col-12">
                  <input type="text"  class="form-control" required="required" readonly="readonly" id="pro" name="pro"/>
                </div>
              </div>
              
              <div class="form-group">
                <label for="descripcion_promo"  class="col-12 control-label">Descripcion Promocion</label>
                <div class="col-12">
                  <input type="text" class="form-control" id="descripcion_promo" name="descripcion_promo" required="">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" name="enviar">Guardar datos</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </main>
  <?php
}else{	header("location: ../index.php");
}
include "../vista/inc/footer.php";
?>

<script>
  $(document).ready(function(){
    $('#promos').DataTable({
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