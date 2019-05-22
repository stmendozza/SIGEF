<?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$dato = $_POST['dato'];



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



$registro = ("SELECT * FROM tb_provedores,tb_usuarios WHERE cod_usuario_prove = usuario AND usuario = cod_usuario_prove AND cod_prove LIKE '%$dato%' OR nom_usu LIKE '%$dato%' ORDER BY cod_prove ASC");

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

	while($registro2 = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$registro2 ['cod_prove'].'</td>
				<td>'.$registro2 ['usuario'].'</td>
				<td>'.$registro2 ['nom_usu'].'</td>
				<td>'.$registro2 ['telefono_usu'].'</td>
				<td>'.$registro2 ['direccion_usu'].'</td>
				<td>'.$registro2 ['email'].'</td>
                <td>'.utf8_decode($registro2 ['fecha_registro_usu']).'</td>
				<td><a href="javascript:editarProducto('.$registro2 ['cod_prove'].');" class="fal fa-edit"></a> <a href="javascript:eliminarProducto('.$registro2 ['cod_prove'].');" class="fal fa-trash-alt icon3"></a></td>

				</tr>';

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>