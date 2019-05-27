<?php       session_start();
include "../connections/config.php";
if (isset($_SESSION['usuario']))
{
  require '../controlador/funciones.php';
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
    <?php include ("../vista/inc/headcommon.php");?>
    <title>SIGEF | Novedades</title>  
    <link rel="stylesheet" href="../vista/icon/style.css">
    <script src="../vista/js/crud_novedades.js"></script>
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
            <li class="active">Novedades en Ventas</li>
          </ol>
          <button type="button" class="col-5 col-sm-3 btn btn-success" id="registrar-novedad-compra"><span class="fa fa-plus"></span> Registrar Nov. en Venta </button>
          
          <button type="button" class="col-5 col-sm-2 btn btn-danger" data-toggle="modal" data-target="#buscar_producto"><span class="fa fa-print"></span> Imprimir </button>
          <button type="button"   class="col-2 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button> 
        </div>
        <div class="row">
          <?php include ('paginar_nove_ventas.php'); ?>          
        </div>                  
      </div>    
    </main>                                                    
    <!-- Modal -->
    <div class="modal fade" id="registrar-novedad-venta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i>Registrar Novedad en Venta</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post" id="guardar_vendedor" name="guardar_vendedor">
              <div id="resultados_ajax"></div>
              
              <div class="form-group">
                <label for="codigo_producto"  class="col-12 control-label">Nº  Factura</label>
                <div class="col-12">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="">
                </div>

              </div>
              
              <div class="form-group">
                <label for="Descripcion" class="col-12 control-label">Cod. producto</label>
                <div class="col-sm-5">

                  <input type="text"  class="form-control" id="descripcion" name="descripcion" required="">
                </div>
                <label for="Descripcion" class="col-sm-2 control-label">Cantidad</label>
                <div class="col-sm-2">
                  <input type="number" pattern="[0-9]{1,5}" maxlength="5" class="form-control" id="cantidad" name="cantidad" required="">
                  
                </div>
              </div>


              <div class="form-group">
                <label for="tipo_movimiento" class="col-12 control-label">Tipo de Novedad</label>
                <div class="col-12">
                  <select class="form-control" name="tipo_movimiento" >   
                    <option value="Averia">Avería</option>
                    <option value="Devolucion">Devolución</option>
                    <option value="Solicitud de Garantía">Solicitud de Garantía</option>
                    <option value="Salida de Garantía">Salida de Garantía</option>
                    <option value="Llegada de Garantía">Llegada de Garantía</option>
                    <option value="Entrega de Garantía">Entrega de Garantía</option>                                 
                  </select>                                        
                </div>
              </div>
              
              <div class="form-group">
                <label for="valor_movimiento" class="col-12 control-label">Descripcion</label>
                <div class="col-12">
                  <textarea type="text" pattern="[0-9]{1,10}" maxlength="10" class="form-control" id="valor_movimiento" name="valor_movimiento" required=""></textarea>
                </div>
              </div>                                   

              <div class="form-group">
                <label for="usuario" class="col-12 control-label">Usuario</label>
                <div class="col-12">
                  <input type="text" pattern="[a-zA-Z0-9]{1,15}" maxlength="15" class="form-control" value="<?php echo $_SESSION['usuario']; ?>" id="usuario" name="usuario" required="" readonly>
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
    <?php
  }else{ header("location: ../index.php");
}
include "../vista/inc/footer.php";
?>
<script>
  $(document).ready(function(){
    $('#nove_ventas').DataTable({
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