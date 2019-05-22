<?php

include('../connections/config.php');



$desde = $_POST['desde'];

$hasta = $_POST['hasta'];



//COMPROBAMOS QUE LAS FECHAS EXISTAN

if(isset($desde)==false){

	$desde = $hasta;

}



if(isset($hasta)==false){

	$hasta = $desde;

}

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



$registro = "SELECT * FROM tb_productos WHERE fecha_registro_prod BETWEEN '$desde' AND '$hasta' ORDER BY cod_prod ASC";


$resultado=mysqli_query($conexion,$registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



echo '<table class="table table-striped table-condensed table-hover">

        	<tr>

            	<th width="50">Codigo</th>

                <th width="300">Descripcion</th>

               

                <th width="150">Precio Distribuidor</th>

                <th width="150">Fecha Registro</th>

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