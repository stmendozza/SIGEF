<?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$id = $_POST['id'];



//ELIMINAMOS EL PRODUCTO



// $eliminar = ("DELETE FROM tb_provedores WHERE cod_prove = '$id'");

// $resultado = mysqli_query($conexion, $eliminar);

$eliminar = ("DELETE FROM tb_provedores WHERE cod_prove = '$id'");

$resultado = mysqli_query($conexion, $eliminar);


$eliminar = ("DELETE FROM tb_usuarios WHERE cod_usuario_prove = usuario");

$resultado = mysqli_query($conexion, $eliminar);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = ("SELECT cod_prove, usuario, nom_usu, telefono_usu, direccion_usu, email,  fecha_registro_usu FROM tb_provedores, tb_usuarios WHERE cod_usuario_prove = usuario ORDER BY cod_prove ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">

        	<tr>

                  <th width="20">Codigo</th>
                  <th width="100">Usuario</th>
                  <th width="200">Nombre</th>
                  <th width="100">telefono</th>
                  <th width="300">Direccion</th>
                  <th width="300">Email</th>
                  <th width="200">Fecha de registro</th>
                  <th width="10">Opciones</th>

            </tr>';



if(!empty($resultado)){

	while($array = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$array ['cod_prove'].'</td>
				<td>'.$array ['usuario'].'</td>
				<td>'.$array ['nom_usu'].'</td>
				<td>'.$array ['telefono_usu'].'</td>
				<td>'.$array ['direccion_usu'].'</td>
				<td>'.$array ['email'].'</td>
                <td>'.utf8_decode($array ['fecha_registro_usu']).'</td>
				<td><a href="javascript:editarProducto('.$array ['cod_prove'].');" class="fal fa-edit"></a> <a href="javascript:eliminarProducto('.$array ['cod_prove'].');" class="fal fa-trash-alt icon3"></a></td>

				</tr>';

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>