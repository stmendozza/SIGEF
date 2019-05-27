 <?php 

 include('../connections/config.php');

 function fechaNormal($fecha){

  $nfecha = date('d/m/Y',strtotime($fecha));

  return $nfecha;

}

$registro = ("SELECT * FROM tb_usuarios, tb_roles WHERE cod_rol_usu = cod_rol");

$resultado = mysqli_query($conexion,$registro);

echo '<table class="table table-striped table-condensed table-hover" id="usuarios">
<thead>
<tr>
<th width="60">Usuario</th>
<th width="220">Nombre</th>
<th width="50">Telefono</th>
<th width="50">rol</th>
<th width="150">Correo Electronico</th>
<th width="150">Accesos</th>
<th width="150">Opciones</th>
<th width="100">F. Registro</th>
</tr>
</thead>';

if(!empty($resultado)){   

  while($registro2 = mysqli_fetch_array($resultado)){

    echo '<tr>

    <td>'.$registro2['usuario'].'</td>
    <td>'.utf8_decode($registro2['nom_usu']).'</td>
    <td>'.$registro2['telefono_usu'].'</td>
    <td>'.$registro2['nom_rol'].'</td>
    <td>'.$registro2['email'].'</td>
    <td><select name="select">
    <option value="Facturar">Facturar</option> 
    <option value="Inventario" selected>Inventario</option>
    <option value="usuario">Usuario</option>
    </select> 
    </td>                   
    <td>
    <a href="javascript:editarUsuario('.$registro2['usuario'].');" class="fal fa-edit"></a> 
    <a href="javascript:eliminarUsuario('.$registro2['usuario'].');" class="fal fa-trash-alt icon3"></a>
    </td>          
    <td>'.fechaNormal($registro2['fecha_registro_usu']).'</td>



    </tr>';   

  }



  echo '</table>';



}


?>