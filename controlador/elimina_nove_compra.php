 <?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$id = $_POST['id'];



//ELIMINAMOS EL PRODUCTO



$eliminar = ("DELETE FROM tb_productos WHERE cod_prod = '$id'");

$resultado = mysqli_query($conexion, $eliminar);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



$registro = ("SELECT * FROM tb_productos ORDER BY cod_prod ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



echo '<table class="table table-striped table-condensed table-hover" id="mitabla">

        	<tr>

            	<th width="30">Codigo</th>

                <th width="200">Nombre</th>

                <th width="100">Precio Distribuidor</th>

                <th width="200">Fecha Registro</th>

                <th width="50">Opciones</th>

            </tr>';



if(!empty($resultado)){

	while($array = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$array['cod_prod'].'</td>

				<td>'.$array['descripcion'].'</td>

				<td>S/. '.$array['precio_costo'].'</td>

				<td>'.fechaNormal($array['fecha_registro_prod']).'</td>

				<td><a href="javascript:editarProducto('.$array['cod_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$array['cod_prod'].');" class="glyphicon glyphicon-remove-circle icon3"></a></td>

				</tr>';

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>