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
       <title>SIGEF | Ingresos</title>	
       
       <script src="../vista/js/crud_ingresos.js"></script>
       <link rel="stylesheet" href="../vista/icon/style.css">
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
                <li class="active"> Abastecimiento</li>
            </ol>
            <button type="button" class="col-5 col-sm-2 btn btn-success" data-toggle="modal" data-target="#nuevo-ingreso"><span class="fa fa-plus"></span> Nuevo</button> 
            <button type="button" class="col-5 col-sm-2 btn btn-danger" ><span class=" fa fa-print"></span> Imprimir </button>
            <button type="button" class="col-2 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button>      
        </div>
        <div class="row">
            
           
            
        </div>
        <div class="row">
            <div style="padding-top: 15px;" class="panel-body col" >
                <?php include ('paginar_ingresos.php'); ?>    

            </div>  
        </div>                     
        
    </div>
    
    
</div>


</main>										
<!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
<div class="modal fade" id="nuevo-ingreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i><b>Registra Ingreso o Abastecimiento </b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="container-fluid modal-body" style="height: 500px;">
                <div style="overflow: scroll; height: 450px;" class="contenedor-section registros" id="agrega-registros">
                    <div class="row col">
                       <div class="col-3">   <input type="text" class="form-control"  required="required" name="nombre" id="nombre" maxlength="100" placeholder="Guia o Factura" />
                       </div>
                       <div class="col-6">
                        <input type="text" class="form-control" required="required" name="tipo" id="tipo" placeholder="Proveedor" />    
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" required="required" name="precio-uni" id="precio-uni" placeholder="Fecha Registro" />    
                    </div>  
                </div>
                
            </div>
        </div>
        
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
       </div>
   </form>
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
        $('#ingresos').DataTable({
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