 <?php

include('config.php');

$id = $_POST['id-prod'];

$proceso = $_POST['pro'];

$cod_prod = $_POST['codigo_producto'];

$descripcion = $_POST['descripcion'];

$precio_costo = $_POST['precio-costo'];

$categoria = $_POST['categoria'];

$tipo = $_POST['tipo'];

// $precio_dis = $_POST['precio-dis'];

//fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO



switch($proceso){

	case 'Registro':

		$registro = ("INSERT INTO tb_productos (cod_prod, descripcion, precio_costo, cod_categ_prod, cod_tipo_prod )VALUES('$cod_prod','$descripcion','$precio_costo', '$categoria', '$tipo')");

		$resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

		$edicion = ("UPDATE tb_productos SET cod_prod = '$nombre', descripcion = '$tipo', precio_costo = '$precio_uni', fecha_registro = '$precio_dis' WHERE cod_producto = '$id'");

		$resultado = mysqli_query($conexion, $edicion);

		$edicion = ("UPDATE tb_disponibles SET cod_producto = '$nombre', descripcion = '$tipo', precio_compra = '$precio_uni', fecha_registro = '$precio_dis' WHERE cod_producto = '$id'");

		$resultado = mysqli_query($conexion, $edicion);

	break;

}





//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



$registro = ("SELECT * FROM tb_productos ORDER BY cod_prod ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



echo '<table class="table table-striped table-condensed table-hover" id"mitabla">

        	<tr>

            	<th width="30">codigo</th>

                <th width="200">descripcion</th>

                <th width="100">Precio Compra</th>

				<th width="50">Opciones</th>

            </tr>';

	while($registro2 = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$registro2['cod_prod'].'</td>

				<td>'.$registro2['descripcion'].'</td>

				<td>S/. '.$registro2['precio_costo'].'</td>

				<td><a href="javascript:editarProducto('.$registro2['cod_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['cod_prod'].');" class="glyphicon glyphicon-remove-circle icon3"></a></td>

				</tr>';

	}

echo '</table>';

?>