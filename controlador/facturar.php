<?php     
session_start();
include "../connections/config.php";
function fechaNormal($fecha){
    $nfecha = date('d/m/Y',strtotime($fecha));
    return $nfecha;
}
if (isset($_SESSION['usuario'])){
    
    if(!empty($_POST)) {

        $cod_clie= $_POST['cod_clie'];
        $registro = ("SELECT nom_clie FROM tb_clientes WHERE cod_clie = $cod_clie");
        $resultado = mysqli_query($conexion, $registro);
        while($registro2 = mysqli_fetch_array($resultado)){
        }
        require '../connections/config.php';
        require 'funciones.php';



    }

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <?php include ("../vista/inc/headcommon.php"); ?>
        <?php include ("../vista/inc/scripts.php"); ?>    
        <title>SIGEF | Facturacion</title>
        <link rel="stylesheet" href="../vista/icon/style.css">
        <script src="../vista/js/crud_clientes.js"></script>
        <script src="../vista/js/bootstrap.min.js"></script>  
        <link href="../vista/dist/css/sb-admin-2.css" rel="stylesheet">
    </head>
    <body>
        <?php include('../vista/inc/header.php'); ?>   
    </header>
    <main>
        <?php include('../vista/inc/menu.php'); ?>  
        <div class="container-fluid ">
            <div class="row">
                <ol class="col breadcrumb">
                    <li><a href="../index.php" class="icon7"><i class="fa fa-home "></i> Inicio /</a></li>
                    <li class="active">Facturacion / Vendedor / </li>
                    <li><i class="fa fa-user icon10"></i><strong> <?php echo $_SESSION['nom_usu']; ?></strong></li>
                </ol>
            </div>
            <div class="row " style="padding-left: 10px; ">
                <h2><i class="fas fa-cube fa-sm"></i> Nueva Factura #F000000001</h2>
            </div>
            <div class=" datos_cliente">
                <div class="row action_cliente">
                    <div class="col-4"> 
                        <h4 style="padding: 5px;"><strong>Datos del Cliente</strong></h4>  
                    </div>
                    
                    <div class="col-8">
                        <button type="button" class="col-1 col-sm-1 btn btn-link" style="float: right;" ><span class="fa fa-question"></span></button>  
                    </div>
                </div>
            </div>  
            <!-- <button type="button" class="col-xs-5 col-sm-2 btn btn-success" data-toggle="modal" data-target="#buscar_producto"><span class="fa fa-search"></span> Buscar Producto </button> -->
            <div style="margin:5px; padding:5px 5px 20px 5px; " class="container-fluid card">
                <div class="container">
                    <form>
<!--                         <input type="hidden" name="action" value="add_Cliente">
    <input type="hidden" id="idcliente" name="idcliente" value="" required> -->
    
    <div class="row">
        <label class="col-4">Codigo</label>
        <label class="col">Nombre</label>                          
    </div>
    <div class="row">

        <!-- <fieldset> -->
            <input class="form-control col radius" type="text" name="cod_clie" id="cod_clie" value="" class="text ui-widget-content ui-corner-all" ><span id="resultado"></span>
            <input class="form-control col radius" type="text" name="nom_clie" id="nom_clie" value="" readonly>
            <!-- <input type="submit" tabindex="-1" style="position:absolute; top:-1000px;"> -->
            <!-- </fieldset> -->
            
            <button type="button" class="col btn btn-primary" id="nuevo-cliente"><span class="fal fa-plus"></span> Nuevo Cliente </button>  
        </div>
    </form>
</div>

</div>

<div class="row">

    <div class="col-xs-12 table-responsive"  >
        <div style="overflow: scroll; height: 650px;">
            <table class=" table table-bordered table-striped table-condensed table-hover">
                
                <thead> 
<!--                                 <tr  class="table-active">
                                <th width="50">Codigo</th>
                                <th width="200">Descripcion</th>
                                <th width="50">Existencias</th>
                                <th width="50">Cantidad</th>
                                <th width="50">Valor</th>
                                <th width="100">Valor Total</th>
                                <th width="50">Accion</th>
                            </tr>
                            <tr>
                                <th width="50"><input  type="text" name="txt_cod_producto" id="txt_cod_producto"></th>
                                <th id="txt_desxripcion" width="200" >-</th>
                                <th id="txt_existencia" width="50">-</th>
                                <th width="50"><input type="text" name="txt_cant_producto" id="txt_cant_producto"  value="0" min="1" disabled></th>
                                <th  width="50" id="txt_valor" id="text_right">0.00</th>
                                <th width="100" id="txt_valor_total" id="text_right">0.00</th>
                                <th width="50" ><a href="#" class="btn_new btn_new_cliente" id="add_product_venta"><i class="fa fa-plus"></i> Agregar</button></a>
                                </tr> -->
                                <tr class="table-active">
                                    <th width="150"><center>Cod. Producto</center></th>
                                    <th  colspan="2"><center>Descripción</center></th>
                                    <th width="100" ><center>Cantidad</center></th>
                                    <th width="200"><center>P.U.</center></th>
                                    <th width="200" ><center>Total</center></th>
                                    <th width="20">Accion</th>                           
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="col" type="text" name="txt_cod_producto" id="txt_cod_producto"></td>
                                    <td colspan="2">Acetaminofen</td>
                                    <td ><input type="number" style="text-align:center;" id="NuevoRegistroCantidad0"  size="3" maxlength="4" class="txtTextBox col" onkeydown="onKeyDown(event, 'cantidad', this.id, this.parentNode.parentNode.rowIndex)" onchange="javascript:calcularTotalLinea(this.id, this.parentNode.parentNode.rowIndex)" onkeypress="return isNumberKey(event, this.id, 'cantidad', this.parentNode.parentNode.rowIndex)" tabindex="0"></td>
                                    <td class="text_right"><strong style="padding: 20px;">$</strong><input  class="col-8" disabled="disabled" type="number" name="txt_cod_producto" id="txt_cod_producto"></td>
                                    <td class="text_right"><center><strong>$ </strong>  1020012</center></td>
                                    <td class="">
                                        <center>
                                            <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle1(1);"><i class="fal fa-trash-alt icon2"></i></a>
                                        </center>
                                    </td>
                                </tr>
                            </tbody> 

                            <?php
                            // $i=1;
                            // while ( $i <= 10) {
                            ?>
                            <tr style="visibility:hidden">
                                <td><input class="col" type="hidden" name="cod_prod<?php ?>" id=""></td>
                                <td colspan="2"><label  style="visibility:hidden">Acetaminofen</label></td>
                                <td ><input class="col" type="hidden" onclick="document.getElementById(\'cod_prod'.$i.'\').disable=false"></td>
                                <td><label  style="visibility:hidden">Acetaminofen</label></td>
                                <td><label  style="visibility:hidden">Acetaminofen</label></td>
                                <td class="">
                                    <center>
                                        <a style="visibility:hidden" class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle1(1);"><i style="color:red;" class="fal fa-trash-alt "></i></a>
                                    </center>
                                </td>
                            </tr>
                            <?php
                            // }
                            // echo $i++;
                            ?>


                        </div>
                    </table>


                    

                </div>                            

                <table class="table table-bordered  table-hover">
                    <div class="row">
                        <div class="col">
                            <tfoot>
                                <tr class="table-active">
                                    <td width="970" class="text_right">SUBTOTAL Q.</td>
                                    <td width="215">400.00</td>
                                </tr>
                            </div>
                            <div class="col">
                               <tr class="table-active">
                                <td width="970" class="text_right">IVA (16%)</td>
                                <td width="215">430</td>
                            </tr>
                        </div>
                        <div class="col">
                           <tr class="table-active">
                            <td width="970" class="text_right">TOTAL</td>
                            <td width="215">430</td>
                        </tr>
                    </div>
                    
                </tfoot>
            </div>
        </table>
    </div>
</div>            

<div class="row datos_venta">
    <div class="col-2">
       <!-- <h4 style="padding: 5px;"><strong>Datos de la Venta</strong></h4>   -->                          
   </div>
</div>   
<div style="margin:5px; padding:5px; " class="container-fluid card">
    <div class="container">
        <div class="row">
            <div class="col">
                                <!-- <label>Vendedor</label>
                                    <p><i class="far fa-user icon10"></i>  Cristhian Mendoza</p> -->
                                </div>
                                <div class="col">
                                    <label>Acciones</label>
                                    <div id="acciones_venta" class="row" >
                                        <a href="#" class="btn_new btn_new_cliente"><button type="button" class="col-2 btn btn-danger" ><i class="fal fa-ban"></i>Anular</button></a> 
                                        <a href="#" class="btn_new btn_new_cliente " id="btn_facturar_venta"><button type="button" class=" btn btn-primary col" data-toggle="modal" data-target="#nuevo_cliente"><i class="fal fa-cash"></i>Facturar en PDF</button></a>
                                        <a href="#" class="btn_new btn_new_cliente " id="btn_facturar_venta"><button type="button" class=" btn btn-success col" data-toggle="modal" data-target="#nuevo_cliente"><i class="fal fa-cash"></i>Facturar en Tiquet</button></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>                      
                    </div>    
                    

                </div>       
            </main>                                                      <!-- Modal -->
            
            <!-- MODAL PARA EL REGISTRO DE CLIENTES-->
            <div class="modal fade" id="registra-cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"><i class="fal fa-edit"></i><b>Nuevo Cliente</b></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <form id="formulario" class="formulario" onsubmit="return agregaRegistroCliente();">
                    <div class="modal-body"> 
                        <table border="0" width="100%">
                            <tr>
                                <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                            </tr>
                            <tr>
                                <td width="150"><label class="control-label">Proceso: </label></td>
                                <td><input type="text"  class="form-control" required="required" readonly="readonly" id="pro" name="pro"/></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">Usuario</label></td>
                                <td><input type="text" class="form-control" required="required" name="usuario" id="usuario"/></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">Nombre</label> </td>
                                <td><input type="text" class="form-control" required="required" name="nom_usu" id="nom_usu"/></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">Telefono</label></td>
                                <td><input type="text" class="form-control" required="required" name="telefono_usu" id="telefono_usu"/></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">Direccion</label></td>
                                <td><input type="text" class="form-control" required="required" name="direccion_usu" id="direccion_usu"/></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">Email</label></td>
                                <td><input type="text" class="form-control" required="required" name="email" id="email"/></td>
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

    <!-- Modal -->
    <div class="modal fade" id="buscar_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-search"></i> Buscar Producto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
            
            <div class="form-group">
             
                <div class="col-sm-12">
                  <input type="text" pattern="[0-9]{1,11}" maxlength="11" class="form-control" id="codigo_producto" name="codigo_producto" required="" placeholder="Por codigo o Descripcion">
              </div>
              <div class="contenedor-section col-xs-12 panel-body">
              </div>
              <div class="container ">

                <div class="row ">

                    <br>    

                </div>

                <div class="  col-xs-12 col-sm-12">

                    <div class="container">

                        <div class="row">

                            <!-- <div class="col-xs-12 col-sm-2 well"></div> -->

                            <div class="col-xs-12 registros" id="agrega-registros">
                                <div class="col-xs-4 col-sm-4">
                                    <label>CODIGO</label> 
                                </div>
                                <div class="col-xs-4 col-sm-4">
                                    <center><label>DESCRIPCION</label> </center>
                                </div>                
                                <div class="col-xs-4 col-sm-4">
                                    <center><label>AGREGAR</label> </center>
                                </div>

                                <div class="col registros" id="agrega-registros">
                                    <div class="col-xs-4 col-sm-4">
                                        <label>1231231231</label> 
                                    </div>
                                    <div class="col-xs-4 col-sm-4">
                                        <center><label>Naproxeno 250mg</label> </center>
                                    </div>                
                                    <div class="col-xs-4 col-sm-4">
                                        <center><button class=" btn-success"><label class="fa fa-plus" ></label> </button></center>
                                    </div>
                                    

                                </div>
                                <center>
                                    <ul class="pagination" id="pagination"></ul>
                                </center> 
                                <!-- <div class="col-xs-12 col-sm-1 well"></div> -->

                            </div>

                            

                        </div>

                        <br>

                    </div>

                </div>

            </div>
            


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="enviar">Guardar datos</button>
            
        </div>
        
    </div>
</div>
</div>
</div>

<?php
}else{
    header("location:../index.php");
}        include "../vista/inc/footer.php";
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#cod_clie").focus();
        $("#cod_clie").keyup(function(e){
            var url="enter.php";
            $.getJSON(url, { _num1 : $("cod_clie").val() }, function(clientes){
                $.each(clientes, function(i,clientes){
                    $("#nom_clie").val(cliente.nombre);

                    if (cliente.resultado == "0") {
                        $("#resultado").css("color","red");
                        $("#resultado").text("codigo no disponible");
                    }else{
                        $("#resultado").css("color","green");
                        $("#resultado").text("codigo disponible");
                    }
                });
            });
        });
    });
</script>
</body>
</html>