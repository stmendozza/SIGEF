<?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$id = $_POST['id'];

//ELIMINAMOS EL TIPO

$eliminar = ("DELETE FROM tb_tipos_productos WHERE cod_tipo = '$id'");

$resultado = mysqli_query($conexion, $eliminar);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = ("SELECT * FROM tb_tipos_productos ORDER BY cod_tipo ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">

        	<tr>

            	<th width="50">Codigo</th>
                <th width="300">Nombre</th>
                <th width="50">Opciones</th>

            </tr>';
if(!empty($resultado)){

	while($array = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$array ['cod_tipo'].'</td>
				<td>'.$array ['nom_tipo'].'</td>
				<td><a href="javascript:editarTipo('.$array ['cod_tipo'].');" class="fal fa-edit"></a> <a href="javascript:eliminarTipo('.$array ['cod_tipo'].');" class="fal fa-trash-alt icon3"></a></td>
				</tr>';

	}

}else{

	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';

}

echo '</table>';
?>