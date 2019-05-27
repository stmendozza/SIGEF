 <?php 
    session_start();
    include "../connections/config.php";
    if (isset($_SESSION['usuario']))
    {    
    include "../controlador/funciones.php";   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include ("../vista/inc/headcommon.php");?>
    <title>SIGEF | Inventario</title>
    <script src="../vista/js/crud_clientes.js"></script>  
    <link rel="stylesheet" href="../vista/icon/style.css">
    <script src="../vista/js/bootstrap.min.js"></script>
</head>
<body>
       <?php include('../vista/inc/header.php'); ?>   
 
    <main>
        <?php include('../vista/inc/menu.php'); ?>  
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
                                <?php include ('paginar_inventario.php'); ?>         
                </div>
        <!-- MODAL PARA EL REGISTRO DE CATEGORIAS-->
    <div class="modal fade" id="mostar-kardex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">KARDEXbeta</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post" id="guardar_vendedor" name="guardar_vendedor">
            <div id="resultados_ajax"></div>
                <div class="form-group">
                    <label for="codigo_producto"  class="col-sm-1 control-label">Tipo:</label>
                <div class="col-sm-2">
                    <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" value="PEPS" disabled="">
                </div>
                    <label for="codigo_producto"  class="col-sm-7 control-label"></label>
                    <a href="" target="_black" > <button type="button" class="col-xs-1 btn btn-danger" ><span class="fa fa-print"></span></button></a>
                    <label for="codigo_producto"  class="col-sm-1 control-label"></label> 
                </div>

                <div class="form-group">
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Codigo Producto" disabled="">
                </div>
                <div class="col-sm-9">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Descripcion del Producto">
                </div>
                </div>

                <div class="form-group">
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Unidad de Medida">
                </div>
                <div class="col-sm-2">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Minima Cantidad">
                </div>
                <div class="col-sm-2">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Maxima Cantidad">
                </div>
                <div class="col-sm-1">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Cantidad">
                </div>
                <div class="col-sm-2">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Saldo Comprobacion">
                </div>
                <div class="col-sm-2">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Provedores">
                </div>

                </div>
                <div class="form-group">
                <div style="overflow: scroll; height: 500px;" class="col-xs-12 registros" id="agrega-registros">
                        <?php include ('../vista/inc/modal_kardex.php'); ?>    
                        </div>
                        <center><ul class="pagination" id="pagination"></ul></center> 
                </div>  
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </form>
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
  
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> -->
</body>
    <script>
        $(document).ready(function(){
        $('#inventario').DataTable({
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
</html>