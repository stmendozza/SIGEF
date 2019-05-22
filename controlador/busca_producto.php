 <?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$dato = $_POST['dato'];



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



$registro="SELECT * FROM tb_productos WHERE cod_prod LIKE '%$dato%' OR descripcion LIKE '%$dato%' ORDER BY cod_prod ASC";



$resultado=mysqli_query($conexion,$registro);



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



echo '<table class="table table-striped table-condensed table-hover" id=mitabla"">

        	<tr>

            	<th width="30">Codigo</th>

                <th width="200">Descripcion</th>

                <th width="100">Precio Compra</th>

                <th width="200">Fecha Registro</th>

                <th width="50">Opciones</th>

            </tr>';



if(!empty($resultado)){

	while($row=mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$row['cod_prod'].'</td>

				<td>'.$row['descripcion'].'</td>

				<td>S/. '.$row['precio_costo'].'</td>

				<td>'.fechaNormal($row['fecha_registro_prod']).'</td>

				<td><a href="javascript:editarProducto('.$row['cod_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$row['cod_prod'].');" class="glyphicon glyphicon-remove-circle icon3"></a></td>

				</tr>';

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>