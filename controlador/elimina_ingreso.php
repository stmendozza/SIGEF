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

$eliminar = ("DELETE FROM tb_provedores, tb_usuarios WHERE cod_prove = '$id' AND cod_usuario_prove = usuario");

$resultado = mysqli_query($conexion, $eliminar);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



$registro = ("SELECT * FROM tb_provedores ORDER BY cod_prove ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">

        	<tr>

            	<th width="100">Cod. Provedor</th>

                <th width="100">Nombre</th>

                <th width="50">Telefono</th>

                 <th width="50">Correo Electronico</th>

                <th width="200">Direccion</th>

                <th width="50">Opciones</th>

            </tr>';



if(!empty($resultado)){

	while($array = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$array ['cod_prove'].'</td>

				<td>'.$array ['nom_prove'].'</td>

				<td>'.$array ['telefono_prove'].'</td>

				<td>'.$array ['email'].'</td>

				<td>'.$array ['direccion_prove'].'</td>


				<td><a href="javascript:editarProducto('.$array ['cod_prove'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$array ['cod_prove'].');" class="glyphicon glyphicon-remove-circle icon3"></a></td>

				</tr>';

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>