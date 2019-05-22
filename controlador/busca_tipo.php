 <?php 

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$dato = $_POST['dato'];



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



$registro="SELECT * FROM tb_tipos_productos WHERE cod_tipo LIKE '%$dato%' OR nom_tipo LIKE '%$dato%' ORDER BY cod_tipo ASC";



$resultado=mysqli_query($conexion,$registro);



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