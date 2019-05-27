<?php

include('../connections/config.php');

function fechaNormal($fecha){

	$nfecha = date('d/m/Y',strtotime($fecha));

	return $nfecha;

}
$id = $_POST['id'];
//ELIMINAMOS LA PROMO

$eliminar = ("DELETE FROM tb_promociones WHERE cod_promo = '$id'");

$resultado = mysqli_query($conexion, $eliminar);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



$registro = ("SELECT * FROM tb_promociones ORDER BY cod_promo ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">

<tr>


<th width="50">Codigo</th>
<th width="500">Descripcion Promo</th>
<th width="200">F. de Registro</th>
<th width="50">Opciones</th>

</tr>';



if(!empty($resultado)){

	while($array = mysqli_fetch_array($resultado)){

		echo '<tr>

		<td>'.$array['cod_promo'].'</td>
		<td>'.utf8_decode($array['descripcion_promo']).'</td>
		<td>'.fechaNormal($array['fecha_registro_promo']).'</td>
		<td><a href="javascript:editarPromocion('.$array ['cod_promo'].');" class="fal fa-edit"></a> <a href="javascript:eliminarPromocion('.$array ['cod_promo'].');" class="fal fa-trash-alt icon3"></a></td>

		</tr>';

	}

}else{

	echo '<tr>

	<td colspan="6">No se encontraron resultados</td>

	</tr>';

}

echo '</table>';

?>