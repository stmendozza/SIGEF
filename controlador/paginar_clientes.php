<?php

include('../connections/config.php'); 

function fechaNormal($fecha){

  $nfecha = date('d/m/Y',strtotime($fecha));

  return $nfecha;

}

$registro = ("SELECT cod_clie, usuario, nom_usu, telefono_usu, direccion_usu, email,  fecha_registro_usu  FROM tb_clientes, tb_usuarios WHERE cod_usuario_clie = usuario ORDER BY cod_clie");
$resultado = mysqli_query($conexion,$registro);



echo '<table class="table table-striped table-condensed table-hover" id="clientes">
<thead>
<tr>
<th width="20">Codigo</th>
<th width="25">Usuario</th>
<th width="100">Nombre</th>
<th width="50">Telefono</th>
<th width="200">Direccion</th>
<th width="200">Correo Electromico</th>
<th width="150">F. de registro</th>
<th width="10">Opciones</th>
</tr>
</thead>';

if(!empty($resultado)){  

	while($registro2 = mysqli_fetch_array($resultado)){

		echo '
    <tr>
    <td>'.$registro2['cod_clie'].'</td>
    <td>'.$registro2['usuario'].'</td>
    <td>'.utf8_decode($registro2['nom_usu']).'</td>
    <td>'.$registro2['telefono_usu'].'</td>
    <td>'.utf8_decode($registro2['direccion_usu']).'</td>
    <td>'.$registro2['email'].'</td>
    <td>'.utf8_decode($registro2['fecha_registro_usu']).'</td>
    <td><a href="javascript:editarCliente('.$registro2['cod_clie'].');" class="fal fa-edit"></a> <a href="javascript:eliminarCliente('.$registro2['cod_clie'].');" class="fal fa-trash-alt icon3"></a></td>
    </tr>
    ';
  }
  echo '</table>';
}
?>