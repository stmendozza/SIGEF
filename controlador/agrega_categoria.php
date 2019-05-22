<?php

include('../connections/config.php');

$id = $_POST['id-prod'];

$proceso = $_POST['pro'];

$nombre = $_POST['nom_categ'];


//fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO

switch($proceso){

	case 'Registro':

		$registro = ("INSERT INTO tb_categorias_productos (nom_categ)VALUES('$nombre')");

		$resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

		$edicion = ("UPDATE tb_categorias_productos SET nom_categ = '$nombre' WHERE cod_categ = '$id'");

		$resultado = mysqli_query($conexion, $edicion);

	break;

}

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = ("SELECT * FROM tb_categorias_productos ORDER BY cod_categ ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



echo '<table class="table table-striped table-condensed table-hover" id"categorias">

        	<tr>

            	<th width="50">Codigo</th>

                <th width="300">Nombre</th>

				<th width="50">Opciones</th>

            </tr>';

	while($registro2 = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$registro2['cod_categ'].'</td>

				<td>'.$registro2['nom_categ'].'</td>

				<td><a href="javascript:editarCategoria('.$registro2['cod_categ'].');" class="fal fa-edit"></a> <a href="javascript:eliminarCategoria('.$registro2['cod_categ'].');" class="fal fa-trash-alt icon3"></a></td>

				</tr>';

	}

echo '</table>';

?>