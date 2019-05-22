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
    <title>SIGEF | Ayuda</title>  
    <link rel="stylesheet" href="../vista/icon/style.css">    
    <script src="../vista/js/cambiarpestanna.js"></script> 
    <script src="../vista/js/crud_novedades.js"></script>
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
                <li class="active">Ayuda</li>
            </ol>
        </div>
        <div class="row tab">
          <button class="tablinks col-xs-6" onclick="openCity(event, 'manual')" id="defaultOpen">Manual de Usuario</button>
          <button class="tablinks col-xs-6" onclick="openCity(event, 'contacto')">Contacto con Desarrollador</button>
        </div>
        
        <div id="manual" class="row tabcontent">
           <iframe src="../modelo/pdf/manual_tecnico.pdf" class="col" style="height: 710px; padding: 0"></iframe>
        </div>        
        <div class="row">
          <div id="contacto" class="col tabcontent">
            <div class="col ">
              <br><br>
              <!-- <img src="../vista/images/logo_1.png" class="img img-responsive"> -->
              <div class="form-group">
                <label class="col-sm-12 control-label">Desarrollador: Cristhian Mendoza</label>
                <label class="col-sm-12 control-label">Celular: 3145792755</label>
                <label class="col-sm-12 control-label" style="text-align:justify;">Direccion: Diagonal 49G Sur #6-33 piso 3</label>
                <label class="col-sm-12 control-label" style="text-align: justify;">Molinos del Sur, Bogotá D.C.</label>
                <label class="col-sm-12 control-label" style="text-align: justify;">Email: stmendozza@gmail.com</label>
                <center><span class="glyphicon glyphicon-thumbs-up" style="color:#384C87; font-size: 4rem;"></span></center>
              </div>
            </div>
          </div>
        </div>
				</div>
</main>
  <?php
       }else{ header("location: ../index.php");
  }
        include "../vista/inc/footer.php";
  ?>
      <script src="../vista/js/myjava.js"></script>
      <script type="text/javascript">
        // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
      </script>
</body>
</html>

