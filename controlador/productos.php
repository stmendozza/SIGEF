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
       <title>SIGEF | Productos</title>	
       <link rel="stylesheet" href="../vista/icon/style.css">
       <script src="../vista/js/crud_productos.js"></script>  
       <script src="../vista/js/bootstrap.min.js"></script>
       <script src="../vista/js/cambiarpestanna.js"></script> 
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
                <li class="active">Gestion de Productos</li>
            </ol>  
            <button type="button" class="col-5 col-sm-2 btn btn-success" data-toggle="modal"  id="nuevo-producto"><span class="fa fa-plus"></span> Nuevo</button>
            <a href="../modelo/pdf/reporte_productos.php" target="_black"><button type="button" class="col-5 col-sm-2 btn btn-danger" ><span class=" fa fa-print"></span> Imprimir </button></a>
            <button type="button"   class="col-2 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button>

        </div>
        <div class="row">
          <div style="padding-top: 15px;" class="panel-body col" >
           <?php include ('paginar_productos.php'); ?>    
       </div> 
   </div>
</div>						
</main>										
<!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
<div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i>Agregar o Editar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <form id="formulario" class="formulario" onsubmit="return agregaRegistroProducto();">
        <div class="modal-body">
            <table border="0" width="100%">
               
               <tr>
                <td width="150"><label class="control-label">Proceso: </label></td>
                <td><input type="text"  class="form-control" required="required" readonly="readonly" id="pro" name="pro"/></td>
            </tr>
            <tr>
                <td><label class="control-label">Codigo:</label> </td>
                <td><input type="text" class="form-control" required="required" name="codigo_producto" id="codigo_producto" maxlength="100"/></td>
            </tr>
            <tr>
                <td><label class="control-label">Descripcion:</label> </td>
                <td><input type="text" class="form-control" required="required" name="descripcion" id="descripcion"/></td>
            </tr>
            <tr>
                <td><label class="control-label">Precio Costo: </label></td>
                <td><input type="text" class="form-control" required="required" name="precio_costo" id="precio_costo"/></td>
            </tr>
            <tr>
                <td><label class="control-label">Categoria: </label></td>
                <td><input type="text" class="form-control" required="required" name="categoria" id="categoria"/></td>
            </tr>
            <tr>
                <td><label class="control-label">Tipo: </label></td>
                <td><input type="text" class="form-control" required="required" name="tipo" id="tipo"/></td>
            </tr>
<!--                     <tr>
                        <td><label class="control-label">Fecha Registro:</label></td>
                        <td><input type="date" class="form-control" required="required" name="fecha_registro" id="fecha_registro"/></td>
                    </tr>
                    <tr> -->
                      <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" style="visibility:hidden; height:5px;"/></td>
                    </tr>
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
</div>
<?php
}else{	header("location: ../index.php");
}
include "../vista/inc/footer.php";
?>
<script>
    $(document).ready(function(){
        $('#productos').DataTable({
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