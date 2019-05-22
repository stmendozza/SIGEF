<?php 
 
include('../connections/config.php');

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

$id = $_POST['id-prod']; 

$proceso = $_POST['pro'];

$nombre = $_POST['nom_tipo'];


// $fecha = $_POST['fecha_registro'];

//$fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO



switch($proceso){

	case 'Registro':

		$registro = ("INSERT INTO tb_tipos_productos (nom_tipo)VALUES('$nombre')");

		$resultado = mysqli_query($conexion, $registro);


		// $registro = ("INSERT INTO tb_provedores (cod_usuario_prove)VALUES('$usuario')");

		// $resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

		$edicion = ("UPDATE tb_tipos_productos SET nom_tipo = '$nombre' WHERE cod_tipo = '$id'");

		$resultado = mysqli_query($conexion, $edicion);

	break;

}





// //ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



$registro = ("SELECT * FROM tb_tipos_productos ORDER BY cod_tipo ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover" id=mitabla"">

        	<tr>

            	<th width="50">Codigo</th>

                <th width="300">Nombre</th>

                <th width="50">Opciones</th>

            </tr>';



if(!empty($resultado)){

	while($row=mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$row['cod_tipo'].'</td>

				<td>'.$row['nom_tipo'].'</td>

				<td><a href="javascript:editarTipo('.$row['cod_tipo'].');" class="fal fa-edit"></a> <a href="javascript:eliminarTipo('.$row['cod_tipo'].');" class="fal fa-trash-alt icon3"></a></td>

				</tr>';

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>