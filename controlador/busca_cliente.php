<?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$dato = $_POST['dato'];



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



$registro = ("SELECT * FROM tb_provedores WHERE cod_prove LIKE '%$dato%' OR nom_prove LIKE '%$dato%' ORDER BY cod_prove ASC");

$resultado = mysqli_query($conexion, $registro);

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

	while($registro2 = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$registro2['cod_prove'].'</td>

				<td>'.$registro2['nom_prove'].'</td>

				<td>'.$registro2['telefono_prove'].'</td>

				<td>'.$registro2['email'].'</td>

				<td>'.$registro2['direccion_prove'].'</td>


				<td><a href="javascript:editarProvedor('.$registro2['cod_prove'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProvedor('.$registro2['cod_prove'].');" class="glyphicon glyphicon-remove-circle icon3"></a></td>

				</tr>';

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>