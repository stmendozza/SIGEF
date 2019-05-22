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
	<title>SIGEF | Agotados</title>	
	  <link rel="stylesheet" href="../vista/icon/style.css">
    <!-- <script src="../vista/js/crud_agotados.js"></script> -->
    <!-- <script src="../vista/js/crud_en_cuarentena.js"></script> -->
    <script src="../vista/js/bootstrap.min.js"></script>
    <!-- <script src="../vista/js/cambiarpestanna.js"></script>  -->
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
                        <li class="active">Agotados</li>
                    </ol>
                    <a href="../modelo/pdf/reporte_agotados.php" target="_black"><button type="button" class="col-10 col-sm-2 btn btn-danger" ><span class="fa fa-print"></span> Imprimir Listado</button>
                    </a>
                    <button type="button"   class="col-2 col-sm-1 btn btn-link" ><span class="fa fa-question"></span></button>
                </div>
                <div class="row">
                    <?php include ('paginar_agotados.php'); ?>    
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
    $('#agotados').DataTable({
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