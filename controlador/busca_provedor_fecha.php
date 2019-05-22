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



$registro = "SELECT * FROM tb_provedores WHERE fecha_registro_prove BETWEEN '$desde' AND '$hasta' ORDER BY cod_prove ASC";

$resultado=mysqli_query($conexion,$registro);

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