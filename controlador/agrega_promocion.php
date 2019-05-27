<?php

include('../connections/config.php');

function fechaNormal($fecha){

	$nfecha = date('d/m/Y',strtotime($fecha));

	return $nfecha;

}

$id = $_POST['id-prod']; 

$proceso = $_POST['pro'];

$descripcion_promo = $_POST['descripcion_promo'];



// $fecha = $_POST['fecha_registro'];

//$fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO



switch($proceso){

	case 'Registro':

	$registro = ("INSERT INTO tb_promociones (descripcion_promo)VALUES('$descripcion_promo')");

	$resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

	$edicion = ("UPDATE tb_promociones SET descripcion_promo = '$descripcion_promo' WHERE cod_promo = '$id'");

	$resultado = mysqli_query($conexion, $edicion);

	break;

}





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

while($registro2 = mysqli_fetch_array($resultado)){

	echo '<tr>

	<td>'.$registro2['cod_promo'].'</td>
	<td>'.$registro2['descripcion_promo'].'</td>
	<td>'.$registro2['fecha_registro_promo'].'</td>
	<td><a href="javascript:editarPromocion('.$registro2['cod_promo'].');" class="fal fa-edit"></a> <a href="javascript:eliminarPromocion('.$registro2['cod_promo'].');" class="fal fa-trash-alt icon3"></a></td>

	</tr>';	

	

}

echo '</table>';

// ?>