<!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
<div class="modal fade" id="mostrar-kardex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i><b>  Registra o Edita un Producto</b></h4>
      </div>
      <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
        <div class="modal-body">
            <table border="0" width="100%">
              <tr>
                <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
            </tr>
            <tr>
               <td width="150"><label class="control-label">Proceso:</label> </td>
               <td><input type="text" class="form-control" required="required" readonly="readonly" id="pro" name="pro"/></td>
           </tr>
           <tr>
               <td><label class="control-label">Codigo: </label></td>
               <td><input type="text" class="form-control" required="required" name="nombre" id="nombre" maxlength="100"/></td>
           </tr>
           <tr>
               <td><label class="control-label">Descripcion:</label> </td>
               <td><input type="text" class="form-control" required="required" name="tipo" id="tipo"/></td>
           </tr>
           <tr>
               <td><label class="control-label">Precio Compra:</label> </td>
               <td><input type="number" class="form-control" required="required" name="precio-uni" id="precio-uni"/></td>
           </tr>
           <tr>
               <td><label class="control-label">Fecha Registro:</label></td>
               <td><input type="date" class="form-control"  required="required" name="precio-dis" id="precio-dis"/></td>
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